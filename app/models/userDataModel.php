<?php

require_once __DIR__ . '/../../config/config.php';

    class userDataModel{

        private $table = 'users_table';
        private $conn;

        public function __construct(){
            $database = new Database();
            $this->conn = $database->connect();
        }
       
        public function retrieveUserData($userId){
            
            $query = "SELECT * FROM $this->table where users_Id = :userId ";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user){
                return $user;
            }

        }

        public function checkAuthorization($userId){

            $query = "SELECT role FROM $this->table where users_id = :userId";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();

            $role = $stmt->fetch(PDO:: FETCH_ASSOC);

            if($role){
                return $role['role'];
            }

        }

    }


?>