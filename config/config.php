<?php 

    class Database{
        private $host = 'localhost';
        private $dbName = 'alert0';
        private $userName = 'root';
        private $passWord = '';
        public $conn; 

        public function connect(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->userName, $this->passWord);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo 'connection error: ' . $e->getMessage(); 
               
            }
            return $this->conn;
        }
        
    }

?>