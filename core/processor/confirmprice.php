<?php 
    session_start();

    if(isset($_POST['pay'])){
        $email = $_SESSION['email'];
        $amount = $_SESSION['price'];
        $_SESSION['password'] = htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT));
    
         //* Prepare our rave request
         $request = [
            'tx_ref' => "ice".time(),
            'amount' => $amount,
            'currency' => 'NGN',
            'payment_options' => 'card',
            'redirect_url' => 'http://localhost/iceland/core/processor/processmember.php',
            'customer' => [
                'email' => $email,
                'name' => $_SESSION['fullname']
            ],
            'meta' => [
                'price' => $amount
            ],
            'customizations' => [
                'title' => 'Paying for Iceland Membership',
                'description' => 'Iceland membership payment'
            ]
        ];
    
        //* Ca;; f;iterwave emdpoint
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($request),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer FLWSECK_TEST-4d6bed9cf2ad2b68f237f437cf29b591-X',
            'Content-Type: application/json'
        ),
        ));
    
        $response = curl_exec($curl);
    
        curl_close($curl);
        
        $res = json_decode($response);
        if($res->status == 'success')
        {
            $link = $res->data->link;
            header('Location: '.$link);
        }
        else
        {
            echo "<div style='text-align:center;'>We can not process your payment, network issues {$res->status}</div>";
        }
    }
    
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
<link rel="icon" href="../../static/images/img (1).png">
<title>Membership Payment Verification</title>
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
    .cta-button, .cta {
        display: inline-block;
        background-color: #007BFF;
        color: white;
        text-decoration: none;
        padding: 20px 0;
        width: 100%;
        text-align: center;
        border-radius: 5px;
        font-weight: bold;
        margin-top: 20px;
        border: 1px solid #ffffff;
    }
    .cta{
        background-color: gray;
        color: white;
    }
    .cta-button:hover{
        background-color: transparent;
        border: 1px solid #007BFF;
        color: #007BFF;
    }
    .forminput{
        width: 95%;
        padding: 10px;
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
    <form method="post">
        <h1>CONFIRM YOUR PAYMENT</h1>
        <small>20% Off on Yearly Payment</small>
        <h3>FULLNAME : <?=$_SESSION['fullname']?></h3>
        <h3>MEMBERSHIP TYPE : <?=$_SESSION['type']?></h3>
        <h3>PAYMENT TYPE : <?=$_SESSION['mplan']?></h3>
        <h3>TOTAL BILL : <?=$_SESSION['price']?></h3>
        <input class="forminput" type="password" name="password" placeholder="Choose your password" required>
        <button type="submit" name="pay" class="cta-button">Proceed to Payment</button>
        <a href="membership.php" class="cta">Back Home</a>
    </form>
</div>
</div>
</div>
</body>
</html>