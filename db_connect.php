<?php
class DB_Connect {
    private $dbname;
    private $user;
    private $pw;
    // constructor
    function __construct() {
    }
    public function useConnexion() {
	include_once './config.php';
        $instance = new self();
        $instance->dbname = DB_DATABASE;
        $instance->user = DB_USER;
        $instance->pw = DB_PASSWORD;
        return $instance;
    }
  
    // destructor
    function __destruct() {
       }
  
    // Connecting to database
    public function connect() {

        require_once 'config.php';
        // connecting to pgsql
        $con = new PDO('mysql:host='.DB_HOST.';dbname='.$this->dbname , $this->user, $this->pw); 
        // return database handler
        return $con;
    }
} 
?>
