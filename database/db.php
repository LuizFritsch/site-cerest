<?php
class db{

    public $isConnected;

    protected $database;

    public function __construct($username, $password, $host, $dbname, $options=array()){
        $this->isConnected = true;
        try {
            $this->database= new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            $this->isConnected = false;
            throw new Exception($e->getMessage());
        }
    }

    public function select($query, $params=array()){
        try{
            $stmt = $this->database->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

}

?>