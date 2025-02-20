<?php

    require_once __DIR__ . '/../../config/config.php';

    class user{

        private $conn;
        private $table = 'users_table';

        public function __construct(){
            $database = new Database();
            $this->conn = $database->connect();
        }

        public function register($email, $password, $fullName, $address, $contact, $gender, $role, $createdAt, $fileName)
{
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email is already registered
    $checkUser = "SELECT email FROM $this->table WHERE email = :email";
    $checkUserstmt = $this->conn->prepare($checkUser);
    $checkUserstmt->bindParam(':email', $email);
    $checkUserstmt->execute();

    if ($checkUserstmt->rowCount() > 0) {
        return false; // Email already exists
    }

    // Insert new user record
    $query = "INSERT INTO $this->table (email, password, role, created_at, full_name, address, phone_number, gender, profile)
              VALUES (:email, :password, :role, :createdAt, :fullname, :address, :contact, :gender, :profile)";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashPassword);
    $stmt->bindParam(':createdAt', $createdAt);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':fullname', $fullName);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':contact', $contact);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':profile', $fileName);

    return $stmt->execute();
}


        public function login($email, $password){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $query = "SELECT * FROM $this->table  WHERE email = :email ";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user && password_verify($password, $user['password'])){
                return $user;
                exit;
            }else{

                return false;
                exit;
            }

        }else{
            echo'hindi post';
        }
    }

    }

?>