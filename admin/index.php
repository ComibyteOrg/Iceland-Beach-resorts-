<?php 
    session_start();
    require_once "../core/config/dbquery.php";
    require_once "sendmail.php";
    
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $query = new Dbquery();
    $mail = new Sendmail();

    if(isset($_SESSION['username'])):
        $username = $_SESSION['username'];
        $selectuser = $query->select("admin", "*", "username = ?", [$username], "s");

    $select_rooms = $query->select("room", "*", "", [], "");

    $selectmember = $query->select("membership", "*", "", [], "");

    $services = $query->select("services", "*", "", [], "");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../static/styles/style.css">
    <link rel="stylesheet" href="style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="../static/CAOS.file/CAOS.file.v-1.5/style.css">
  
   <link rel="icon" type="image/png" sizes="16x16" href="../static/images/img (1).png">
    <title>Iceland Beach resorts | Admin Pannel</title>
</head>
<body>

  <style>
    body{
        overflow-x: auto !important;
    }
    table, tr{
      overflow-x: auto;
    }
    th, td{
      width: max-content;
      min-width: max-content;
      text-wrap: nowrap;
    }
    body{
        overflow-x: auto;
    }
  </style>

<nav class="fixed-top mb-5">
   <div class="logo"><img src="../static/images/img (1).png" alt="Iceland Logo" width="30"><span class="lead ms-3"> | ADMIN PANNEL</span></div>

   <a href="post.php" class="btn btn-primary">Post Discount</a>
</nav>


