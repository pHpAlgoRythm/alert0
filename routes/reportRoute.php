<?php

require_once '../app/controllers/reportsController.php';

$action = $_GET['action'] ?? '';

$reportController = new reportController();

switch($action){

    case 'newReport' :
        $reportController->addNewReport();
    break;

}

?>