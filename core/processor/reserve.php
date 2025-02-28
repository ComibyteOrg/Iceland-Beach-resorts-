<?php 
    require_once "../config/dbquery.php";
    require_once "../controller/sendmail.php";

    $mail = new Sendmail();
    $query = new Dbquery();


    
    if(isset($_POST['reserve'])) {
        $service_id = $_POST['service_id'];
        $customer_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['tel'];
        $noofpeople = $_POST['noofv'];
        $startdate = $_POST['signin'];
        $enddate = $_POST['signout'];

        $a_message = 
        "
            <h1>New Iceland Service Booking</h1>
            <p>Your booking details are as follows:</p>
            <p><b>Service ID</b>: $service_id</p>
            <p><b>Customer Name </b>: $customer_name</p>
            <p><b>Email </b>: $email</p>
            <p><b>Phone Number </b>: $phone_number</p>
            <p><b>Number of People </b>: $noofpeople</p>
            <p><b>Start Date </b>: $startdate</p>
            <p><b>End Date </b>: $enddate</p>
            <p>Please confirm the booking details and reserve the space requested</p>
        ";
        
        $a_format = $mail->message($a_message);

        $u_message = 
        "
            <h1>Thank You for booking</h1>
            <p>Your booking has been successfully submitted. We will confirm your reservation shortly.</p>
            <p>Your booking details are as follows:</p>
            <p><b>Service Name:</b> $service_id</p>
            <p><b>Name </b>: $customer_name</p>
            <p><b>Number of People </b>: $noofpeople</p>
            <p><b>Start Date </b>: $startdate</p>
            <p><b>End Date </b>: $enddate</p>
            <a href='https://icelandbeach.com' class='cta-button'>Visit Website</a>
        ";

        $u_format = $mail->message($u_message);
        
        $sendmail = $mail->mailsender($_POST, $a_format, $u_format, $email);
        $alert = "";
        if($sendmail){
            header("Location: bookedsuccess.php");
        }else{
            $alert = "<div class='alert alert-danger'><b>Error!</b> Message Could not be sent</div>";
        }
    }


    if(isset($_POST['reserveroom'])) {
        $service_id = $_POST['service_id'];
        $customer_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['tel'];
        $noofpeople = $_POST['noofv'];
        $startdate = $_POST['signin'];
        $enddate = $_POST['signout'];

        $a_message = 
        "
            <h1>New Iceland Room Booking</h1>
            <p><b>Your booking details are as follows:</b></p>
            <p><b>Room ID:</b> $service_id</p>
            <p><b>Customer Name</b>: $customer_name</p>
            <p><b>Email</b>: $email</p>
            <p><b>Phone Number:</b> $phone_number</p>
            <p><b>Number of People</b>: $noofpeople</p>
            <p><b>Start Date</b>: $startdate</p>
            <p><b>End Date</b>: $enddate</p>
            <p>Please confirm the booking details and reserve the space requested</p>
        ";
        
        $a_format = $mail->message($a_message);

        $u_message = 
        "
            <h1>Thank You for booking</h1>
            <p>Your booking has been successfully submitted. We will confirm your reservation shortly.</p>
            <p><b>Your booking details are as follows:</b></p>
            <p><b>Room Name </b>: $service_id</p>
            <p><b>Name </b>: $customer_name</p>
            <p><b>Number of People </b>: $noofpeople</p>
            <p><b>Start Date </b>: $startdate</p>
            <p><b>End Date </b>: $enddate</p>
            <a href='https://icelandbeach.com' class='cta-button'>Visit Website</a>
        ";

        $u_format = $mail->message($u_message);
        
        $sendmail = $mail->mailsender($_POST, $a_format, $u_format, $email);
        $alert = "";
        if($sendmail){
            header("Location: bookedsuccess.php");
        }else{
            $alert = "<div class='alert alert-danger'><b>Error!</b> Message Could not be sent</div>";
        }
    }
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
    <link rel="icon" type="image/png" sizes="16x16" href="../../static/images/img (1).png">
    <title>Reserve</title>
    <style>
        form{
            width: 500px;
            max-width: 90%;
            margin: 20px auto;
        }
    </style>
