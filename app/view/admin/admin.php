<?php

require_once  __DIR__ . '/../../middleware/authMiddleware.php';

checkAuth();



?>

<?php
    require_once __DIR__ . '/../../controllers/reportsController.php';

    $reports = new reportController();
    $reportData = $reports->fetchReport();

    $latitude = null;
    $longitude = null;

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="icon" href="../../../public/photos/system logo.png" type="img/x-icon" />
    <link rel="stylesheet" href="../../../public/css/admin.css">
    <title>admin</title>
</head>
<body>
    <nav>
        <!-- <i class="fa-solid fa-bars" id="side-bar"></i> -->
            <img src="../../../public/photos/system logo.png" alt="">
            <h3>Alerto</h3>
        <i class="fa-solid fa-arrow-right"></i>
    </nav>
    <main>
        <aside >
          
            <ul>
                <li class="toggle-container" Data-target="#account"> 
                    <i class="fas fa-user-circle"></i> Account
                </li>
                <li class="toggle-container" data-target="#dashboard"> 
                    <i class="fas fa-tachometer-alt"> </i> Dashboard
                </li>
                <li class="toggle-container" data-target="#population">
                    <i class="fas fa-users"></i> Population
                </li>
                <li class="toggle-container" data-target="#staffs"> 
                    <i class="fas fa-user-tie"></i> Staffs
                </li>
                <li class="toggle-container" data-target="#histories"> 
                    <i class="fas fa-history" ></i> Histories
                </li>
                <li class="toggle-container" data-target="#vehicle"> 
                    <i class="fas fa-car"></i> Vehicle
                </li>
            </ul>
        </aside>

        
        <section title="table for emergency calls" class="container dashboard"  id="dashboard">
            <h3>Emergencies on service</h3>
            <br>
            <div class="table-container">
                <table>
                        <tr>
                            
                            <th>Requester</th>
                            <th>Vehicle</th> 
                            <th>status</th>
                            <th>Date & Time</th>
                            <th>Action</th>
                           
                        </tr>

                       <?php 
                             if(!empty($reportData) && is_array($reportData)){

                                foreach($reportData as $row) {

                                    $latitude = $row['latitude'];
                                    $longitude = $row['longitude'];
                       ?>
                        
                        <tr>
                            
                            <td><?php echo $row['reporter_name']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td>New</td>
                            <td><span class="date"><?php echo $row['date_time'] ?></span> <span>/</span> <span class="time">21:23:21</span></td>
                            <td>
                                <button class="preview"
                                data-lat="<?php echo $row['latitude'] ?>"
                                data-lng="<?php echo $row['longitude'] ?>">
                                    
                                Location
                            </button>

                                <button class="previewImg"
                                img-data='<?php echo$row['photo'] ?>'
                                >Images</button>


                                <button class="respond">Respond</button>
                            </td>
                        </tr>

                      <?php }  ?> 
                      <?php } ?> 
                </table>

                
            </div>       
        </section>

       

        <div class="container " id="account">
            WORKING on this feature
        </div>
        <div class="container " id="staffs" >WORKING on staffs</div>
        <div class="container " id="population">WORKING on population</div>

        <div class="container " id="histories">


        <section> 
            <h3>History</h3>
            <br>
            <div class="table-container">
                <table>
                        
                        <tr>
                            <th>Request ID</th>
                            <th>Requester</th>
                            <th>Vehicle</th>
                            <th>Date & Time</th>
                            <th>Action</th>
                           
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>John Doe lorem</td>
                            <td>Ambulance</td>
                            <td><span class="date">12-25-2025</span> <span>/</span> <span class="time">21:23:21</span></td>
                            <td>
                                    <button class="delete">Delete</button>
                            </td>
                        </tr>
                </table>
        </div> 
    </section>

</div> 

        <div class="container " id="vehicle">WORKING on vehicle</div>

            
        
             <div class="modal">

                 <div class="iframe-container">

                                   
                <iframe  frameborder="1" allowfullscreen referrerpolicy="no-referrer=policy-when-downgrade"></iframe>
                
                 
                    <i class="fa-solid fa-x"></i>


        </div>
    </div> 

    <div class="imgModal">
        <div class="imgHolder">
                 <div class="loader"></div>
                 <i class="fa-solid fa-x"></i>
        </div>
       
       
        
    </div>
   

        
    </main>

    <script src="../../../public/js/admin.js"></script>
</body>
</html>