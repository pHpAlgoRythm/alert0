<?php

require_once __DIR__ . '/../../config/config.php';

class newReport {

    private $conn; 
    private $table = 'request_table';

    public function __construct(){
      $database = new Database();
      $this->conn = $database->connect();
  }

    public function insertNewReport($reporterId, $vehicle, $status, $dateTime, $latitude, $longitude, $filePath) {
        
        
        $query = "INSERT INTO $this->table (reporter_id, type, status, date_time, latitude, longitude, photo) 
                  VALUES (:reporter_id, :type, :status, :date_time, :latitude, :longitude, :file_path)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':reporter_id', $reporterId);
        $stmt->bindParam(':type', $vehicle);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':date_time', $dateTime);
        $stmt->bindParam(':latitude', $latitude);
        $stmt->bindParam(':longitude', $longitude);
        $stmt->bindParam(':file_path', $filePath);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function getReport(){
        $query = "SELECT r.*, u.full_name AS reporter_name 
                  FROM $this->table r
                  JOIN users_table u ON r.reporter_id = u.users_id
                  ORDER BY r.date_time DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        $successGet = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if ($successGet) {
            return $successGet;
        }
    }
    

}

?>
