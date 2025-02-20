<?php 

    session_start();

    function checkAuth(){
        if(!isset($_SESSION['user'])){
            header('location: ../../../routes/viewRoutes.php?action=unauthorize');
            
            exit;
        }
    }

    function checkRole($requiredRole){
            if(!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== '$requiredRole'){
                header('location: ../../../routes/viewRoutes.php?action=unauthorize');
                exit();
            }
    }

?>