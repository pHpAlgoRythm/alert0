<?php

    require_once __DIR__ . '/../models/userModel.php';

    session_start();

   

    class userAuthController{

    

        public function register()
        {
            $user = new user();
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $fullName = $_POST['fullname'];
                $address = $_POST['address'];
                $contact = $_POST['cpNumber'];
                $gender = $_POST['gender'];
                $role = $_POST['role'];
                $createdAt = date("y:m:d h:i:s");
        
                // Image uploading
                $file = $_FILES['image'];
                $fileName = $file['name'];
                $tempName = $file['tmp_name'];
                $error = $file['error'];
        
                $uploadFolder = __DIR__ . '../../../public/photos/profile/';
        
                if ($error !== UPLOAD_ERR_OK) {
                    echo "File upload error: $error<br>";
                    echo "Check PHP upload error codes for more details.";
                    return;
                }
        
                if (!file_exists($uploadFolder)) {
                    if (!mkdir($uploadFolder, 0755, true)) {
                        die("Failed to create upload folder. Check permissions.");
                    }
                }
        
                if (!is_writable($uploadFolder)) {
                    die("Upload folder is not writable. Check permissions.");
                }
        
                $uniqueFileName = uniqid('profile_', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
                $folder = $uploadFolder . $uniqueFileName;
                
                $tryRegister = $user->register($email, $password, $fullName, $address, $contact, $gender, $role, $createdAt, $uniqueFileName);
        
                if ($tryRegister) {
                    // Move the file to the upload folder
                    if (move_uploaded_file($tempName, $folder)) {
                        session_regenerate_id(true);

                        $_SESSION['user'] = $tryRegister;

                        
        
                        header('Location: authRoute.php?action=logout');

                        exit;

                        
                    } else {
                        
                        echo "<script>alert('Failed to upload image.')</script>";
                        echo "Temp file exists: " . (file_exists($tempName) ? 'Yes' : 'No') . "<br>";
                        echo "Upload folder writable: " . (is_writable($uploadFolder) ? 'Yes' : 'No') . "<br>";
                        echo "Resolved path: $folder<br>";
                        echo "Error: " . error_get_last()['message'] . "<br>";
                    }
                } else {
                    echo "<script>alert('Registration Failed. Email may already be taken.')</script>";
                    header('Location: authRoute.php?action=emailTaken');
                    exit;
                }
            }
        }
        

        
        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $email = $_POST['email'];
                $password = $_POST['password'];
               

                $user = new user();

                $loggedIn = $user->login($email, $password);

                if($loggedIn){
                    session_regenerate_id(true);
                    $_SESSION['user'] = $loggedIn;


                    // header('location:authRoute.php?action=loggedIn');
                    header('location:viewRoutes.php?action=checkAuthorization');

                    exit;

                }else{
                    header('location:authRoute.php?action=notLogIn');
                    exit;
                }


            }
        }

        public function logout() {
            session_destroy();  
            header('location:authRoute.php?action=notLogIn');
            exit;
        }

    }

?>