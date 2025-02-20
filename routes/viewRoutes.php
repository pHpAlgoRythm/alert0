 <?php

 

require_once '../app/controllers/viewController.php';

$view = new view();

$action = $_GET['action'] ?? '';


    switch($action){

        case 'regAcc' :

            $view->registerAccount();
            break;

        case 'loggedIn' :
             $view->loggedIn();
            
            break;
         
        case 'notLogIn' : 
                $view->notLogin();
                break; 
                
        case 'emailTaken' : 
                $view->emailTaken();
                break;

        case 'unauthorize' :
                $view->unauthorize();
                break;

        case 'doneReporting' :
            $view->doneReporting();
            break;

        case 'viewProfile' :
            $view->viewProfile();
            break;

    case 'checkAuthorization' :
        $view->checkAuthorization();
        break;
    }
?>