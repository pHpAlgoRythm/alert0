
<?php

    require_once __DIR__ . '/../models/userDataModel.php';
    

    class userData{

        private $userId;

        public function __construct($userId) {
            $this->userId = $userId;
        }
    
        public function getData(){

            $userData = new userDataModel();

            $user = $userData->retrieveUserData($this->userId);

            return $user;

        }

    }

?>