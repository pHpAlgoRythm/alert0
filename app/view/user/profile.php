

<?php

require_once  __DIR__ . '/../../middleware/authMiddleware.php';

checkAuth();


?>

<?php

    require_once __DIR__ . '/../../controllers/userDataController.php';

    $userData = new userData($_SESSION['user']['users_id'] ?? null);


    $data = $userData->getData();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <link rel="icon" href="../../../public/photos/system logo.png" type="img/x-icon" />
    <link rel="stylesheet" href="../../../public/css/profile.css">
    <title>profile</title>
</head>
<body>
    <nav>
        
        <i class="fa-solid fa-bars" id="side-bar"></i>

        <div class="nav-history">
            <a href="">Report History</a>
            <a href="">Violations</a>
        </div>

       <a href= '../../../routes/viewRoutes.php?action=doneReporting'> <i class="fa-solid fa-arrow-right" ></i></a>
    </nav>

    <main>
        <aside class="side-history">
            <a href="">Report History</a>
            <a href="">Violations</a>
        </aside>
        <div class="profile-settings">  
                <div class="profile-img">
                    <img src="../../../public/photos/profile/<?php echo $data['profile'] ?>" alt="">
                 
                 
                 
                    <input type="file" class="file" style="display:none"> 
                 
                    <i class="fa-solid fa-camera-retro" id="cameraBtn"></i>
                </div>

                   <hr> 
                <div class="wrapper"><p>Full Name: <span> <strong> <?php echo $data['full_name'] ?></strong></span></p>
                <button class="name-btn">Edit</button></div>

                <div class="wrapper"><p>Gender: <span class="age"><strong> <?php echo $data['gender'] ?> </strong></span></p>
                <button class="age-btn">Edit</button></div>

                <div class="wrapper"><p>address: <span class="address"><strong> <?php echo $data['address'] ?> </strong></span></p>
                <button class="address-btn">Edit</button>
                </div>
                <div class="wrapper"><p>contact: <span><strong> <?php echo $data['phone_number'] ?> </strong></span></p>
                <button class="contact-btn">Edit</button></div>
            </div>
     
    </main>

    <script src="../../../public/js/profile.js" type="text/javascript"></script>
</body>
</html>