<div class="container mt-5 py-5">
    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs nav-pills" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#basic" type="button" role="tab" aria-controls="basic" aria-selected="true">Rooms</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="services-tab" data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false">Services</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="membership-tab" data-bs-toggle="tab" data-bs-target="#membership" type="button" role="tab" aria-controls="membership" aria-selected="false">Membership</button>
      </li>
    </ul>
    

    <!-- Tab Content -->
    <div class="tab-content mt-3" id="myTabContent">

      <!-- basic -->
    <div class="tab-pane fade show active p-4" id="basic" role="tabpanel" aria-labelledby="basic-tab">
        <?php if($select_rooms->num_rows > 0): ?>
            <table class="table-bordered table-responsive table-stripped">
                <thead>
                    <tr>
                        <th>Room Name</th>
                        <th>Room Category</th>
                        <th>Room Price</th>
                        <th>Booked By</th>
                        <th>Booked By Email</th>
                        <th>Signin Date</th> 
                        <th>Expiry</th>
                        <th>Booked</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($room = $select_rooms->fetch_assoc()):?>
                        <tr>
                            <td><?php echo $room['room_name'];?></td>
                            <td><?php echo $room['room_category'];?></td>
                            <td><?php echo $room['room_price'];?></td>
                            <td><?php echo $room['customer_name'];?></td>
                            <td><?php echo $room['email'];?></td>
                            <td><?php echo $room['start_date'];?></td>
                            <td><?php echo $room['end_date'];?></td>
                            <td>
                            <?php 
                                $room_name = $room['room_name'];
                                if($room['is_booked'] == "booked"){
                                    echo "<a class='btn btn-success w-100' href='booking.php?free=$room_name'>Booked</a>";
                                }else{
                                    echo "<a class='btn btn-danger w-100' href='booking.php?room=$room_name'>Not Booked</a>";
                                }

                                $current_date = date("Y-m-d H:i:s");
                                $expiry_date = $room['end_date'];
                                $email = $room['email'];

                                  $updateroom = $query->update("room", ['is_booked' => 'expired', 'customer_name' => NULL, 'email' => NULL, 'total_price' => NULL, 'mailsent' => 'yes'], "is_booked = 'booked' AND end_date = '$current_date' AND mailsent = ''");

                                  if($expiry_date == $current_date  ){
                                    $u_message = 
                                    "
                                        <h1>Thank You for purchasing your room at Iceland Beach</h1>
                                        <p>We sent you this mail to inform you that Your room has expired, and will no longer have access to the room agaian. If you wll like to renew, please visit our website for renew </p>
                                        <a href='https://icelandbeach.com' class='cta-button'>Visit Website</a>
                                    ";
                                    $roomname = $room['room_name'];
                                    $u_format = $mail->message($u_message);

                                    $a_message = 
                                    "
                                        <h1>New iceland beach room $roomname has expired, please kindly inform the visitor to remind them.</p>
                                    ";

                                    $a_format = $mail->message($a_message);

                                    $send_mail = $mail->mailsender("", "$a_format", "$u_format", $room['email']);

                                  }

                                  echo 
                                  "
                                    <script>
                                    // Check if the page has already been refreshed
                                    if (!sessionStorage.getItem('refreshed')) {
                                        sessionStorage.setItem('refreshed', 'true');
                                        location.reload();
                                    }
                                    </script>
                                  ";

                                if(strtotime($expiry_date) - strtotime($current_date) <= 70 * 60){
                                    $updateroom = $query->update("room", ['is_booked' => 'no'], "is_booked = 'expired' AND email = '$email'");
                                }
                            ?>

                            </td>
                        </tr>
                    <?php endwhile;?>
                </tbody>
                </tbody> 
            </table>
        <?php else: ?>
            <p class="text-center">No Rooms Available</p>
        <?php endif; ?>
    </div>


    <!-- services -->
    <div class="tab-pane fade p-4" id="services" role="tabpanel" aria-labelledby="services-tab">
        <?php if($services->num_rows > 0): ?>
            <table class="table-bordered table-responsive table-striped-columns">
                <thead>
                    <tr>
                        <th>Space Type</th>
                        <th>Space Category</th>
                        <th>Space Price</th>
                        <th>Booked By</th>
                        <th>Booked By Email</th>
                        <th>Number of visitors</th> 
                        <th>Signin Date</th> 
                        <th>Expiry</th>
                        <th>Booked</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($service = $services->fetch_assoc()):?>
                        <tr>
                            <td><?php echo $service['service_name'];?></td>
                            <td><?php echo $service['service_category'];?></td>
                            <td><?php echo $service['service_price'];?></td>
                            <td><?php echo $service['customers_name'];?></td>
                            <td><?php echo $service['customers_email'];?></td>
                            <td><?php echo $service['no_of_people'];?></td>
                            <td><?php echo $service['signin'];?></td>
                            <td><?php echo $service['signout'];?></td>
                            <td>
                            <?php 
                                $space_name = $service['service_name'];
                                if($service['is_booked'] == "booked"){
                                    echo "<a class='btn btn-success w-100' href='booking.php?frees=".$space_name."'>Booked</a>";
                                }else{
                                    echo "<a class='btn btn-danger w-100' href='booking.php?space=$space_name'>Not Booked</a>";
                                }

                                $current_date = date("Y-m-d H:i:s");
                                $expiry_date = $service['signout'];
                                $email = $service['customers_email'];

                                  $update_service = $query->update("services", ['is_booked' => 'expired', 'customers_name' => NULL, 'customers_email' => NULL, 'total' => NULL, 'mailsent' => 'yes'], "is_booked = 'booked' AND signout = '$current_date' AND mailsent = ''");

                                  if($expiry_date == $current_date){
                                    $u_message = 
                                    "
                                        <h1>Thank You for purchasing your service at Iceland Beach</h1>
                                        <p>We sent you this mail to inform you that Your service has expired, and will no longer have access to this service anymore. If you wlll like to renew, please visit our website for renew </p>
                                        <a href='https://icelandbeach.com' class='cta-button'>Visit Website</a>
                                    ";
                                    $servicename = $service['service_name'];
                                    $customer = $service['customers_name'];
                                    $u_format = $mail->message($u_message);

                                    $a_message = 
                                    "
                                        <h1> New Service expiry</h1>
                                        <p>New iceland beach room $servicename has expired, please kindly inform $customer to remind them.</p>
                                    ";

                                    $a_format = $mail->message($a_message);

                                    $send_mail = $mail->mailsender("", "$a_format", "$u_format", $service['customers_email']);
                                  }
                                  echo 
                                  "
                                    <script>
                                    // Check if the page has already been refreshed
                                    if (!sessionStorage.getItem('refreshed')) {
                                        sessionStorage.setItem('refreshed', 'true');
                                        location.reload();
                                    }
                                    </script>
                                  ";

                                if(strtotime($expiry_date) - strtotime($current_date) <= 70 * 60){
                                    $updateroom = $query->update("services", ['is_booked' => 'no'], "is_booked = 'expired' AND customers_email = '$email'");
                                }
                            ?>

                            </td>
                        </tr>
                    <?php endwhile;?>
                </tbody>
                </tbody> 
            </table>
        <?php else: ?>
            <p class="text-center">No Rooms Available</p>
        <?php endif; ?>
    </div>

    <!-- membership -->
    <div class="tab-pane fade show p-4" id="membership" role="tabpane2" aria-labelledby="membership-tab">

    <?php if($selectmember->num_rows > 0): ?>
        <table class="table-bordered table-responsive table-stripped overflow-x-auto">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Start Date</th>
                    <th>Expiry Date</th>
                    <th>Membership Status</th>
                    <th>Membership type</th>
                </tr>
            </thead>
            <tbody>
                <?php while($member = $selectmember->fetch_assoc()):?>
                    <tr>
                        <td><?php echo $member['full_name'];?></td>
                        <td><?php echo $member['email'];?></td>
                        <td><?php echo $member['start_date'];?></td>
                        <td><?php echo $member['end_date'];?></td>
                        <td>
                        <?php 
                            $member_status = $member['member_status'];
                            if($member_status == "paid"){
                                echo "<a class='btn btn-success w-100'>Paid</a>";
                            }else{
                                echo "<a class='btn btn-danger w-100'>Expired</a>";
                            }
                        ?>
                        </td>

                        <td>
                        <?php 
                            $type = $member['type'];
                            if($type == "basic"){
                                echo "<a class='btn btn-primary w-100'>Basic</a>";
                            }else{
                                echo "<a class='btn btn-warning w-100'>Premium</a>";
                            }
                        ?>
                        </td>
                        <td>
                            <a href="userdetail.php?name=<?=$member['full_name']?>" class='btn btn-secondary w-100'>View User Details</a>
                        </td>


                        <?php 
                            $current_date = date("Y-m-d H:i:s");
                            $expiry_date = $member['end_date'];
                            $email = $member['email'];

                            $updatemember = $query->update("membership", ['member_status' => 'expired', 'mailsent' => 'yes'], "member_status = 'paid' AND end_date = start_date AND mailsent = ''");

                            if($expiry_date == $current_date){
                                $u_message = 
                                "
                                    <h1>Membership Expired</h1>
                                    <p>Hello user, inform you that your membership For iceland beach has expired and you no longer have access to our memberhsip features</p>
                                    <a href='https://icelandbeach.com' class='cta-button'>Visit Website</a><br>
                                    <a href='https://icelandbeach.com/renew' class='cta-button'>Renew Membership</a>
                                ";
                            $u_format = $mail->message($u_message);

                            $a_message = 
                            "
                                <h1>New membershp expiry</h1>
                                <p>This is to notify you that A users membership has expired</p>
                            ";

                            $a_format = $mail->message($a_message);

                            $send_mail = $mail->mailsender("", "$a_format", "$u_format", $member['email']);

                            echo 
                                "
                                <script>
                                // Check if the page has already been refreshed
                                if (!sessionStorage.getItem('refreshed')) {
                                    sessionStorage.setItem('refreshed', 'true');
                                    location.reload();
                                }
                                </script>
                                ";

                            }
                            
                            if(strtotime($expiry_date) - strtotime($current_date) == 7 * 24 * 60 * 60){

                            $u_message = 
                            "
                                <h1>Reminder for your membership renewal</h1>
                                <p>Hello user, This is to remind you that your membership will expire in 7 days time. You can re-subscribe to continue enjoying cool features and benefits at Iceland beach</p>
                                <a href='https://icelandbeach.com' class='cta-button'>Visit Website</a><br>
                                <a href='https://icelandbeach.com/renew' class='cta-button'>Renew Membership</a>
                            ";


                            $u_format = $mail->message($u_message);

                            $a_message = 
                            "
                                <h1>New membershp expiry</h1>
                                <p>This is to notify you that A users membership has 7 days to expire </p>
                            ";

                            $a_format = $mail->message($a_message);

                            $send_mail = $mail->mailsender("", "$a_format", "$u_format", $member['email']);
                        }
                        ?>
                    </tr>
                <?php endwhile;?>
            </tbody>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">No Rooms Available</p>
    <?php endif; ?>
    </div>

    </div>

    <!-- other services -->
  </div>








</div>




<!-- FOOTER -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- javascript -->
<script src="../static/scripts/script.js"></script>
</body>
</html>
<?php else: ?>
    echo "<script>window.location.href = 'login.php'</script>";
<?php endif; ?>