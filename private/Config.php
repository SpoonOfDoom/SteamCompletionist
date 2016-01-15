<?php
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

        function __construct()
        {
        	$this->host = "myHost";
            $this->user = "myUser";
            $this->pass = "myPass";
            $this->schema = "mySchema";
            $this->port = "myPort";
            $this->persistent = "myPersistend";
            $this->engine = "myEngine";
            $this->options = "myOptions";
        }
        
    }
?>