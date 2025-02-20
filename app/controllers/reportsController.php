<?php

require_once __DIR__ .  '/../models/reportModel.php';
require_once __DIR__ . '/../models/userDataModel.php';

class reportController {

    public function addNewReport() {

        $reportModel = new newReport(); 

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $reporterId = $_POST['reporter'];
            $vehicle = $_POST['vehicle'];
            $status = $_POST['status'];
            $dateTime = date("y:m:d h:i:s");
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];

            if (isset($_POST['image-data']) && !empty($_POST['image-data'])) {

                $imageData = $_POST['image-data'];
                $imageData = str_replace('data:image/png;base64,', '', $imageData);
                $imageData = base64_decode($imageData);

                $fileName = 'image_' . time() . '.png';

                $uploadFolder = __DIR__ . '../../../public/photos/reports/';

                if (!is_dir($uploadFolder)) {
                    mkdir($uploadFolder, 0777, true); 
                }

                $filePath = $uploadFolder . $fileName;

              

                $insertReport = $reportModel->insertNewReport($reporterId, $vehicle, $status, $dateTime, $latitude, $longitude, $fileName);

                if ($insertReport) {

                    file_put_contents($filePath, $imageData);
                    echo "  <script>alert('Report successfully saved!')</script>";
                    header('location:viewRoutes.php?action=doneReporting');
                } else {
                    echo "Failed to save report!";
                }

            } else {
                echo "No image data found!";
             }
        }
    }

    public function fetchReport(){

        $report = new newReport();

        $reportData = $report->getReport();

        return $reportData;
        
    }

   

}
?>
