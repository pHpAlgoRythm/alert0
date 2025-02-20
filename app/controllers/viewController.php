<?php

require_once __DIR__ . '/../models/userDataModel.php';

    session_start();

    class view{

     
        
        public function loggedIn(){
            header('location:../app/view/user/dashboard.php');
            exit;
        }

        public function notLogIn(){
            header('location:../app/view/auth/auth.html');
        }

        public function emailTaken(){
            echo '<script> alert("Email is already taken") </script> ';
            $this->notLogIn();
        }

        public function logOut(){
            header("location:../app/view/user/dashboard.php");
            exit;
        }

       public function registerAccount(){
        
        header("location:../app/view/auth/register.html");
         exit;
       }

       public function unauthorize(){
          header('location:../app/view/components/unauthorize.php');
          exit;
       }
     
       public function doneReporting(){
        header('location:../app/view/user/dashboard.php');
        exit;
       }

       public function viewProfile(){
        header('location:../app/view/user/profile.php');
        exit;
       }

       public function checkAuthorization(){
        $userModel = new userDataModel();
        $userId = $_SESSION['user']['users_id'];

        $fetchRole = $userModel->checkAuthorization($userId);

        if($fetchRole){
            
            switch($fetchRole){

                case 'user' : 
                     header('location:authRoute.php?action=loggedIn');
                     break;
                
                    case 'admin' : 
                        header('location:../app/view/admin/admin.php');
                        break;

            }

        }

       

       }

    }

?>