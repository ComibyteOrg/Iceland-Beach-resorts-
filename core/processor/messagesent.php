<?php 
    session_start();
    require_once "../config/dbquery.php";
    $query = new Dbquery();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
<link rel="icon" href="../../static/images/img (1).png">
<title>Room Payment Verification</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f3f4f6;
    color: #333;
    }
    .email-container {
    width: 500px;
    max-width: 90%;
    margin: 100px auto;
    background-color: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .header {
    background-size: cover;
    background-position: center;
    height: 200px;
    text-align: center;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    }
    .content {
        padding: 20px;
        text-align: center;
    }
    .content h1 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #007BFF;
    }
    .content h4{
        /* display: inline-block; */
        margin-left: 40px;
    }
    .content p {
    font-size: 16px;
    margin-bottom: 20px;
    line-height: 1.6;
    }
    .cta-button {
        display: inline-block;
        color: white;
        text-decoration: none;
        padding: 20px 0;
        width: 100%;
        text-align: center;
        border-radius: 5px;
        font-weight: bold;
        margin-top: 20px;
        border: 1px solid #ffffff;
        margin-bottom: 20px;
        color: #007BFF;
    }
    .cta-button:hover{
        background-color: transparent;
    }
    h2{
        font-size: 40px;
    }
    </style>
</head>
<body>
<div class='email-container'>
<!-- Header -->
<div class='header'>
    <img src='../../static/images/img (1).png' alt='iceland Beach Logo' width='200'>
</div>

<!-- Content -->
<div class='content'>
    <h1>PAYMENT CONFIRMED</h1>
    <h2>Price: ₦<?=$_SESSION['price']?></h2>
    <hr>
    <p>FullName : <?=$_SESSION['fullname']?></p>
    <p>Membership Type : <?=$_SESSION['type']?></p>
    <p>Subscrption Plan : <?=$_SESSION['mplan']?></p>
    <?php 
        $duration = $_SESSION['duration'];

        $start_date = date('Y-m-d H:i:s');
        $multiplier = date('n'); // Current month (1-12)
        $daysToAdd = $duration * $multiplier;
        $expiryDate = date('Y-m-d H:i:s', strtotime("$start_date +$daysToAdd months"));
    ?>
    <p>Start Date: <?=$start_date?> - Expiry Date: <?=$expiryDate?></p>
    <hr>
    <a href="../../rooms" class="cta-button">Back Home</button>
    <button id="print" class="cta-button">Print Invoice</button>

    <script>
        // print page on print button click
        const print = document.getElementById('print');
        const cta_button = document.querySelector('.cta-button');
        print.addEventListener('click', () => {
            // display the buttons as none
            cta_button.style.display = 'none';
            window.print();

            // after printing, re-enable the button
            setTimeout(() => {
                cta_button.style.display = 'block';
            }, 4000); 
        });
    </script>
</div>
</body>
</html>
