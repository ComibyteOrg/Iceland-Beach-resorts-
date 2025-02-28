<?php 
    require_once "../config/dbquery.php";
    require_once "../controller/sendmail.php";
    session_start();

    $query = new Dbquery();
    $mail = new Sendmail();

    if(isset($_GET['status']))
    {
        //* check payment status
        if($_GET['status'] == 'cancelled')
        {
            // echo 'YOu cancel the payment';
            header('Location: http://localhost/iceland/membership');
        }
        elseif($_GET['status'] == 'successful'){
            $txid = $_GET['transaction_id'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                  "Content-Type: application/json",
                  "Authorization: Bearer FLWSECK_TEST-4d6bed9cf2ad2b68f237f437cf29b591-X"
                ),
              ));
              
              $response = curl_exec($curl);
              
              curl_close($curl);
               
              $res = json_decode($response);
              if($res->status)
              {
                $amountPaid = $res->data->charged_amount;
                $amountToPay = $res->data->meta->price;
                $customers_name = $res->data->customer->name;
                $customers_mail = $res->data->customer->email;

                $duration = $_SESSION['duration'];

                $start_date = date('Y-m-d H:i:s');
                $multiplier = date('n'); // Current month (1-12)
                $daysToAdd = $duration * $multiplier;
                $expiryDate = date('Y-m-d H:i:s', strtotime("$start_date +$daysToAdd months"));

                if($amountPaid >= $amountToPay) {
                    $insert = $query->insert("membership", ['full_name' => $_SESSION['fullname'], 'email' => $_SESSION['email'], 'password' => $_SESSION['password'], 'type' => $_SESSION['type'], 'start_date' => $start_date, 'end_date' => $expiryDate, 'member_status' => 'paid', 'total' => $_SESSION['price'], 'pob' => $_SESSION['pob'], 'dob' => $_SESSION['dob'], 'address' => $_SESSION['address'], 'city' => $_SESSION['city'], 'nationality' => $_SESSION['nationality'], 'phone_no' => $_SESSION['phone'], 'ename' => $_SESSION['ename'], 'ephone' => $_SESSION['ephone']]);

                    if($insert){
                        $a_message = 
                        "
                            <h1>New Iceland Membership</h1>
                            <p><b>The Membership details are as follows:</b></p>
                            <p><b>Full-Name:</b>".$_SESSION['fullname']."</p>
                            <p><b>Email</b>: $customers_mail</p>
                            <p><b>Phone Number:</b>".$_SESSION['phone']."</p>
                            <p><b>Start Date</b>: $start_date</p>
                            <p><b>End Date</b>: $expiryDate</p>
                            <p>Please confirm the booking details and reserve the Information</p>
                        ";
                        
                        $a_format = $mail->message($a_message);
                
                        $u_message = 
                        "
                            <h1>Thank You for Becoming a member</h1>
                            <p>Your membership has been successfully purchased. We will confirm your reservation shortly.</p>
                            <p><b>Your booking details are as follows:</b></p>
                            <p><b>Full-Name:</b>".$_SESSION['fullname']."</p>
                            <p><b>Email</b>: $customers_mail</p>
                            <p><b>Phone Number:</b>".$_SESSION['phone']."</p>
                            <p><b>Start Date</b>: $start_date</p>
                            <p><b>End Date</b>: $expiryDate</p>
                            <a href='https://icelandbeach.com' class='cta-button'>Visit Website</a>
                        ";
                
                        $u_format = $mail->message($u_message);
                        
                        $sendmail = $mail->mailsender($_POST, $a_format, $u_format, $customers_mail);
                        if($sendmail){
                            header('Location: success.php');
                        }
                    }else{
                        echo "Could Not insert $query->conn->error";
                    }
                }
            }
        }
    }
?>