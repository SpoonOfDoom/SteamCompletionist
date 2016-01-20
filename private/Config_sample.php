<?php
    //Add your settings and rename this file to Config.php
    class Config
    {
        private $host;
        private $user;
        private $pass;
        private $schema;
        private $port;
        private $persistent;
        private $engine;
        private $options;
        public $steam;
        public $logger;
        public $db;
        public $session;
        public $openId;

        function __construct()
        {
        	$this->db['host'] = "localhost";
            $this->db['user'] = "myUser";
            $this->db['pass'] = "myPassword";
            $this->db['schema'] = "mySchema";
            $this->db['port'] = "myPort(3306?)";
            $this->db['persistent'] = "myPersistent";
            $this->db['engine'] = "mysql";
            $this->db['options'] = array();

            $this->steam['key'] = "myKey";
        }
        
    }
?>