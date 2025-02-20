
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <head>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
      <link rel="icon" href="../../../public/photos/system logo.png" type="img/x-icon" />
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Open+Sans:wght@300;400&display=swap" rel="stylesheet"/>

      <link rel="stylesheet" href= "../../../public/css/Media-Queries.css" />
      <link rel="stylesheet" href= "../../../public/css/root.css" />
      <link  rel="stylesheet" href = "../../../public/css/typography.css" />
      <link rel="stylesheet" href= "../../../public/css/Animations.css" />

    </head>

    <title>ALERT0</title>
  </head>

  <body class="auth" onload= "getLocation();">
    <header>

    

      <i class="fa-solid fa-bars" id="side-bar"></i>
      <div class="title">
        <img src="../../../public/photos/system logo.png" alt="" />
        ALERT0
      </div>
      <div class="icons">
        <i class="fa-regular fa-bell"></i>
       <a href="../../../routes/authRoute.php?action=logOut"> <i class="fa-solid fa-right-from-bracket"></i></a>
      </div>
    </header>

    <div class="hamburger-items" id="hamburger-items">
      <div class="profile">
        <img
          src= "../../../public/photos/profile/<?php echo $data['profile'] ?>"
          alt=" This is your profile image"
        />

        <div class="texts">
          <h4><?php echo $data['full_name'] ?></h4>
          <button class="account-settings">My Account</button>
        </div>
      </div>
      <hr />
      <ul>
        <li class="account-link"><a href=""> <span><i class="fa-solid fa-user"></i></span>Account link</a></li>
        <li class="settings"><a href=""> <span><i class="fa-solid fa-gear"></i></span>Settings</a></li>
        <li class="logout"><a href="../../../routes/authRoute.php?action=logOut"><span> <i class="fa-solid fa-arrow-right-from-bracket"></i></span>Log out</a></li>
      </ul>
    </div>

    <main>

      <div class="dashboard-wrapper">

     

        <div class="box">
          <div class="box-title">
            <h3>Ambulance</h3>
          </div>
          <div class="image-wrapper">
            <img src="../../../public/photos/ambulance1.jpg" alt="Ambulance image" />
          </div>
          <button class="request" id="ambulance">Request</button>
        </div>
        <div class="box">
          <div class="box-title">
            <h3>Fire Truck</h3>
          </div>
          <div class="image-wrapper">
            <img src="../../../public/photos/firetruck.jpg" alt="Firetruck image" />
          </div>
          <button class="request" id="fireTruck">Request</button>
        </div>

        <div class="box">
          <div class="box-title">
            <h3>Rescue Boat</h3>
          </div>
          <div class="image-wrapper">
            <img src="../../../public/photos/rescueboat.jpg" alt="Rescue Boat image" />
          </div>
          <button class="request" id="rescueBoat">Request</button>
        </div>

        <div class="box">
          <div class="box-title">
            <h3>Rescue Truck</h3>
          </div>
          <div class="image-wrapper">
            <img src="../../../public/photos/rescuetruck.jpg" alt="Rescue Truck image" />
          </div>
          <button class="request" id="rescueTruck">Request</button>
        </div>
      </div>

      <div class="modal">
        <div class="notice-container">
          <div class="confirm-title">
            Confirmation
            <span id="discard"> <i class="fa-solid fa-x"></i></span>
          </div>
          <hr />

          <div class="camera-modal">
            <video src="" id="webcam"></video>
            <button class="capture">capture</button>
          </div>

          <div class="info">
            <canvas class="canvas"></canvas>

            <form action="../../../routes/reportRoute.php?action=newReport" method="post" enctype="multipart/form-data" class="myForm" >
              <div class="form-img-container">
                <img src="" alt="captured-Image" id="Captured-Image" />

                <!-- input sang image -->
                <input type="hidden" name="image-data" id="image-data" style= "display:none;"/>
              </div>

              <div class="form-datas-container">
                <p>
                  Reporter's Name : <span id="firstname"> <strong><?php echo $data['full_name'] ?></strong></span>
                </p>
                <p>
                  Data&Time : <span id="lastname"><strong></strong></span>
                </p>
                <p>
                  <strong>Vehicle-type:</strong>
                  <span id="Vehicle-type"></span>
                </p>
              </div>

              <input type="hidden" name="reporter" value = "<?php echo $data['users_id'] ?>">
              <input type="hidden" name="vehicle" class="vehicle">
              <input type="hidden" name="status" value="New">
              <!-- geolocation input -->
              <input type="hidden" name="latitude" class="latitude">
              <input type="hidden" name="longitude" class="longitude">

            <button type="submit" id="formSubmit"></button>

            </form>

            <hr />
            <div class="form-btn">
              <button class="capture-btn">Capture</button>
              <button class="confirm" id="confirm">Confirm</button>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer>
      <div class="footer-container"></div>
    </footer>
    <script src="../../../public/js/dashboard.js" type="text/javascript"></script>
  </body>
</html>
