<?php 
    $title = "Contact Us";
    include_once "includes/header.php";
    require_once "core/controller/sendmail2.php";

    if(isset($_POST['send_message'])){
        $full_name = $_POST['full_name'];
        $email = $_POST['email_address'];
        $phone = $_POST['phone_no'];
        $message = $_POST['request'];
        $a_message = 
        "
            <h1>NEW MESSAGE REQUEST FROM ICELAND BEACH</h1>
            <p><b>Full Name</b>: $full_name</p>
            <p><b>Email Address</b>: $email</p>
            <p><b>Phone Number</b>: $phone</p>
            <p><b>Message </b>: $message</p>
        ";
        $u_message = 
        "
            <h1>Your message have being sent successfully</h1>
            <p>Thank you for sending your message to iceland beach. We have recieved your message and We will get back to you through the email you have provided. Thank You for choosing Iceland beach</p>
            <a href='https://icelandbeach/index' class='cta-button'>Visit Website</a>
        ";
        $mail = new Sendmail();
        $a_format = $mail->message($a_message);
        $u_format = $mail->message($u_message);
        $send_mail = $mail->mailsender($_POST, $a_format, $u_format, $_POST['email_address']);
    }
?>

    <script src="static/scripts/validate.js"></script>
    <link rel="stylesheet" href="static/styles/contact.css">
    <!-- hero section -->
    <section id="hero">
        <div class="container-fluid">
            <small class="t text-uppercase text-warning">About Us</small>
            <h1>WE WOULD LIKE TO HEAR FROM YOU</h1>
        </div>
    </section>

    <!-- form section -->
    <section id="form" class="p-4">
        <form method="post">
            <div class="form-title">
                <h2>Contact Us</h2>
            </div>
            <div class="inputs">
                <input type="text" placeholder="Full Name" name="full_name" class="fullname" required>
                <span class="text-danger f-error"></span>
            </div>
            <div class="inputs">
                <input type="email" placeholder="Email Address" name="email_address" class="email" required>
                <span class="text-danger e-error"></span>
            </div>
            <div class="inputs">
                <input type="tel" placeholder="Phone Number" name="phone_no" class="phone" required>
                <span class="text-danger p-error"></span>
            </div>
            <div class="inputs">
                <textarea name="request" placeholder="Bookng Request" class="message" required min-length="30"></textarea>
                <span class="text-danger m-error"></span>
            </div>
            <div class="inputs">
                <button type="submit" name="send_message">Submit</button>
            </div>
        </form>
    </section>
 

    <!-- section for map -->
    <section id="map" class="w-100">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.7473856208776!2d3.606918074992096!3d6.426492593564532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf9fc57330727%3A0x9ae086febb7b7705!2sICELAND%20BEACH%20RESORT!5e0!3m2!1sen!2sng!4v1736519925707!5m2!1sen!2sng" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
<?php 
    include "includes/footer.php";
?>