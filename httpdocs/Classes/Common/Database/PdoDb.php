<?php

namespace Classes\Common\Database;

use \PDO;
use \PDOException;
use \Exception;

/**
 * PdoDb provides a set of intuitive methods that use the PDO Database Extension.
 *
 * @author Felix Kastner <felix@chapterfain.com>
 */
class PdoDb implements DatabaseInterface
{
    use DatabaseTrait;

    /**
     * {@inheritdoc}
     */
    public function connect()
    {
        try {
            if ($this->config['persistent']) {
                $this->config['options'][PDO::ATTR_PERSISTENT] = true;
            }
            $this->link = new PDO($this->config['engine'] . ':host=' . $this->config['host'] . ';port=' . $this->config['port'] . ';dbname=' . $this->config['schema'] . ';charset=utf8', $this->config['user'], $this->config['pass'], $this->config['options']);
            $this->checkDb(); //Check if the database exists
        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function checkDb()
    {
        try
        {
            $select = "select 1 from steamUserDB LIMIT 1"; //If the database exists we should be able to do this simple statement.
        	$this->prepare($select);
            $this->execute();
        }
        catch (PDOException $e) {
            $exMessage = $e->getMessage();
            if (strpos($exMessage, "1146 Table 'scdb.steamUserDB'") !== false)
            {
                echo "Database doesn't seem to exist yet. Creating it now...<br>\n";
                $dbinit = new DBInitializer($this); //Update class to use interface
                $dbinit->InitializeDb();
            }
        }
    }
    

    /**
     * {@inheritdoc}
     */
    public function prepare($sql)
    {
        try {
            if (!$this->link) {
                $this->connect();
            }
            if ($sql !== $this->lastPrepared) {
                if ($this->stmt) {
                    $this->close();
                }
                $this->stmt = $this->link->prepare($sql);
                $this->lastPrepared = $sql;
            }

        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function execute($data = array(), $types = '')
    {
        try {
            if (!$this->link || !$this->stmt) {
                throw new Exception('PDO database statement has not yet been prepared');
            }

            if ($data) {
                if (!is_array($data)) {
                    $data = array($data);
                }
                $this->stmt->execute($data);
            } else {
                $this->stmt->execute();
            }

            if ($this->stmt->rowCount()) {
                $this->affectedRows = $this->stmt->rowCount();
            }
        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function lastInsert()
    {
        return $this->link->lastInsertId();
    }

    /**
     * {@inheritdoc}
     */
    public function fetch($option = NULL)
    {
        return $this->stmt->fetch($option);
    }

    /**
     * {@inheritdoc}
     */
    public function close()
    {
        if ($this->stmt) {
            $this->stmt->closeCursor();
        }
        $this->stmt = NULL;
        $this->lastPrepared = NULL;
        $this->affectedRows = 0;
    }
}