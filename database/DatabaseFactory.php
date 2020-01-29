<?php
include("db.php");

class DatabaseFactory{

    protected $db;

    public function __construct(){
        $this->db = new db("vinilpub_guilher", "302050027", "localhost", "vinilpub_guilherme_cerest", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }

    public function getConnection(){
        return $this->db;
    }
}

?>