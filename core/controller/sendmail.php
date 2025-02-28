<?php
    require '../../vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class Sendmail{
        public function mailsender($post, $a_message, $u_message, $useremail){
            $admin_email = "icelandresorts@gmail.com";
            $admin_email2 = "booking@icelandbeach.com";
            $admin_subject = "New Message from Iceland";
            $admin_body = "$a_message";

            // User Acknowledgment Email Details
            $user_subject = "Thank You for your purchase";
            $user_body = "$u_message";

            // Configure PHPMailer
            $mail = new PHPMailer(true);

            try {
                // SMTP Configuration
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'icelandresorts@gmail.com';
                $mail->Password = 'btpjqjwoanoulodj';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Send Email to Admin
                $mail->setFrom('info@icelandbeach.com', 'Message from Iceland Beach Resorts'); 
                $mail->isHTML(True);
                $mail->addAddress($admin_email, 'Recipient 1');
                $mail->addAddress($admin_email2, 'Recipient 2');
                $mail->Subject = $admin_subject;
                $mail->Body = $admin_body;

                if ($mail->send()) {
                    $mail->isHTML(True);
                    $mail->clearAddresses();
                    $mail->addAddress($useremail);
                    $mail->Subject = $user_subject;
                    $mail->Body = $user_body;

                    if ($mail->send()) {
                        // header("Location: messagesent");
                        echo "<script>window.location.href = 'messagesent'</script>";
                        return $mail->send();
                    } else {
                        echo "<div class='alert alert-danger'>Failed to send acknowledgment email.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Failed to send your message.</div>";
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }

        public function message($message){
            $date = date('Y');
            $message_format = 
            "
            <!DOCTYPE html>
            <html>
            <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Iceland Beach Resort</title>
            <style>
                body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f3f4f6;
                color: #333;
                }
                .email-container {
                max-width: 600px;
                margin: 0 auto;
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
                .header h1 {
                font-size: 36px;
                margin: 0;
                text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
                }
                .content {
                padding: 20px;
                text-align: center;
                }
                .content h2 {
                font-size: 24px;
                margin-bottom: 10px;
                color: #007BFF;
                }
                .content p {
                font-size: 16px;
                margin-bottom: 20px;
                line-height: 1.6;
                }
                .cta-button {
                display: inline-block;
                background-color: #007BFF;
                color: white;
                text-decoration: none;
                padding: 10px 20px;
                border-radius: 5px;
                font-size: 16px;
                font-weight: bold;
                }
                .cta-button:hover {
                background-color: #0056b3;
                }
                .footer {
                background-color: #f3f4f6;
                text-align: center;
                padding: 15px 10px;
                font-size: 14px;
                color: #777;
                }
                .footer a {
                color: #007BFF;
                text-decoration: none;
                }
                .footer a:hover {
                text-decoration: underline;
                }
            </style>
            </head>
            <body>
            <div class='email-container'>
                <!-- Content -->
                <div class='content'>
                    {$message}
                </div>
                <!-- Footer -->
                <div class='footer'>
                <p>
                    Contact us on:
                    <a href='tel: +2348028227526'>+2348028227526</a>
                    <a href='tel: +2349017029868'>+2349017029868</a>
                    <a href='https://facebook.com'>Facebook</a> | 
                    <a href='https://instagram.com'>Instagram</a> | 
                    <a href='https://twitter.com'>Twitter</a>
                </p>
                <p>&copy; {$date} Iceland Beach Resort. All rights reserved.</p>
                </div>
            </div>
            </body>
            </html>
            ";

            return $message_format; 
        }
    }