<?php

    require_once '../app/controllers/userAuthController.php';

    $action = $_GET['action'] ?? '';


    $userController = new userAuthController();
   

    switch($action){
        case 'login' : 
            $userController->login();
            break;
        
        case 'register' : 
            $userController->register();
            break;

        case 'logOut' : 
            $userController->logout(); 
            break;
        
        case 'loggedIn' :
            header('location:viewRoutes.php?action=loggedIn');
            break;
        
        case 'notLogIn' : 
            header('location:viewRoutes.php?action=notLogIn');
            break;
        
        case 'emailTaken' : 
            header('location:viewRoutes.php?action=emailTaken');
            break;

       
        
      
    }

?>