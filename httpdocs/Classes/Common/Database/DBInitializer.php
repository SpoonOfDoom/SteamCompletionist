<?php
namespace Classes\Common\Database;

use Classes\Common\Database\DatabaseInterface;

class DBInitializer
{
    private $db;

    function __construct(DatabaseInterface $db)
    {
    	$this->db = $db;
    }
    
    function InitializeDb( )
    {
    	$tables['SteamUserDb'] = "CREATE TABLE `steamcompletionist`.`steamUserDB`
                                ( `steamid` INT NOT NULL ,
                                `personaname` VARCHAR(255) NOT NULL DEFAULT 'dunno' ,
                                `personastate` VARCHAR(255) NOT NULL DEFAULT 'dunno' ,
                                `points` INT NOT NULL DEFAULT '0' ,
                                `lastUpdate` TIMESTAMP NOT NULL ,
                                `profileurl` VARCHAR(255) NULL ,
                                `profilestate` VARCHAR(255) NOT NULL DEFAULT 'Dunno' ,
                                `avatar` VARCHAR(255) NULL ,
                                `toBeatNum` INT NOT NULL DEFAULT '0' ,
                                `considerBeaten` INT NOT NULL DEFAULT '0' ,
                                `hideQuickStats` BOOLEAN NOT NULL DEFAULT FALSE ,
                                `hideAccountStats` BOOLEAN NOT NULL DEFAULT FALSE ,
                                `hideSocial` BOOLEAN NOT NULL DEFAULT FALSE ,
                                `private` VARCHAR(255) NULL ,
                                `gameName` VARCHAR(255) NULL ,
                                PRIMARY KEY (`steamid`) ) ENGINE = InnoDB;";
        
        foreach ($tables as $value)
        {
        	$this->CreateTable($value);
        }
        
        
    }
    
    private function CreateTable($create_sql)
    {
    	$query = $this->db->prepare($create_sql);
        $this->db->execute($query);
    }
    
    
}

?>