</head>
<body>
<div class="contaniner my-5 p-5">
    <?php 
        if(isset($_GET['service']) and $_GET['service'] != NULL):
            $service_id = $_GET['service'];

            $service_details = $query->select("services", "*", "service_name = ?", [$service_id], "s");

            if($room_details->num_rows > 0):
                $service = $service_details->fetch_assoc();
                $service_name = $service['service_name'];
    ?>

                <form method="POST" class="needs-validation" novalidate>
                    <h2>Reserve for: <?php echo $service_name;?></h2>
                    <?php 
                        if(isset($alert)){
                            echo $alert;
                        }
                    ?>
                    <div class="my-3">
                        <label for="validationCustom01" class="form-label">Full name</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="John Doe" name="full_name" required minlength="8">
                        <div class="invalid-feedback">
                        Please input a valid name
                        </div>
                        <input type="hidden" name="service_id" value="<?=$service_name?>">
                    </div>

                    <div class="my-3">
                        <label for="validationCustom02" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="validationCustom02" placeholder="JohnDoe@example.com" name="email" required>
                        <div class="invalid-feedback">
                        Please input a valid email Address
                        </div>
                    </div>

                    <div class="my-3">
                        <label for="validationCustom03" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="validationCustom03" placeholder="+23480595749485" name="tel" required minlength="8">
                        <div class="invalid-feedback">
                        Invalid Phone Number 
                        </div>
                    </div>

                    <div class="my-3">
                        <label for="validationCustom04" class="form-label">Number of Visitors</label>
                        <input type="number" class="form-control" id="validationCustom04" placeholder="10" name="noofv" required min="1">
                        <div class="invalid-feedback">
                        Please Choose a valid Number
                        </div>
                    </div>

                    <div class="my-3">
                        <label for="validationCustom05" class="form-label">Signin Date and time</label>
                        <input type="datetime-local" class="form-control" id="validationCustom05" name="signin" required>
                        <div class="invalid-feedback">
                        Please Choose a valid Date
                        </div>
                    </div>

                    <div class="my-3">
                        <label for="validationCustom06" class="form-label">Signout Date and time</label>
                        <input type="datetime-local" class="form-control" id="validationCustom06" name="signout" required>
                        <div class="invalid-feedback">
                        Please Choose a valid Date
                        </div>
                    </div>

                    <div class="my-4">
                        <button class="btn btn-warning w-100" type="submit" name="reserve">Reserve</button>
                    </div>

                </form>
            <?php else:?>
                <script>window.location.href = '../../services.php'</script>
            <?php  endif;  ?>







    <?php 
        elseif(isset($_GET['room']) and $_GET['room'] != NULL):
            $room_id = $_GET['room'];
            
            $room_details = $query->select("room", "*", "room_name = ?", [$room_id], "s");
            if($room_details->num_rows > 0):
                $room = $room_details->fetch_assoc();
                $room_name = $room['room_name'];
    ?>

                <form method="POST" class="needs-validation" novalidate>
                    <h2>Reserve for: <?php echo $room_name;?></h2>
                    <?php 
                        if(isset($alert)){
                            echo $alert;
                        }
                    ?>
                    <div class="my-3">
                        <label for="validationCustom01" class="form-label">Full name</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="John Doe" name="full_name" required minlength="8">
                        <div class="invalid-feedback">
                        Please input a valid name
                        </div>
                        <input type="hidden" name="room_id" value="<?=$room_name?>">
                    </div>

                    <div class="my-3">
                        <label for="validationCustom02" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="validationCustom02" placeholder="JohnDoe@example.com" name="email" required>
                        <div class="invalid-feedback">
                        Please input a valid email Address
                        </div>
                    </div>

                    <div class="my-3">
                        <label for="validationCustom03" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="validationCustom03" placeholder="+23480595749485" name="tel" required minlength="8">
                        <div class="invalid-feedback">
                        Invalid Phone Number 
                        </div>
                    </div>

                    <div class="my-3">
                        <label for="validationCustom04" class="form-label">Number of Visitors</label>
                        <input type="number" class="form-control" id="validationCustom04" placeholder="10" name="noofv" required min="1">
                        <div class="invalid-feedback">
                        Please Choose a valid Number
                        </div>
                    </div>

                    <div class="my-3">
                        <label for="validationCustom05" class="form-label">Signin Date and time</label>
                        <input type="datetime-local" class="form-control" id="validationCustom05" name="signin" required>
                        <div class="invalid-feedback">
                        Please Choose a valid Date
                        </div>
                    </div>

                    <div class="my-3">
                        <label for="validationCustom06" class="form-label">Signout Date and time</label>
                        <input type="datetime-local" class="form-control" id="validationCustom06" name="signout" required>
                        <div class="invalid-feedback">
                        Please Choose a valid Date
                        </div>
                    </div>

                    <div class="my-4">
                        <button class="btn btn-warning w-100" type="submit" name="reserveroom">Reserve</button>
                    </div>

                </form>

            <?php else:?>
                <script>window.location.href = '../../rooms.php'</script>
            <?php  endif;  ?>

    <?php else:?>
        <script>window.location.href = '../../index.php'</script>
    <?php 
        endif; 
    ?>

    
</div>





<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
<!-- FOOTER -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- javascript -->
<script src="../static/scripts/script.js"></script>
</body>
</html>