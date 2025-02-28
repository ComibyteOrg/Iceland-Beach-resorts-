<?php
session_start();
require_once "../config/dbquery.php";
require_once "../controller/controller.php";

$query = new Dbquery;


if (isset($_GET['type']) or $_GET['type'] !== NULL or $_GET['type'] !== 'basic' or $_GET['type'] !== 'premium'):
    $type = htmlspecialchars($_GET['type']);

    $price = 50000;
    if ($type === 'basic') {
        $price = 20000;
    }

    if (isset($_POST['proceed'])) {
        $email = Controller::sanitize($_POST['email']);
        $select = $query->select("membership", "email", "email = ?", [$email], 's');

        if($select->num_rows == 0){
        $_SESSION['fullname'] =  Controller::sanitize($_POST['firstname']) . " " . Controller::sanitize($_POST['lastname']);
        $_SESSION['pob'] = Controller::sanitize($_POST['pob']);
        $_SESSION['address'] = Controller::sanitize($_POST['address']);
        $_SESSION['city'] = Controller::sanitize($_POST['city']);
        $_SESSION['nationality'] = Controller::sanitize($_POST['nationality']);
        $_SESSION['phone'] = Controller::sanitize($_POST['phone']);
        $_SESSION['dob'] = Controller::sanitize($_POST['dob']);
        $_SESSION['email'] = Controller::sanitize($_POST['emailaddress']);
        $_SESSION['ename'] = Controller::sanitize($_POST['ename']);
        $_SESSION['ephone'] = Controller::sanitize($_POST['ephone']);
        $_SESSION['type'] = Controller::sanitize($type);

        if(isset($_POST['gender'])){
            $_SESSION['gender'] = Controller::sanitize($_POST['gender']);
        }

        $duration = 1;
        $_SESSION['duration'] = 1;
        if (isset($_POST['mplan'])) {
            $mplan = Controller::sanitize($_POST['mplan']);
            $_SESSION['mplan'] = $mplan;   
            if ($mplan === "Quarterly") {
                $price = $price * 6;
                $_SESSION['duration'] = 6;
            } elseif ($mplan === "Annually") {
                $price = $price * 12 * 80 / 100;
                $_SESSION['duration'] = 12;
            }

            $_SESSION['price'] = Controller::sanitize($price);

            echo Controller::alert("primary", "<b>Success!!</b> You will be redirected soon");
            echo Controller::counttime("1", "confirmprice.php");
        }else{
            echo $error[] = Controller::alert("danger", "Account does not exist");
        }
    }

        
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../bootstrap-5.3.2-dist/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <link rel="stylesheet" href="../../static/styles/style.css">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../../static/CAOS.file/CAOS.file.v-1.5/style.css">
        <link rel="icon" href="../../static/images/img (1).png">
        <title>Iceland beach | Membership </title>
        <style>
            form {
                width: 500px;
                max-width: 90%;
            }
        </style>
    </head>

    <body>



        <div class="container mt-5 p-5">
            <form class="row mx-auto needs-validation" novalidate method="post">
                <h2 class="text-uppercase">Proceed with your <?= $type ?> membership</h2>

                <div class="col-6 my-2">
                    <label for="validationCustom01" class="form-label">First name</label>
                    <input type="text" class="form-control" name="firstname" id="validationCustom01" required>
                    <div class="invalid-feedback">
                        Please provide your First name
                    </div>
                </div>

                <div class="col-6 my-2">
                    <label for="validationCustom02" class="form-label">Last name</label>
                    <input type="text" class="form-control" name="lastname" id="validationCustom02" required>
                    <div class="invalid-feedback">
                        Please provide your Last name
                    </div>
                </div>
                
                <div class="col-12 my-2">
                    <label for="validationCustom03" class="form-label">Place Of Birth</label>
                    <input type="text" class="form-control" name="pob" id="validationCustom03" required>
                    <div class="invalid-feedback">
                        Please Provide a valid Address
                    </div>
                </div>

                <div class="col-6 my-2">
                    <label for="validationCustom01" class="form-label">Date Of Birth</label>
                    <input type="date" class="form-control" name="dob" id="validationCustom01" required>
                    <div class="invalid-feedback">
                        Please provide your Date of birth
                    </div>
                </div>

                <div class="col-6 my-2">
                    <label for="validationCustom02" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" name="phone" id="validationCustom02" required minlength="8">
                    <div class="invalid-feedback">
                        Please provide your Phone Number
                    </div>
                </div>

                <div class="col-12 my-2">
                    <label for="validationCustom03" class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="emailaddress" id="validationCustom03" required>
                    <div class="invalid-feedback">
                        Please Provide a valid email address
                    </div>
                </div>

                <div class="col-12 my-2">
                    <label for="validationCustom03" class="form-label">Full Address</label>
                    <input type="text" class="form-control" name="address" id="validationCustom03" required>
                    <div class="invalid-feedback">
                        Please Provide a valid Address
                    </div>
                </div>
                
                <div class="col-6 my-2">
                    <label for="validationCustom01" class="form-label">Nationality</label>
                    <input type="text" class="form-control" name="nationality" id="validationCustom01" required>
                    <div class="invalid-feedback">
                        Please provide your Nationality
                    </div>
                </div>

                <div class="col-6 my-2">
                    <label for="validationCustom02" class="form-label">City / Country</label>
                    <input type="text" class="form-control" name="city" id="validationCustom02" required minlength="8">
                    <div class="invalid-feedback">
                        Please provide your City / Country
                    </div>
                </div>

                <div class="col-12 my-2">
                    <label for="validationCustom04" class="form-label">Gender</label>
                    <select class="form-select" id="validationCustom04" required name="gender">
                        <option selected disabled value="">Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a Gender
                    </div>
                </div>

                <label for="validationCustom01">Emergency Contact</label>
                <div class="col-6 my-2">
                    <!-- <label for="validationCustom01" class="form-label">Name</label> -->
                    <input type="text" class="form-control" name="ename" id="validationCustom01" required placeholder="FullName">
                    <div class="invalid-feedback">
                        Please provide a valid name
                    </div>
                </div>

                <div class="col-6 my-2">
                    <!-- <label for="validationCustom02" class="form-label">Phone Number</label> -->
                    <input type="tel" class="form-control" name="ephone" id="validationCustom02" required minlength="8" placeholder="Phone Number">
                    <div class="invalid-feedback">
                        Please provide your Phone Number
                    </div>
                </div>

                <div class="col-12 my-2">
                    <label for="validationCustom02" class="form-label">Membership Type</label>
                    <input type="text" class="form-control" name="mtype" id="validationCustom02" required value="<?=$type?>" readonly>
                </div>


                <div class="col-12 my-2">
                    <label for="validationCustom04" class="form-label">Membership Plan</label>
                    <select class="form-select" id="validationCustom04" required name="mplan">
                        <option selected disabled value="">Choose...</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Quarterly">Quarterly</option>
                        <option value="Annually">Annually</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a Subscription Plan
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required style="accent-color: yellow;">
                    <label class="form-check-label" for="invalidCheck">
                        I have read the <a class="btn text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Terms and Conditons</a> attached to this form and hereby fully agree to the terms
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                    </div>
                </div>

                <div class="my-3 col-12">
                    <button class="btn btn-warning w-100" type="submit" name="proceed">Proceed</button>
                </div>
            </form>
        </div>



        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">TERMS AND CONDITIONS</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Membership Terms </h3>
                    <ol>
                        <li><b>Membership Application Process</b></li>
                            <ul>
                                <li>All prospective members must complete and submit a membership application form</li>
                                <li>Membership is subject to approval by the management of Iceland Beach Resort.</li>
                                <li>Membership fees must be paid in full before access to facilities is granted.</li>
                            </ul>

                        <li><b> Code of Conduct</b></li>
                            <ul>
                                <li>Members are expected to treat all staff and fellow members with respect and courtesy</li>
                                <li>Harassment, discrimination, or any form of abusive behaviour is strictly prohibited.</li>
                                <li>Members must adhere to all posted rules and regulations within the resort.
                                </li>
                            </ul>

                        <li><b>Facility Usage</b></li>
                            <ul>
                                <li>Members must present their membership cards upon entry</li>
                                <li>Any misuse of facilities or equipment may result in suspension or termination of membership.</li>
                                <li>Reservations for private events and accommodation must be made in advance and are subject to availability </li>
                            </ul>

                        <li><b>Guest Policies</b></li>
                            <ul>
                                <li>Members may bring guests, subject to the accompaning guest access fee </li>
                                <li>In case of emergencies, members must follow instructions from the resort’s staff</li>
                                <li>Members are responsible for their guests’ adherence to resort rules.</li>
                            </ul>

                        <li><b>Health and Safety</b></li>
                            <ul>
                                <li>Members must comply with all health and safety regulations.</li>
                                <li>Guest access is limited to the discounts outlined in the membership package</li>
                                <li>it is the responsibility of members to inform management of any health conditions that may affect their use of the facilities.</li>
                            </ul>

                        <li><b>Cancellation and Refund Policy</b></li>
                            <ul>
                                <li>Members may cancel their membership at any time, but fees paid are non-refundable</li>
                                <li>Management reserves the right to revoke membership for violations of rules and regulations without a refund.</li>
                            </ul>

                        <li><b> Amendments to Rules</b></li>
                            <ul>
                                <li>Iceland Beach Resort reserves the right to amend these rules and regulations at any time.</li>
                                <li>Members will be notified of any changes in writing or via the resort’s official communication channels.</li>
                            </ul>

                        <li><b> Liability Waiver</b></li>
                            <ul>
                                <li>Members acknowledge that participation in resort activities involves inherent risk.</li>
                                <li>Members agree to release Iceland Beach Resort from any liability for injuries or damages incurred while on the premise</li>
                            </ul>

                        <li><b> Others</b></li>
                        <p>Check-In/Check-Out Times: Members must adhere to designated check-in (12.00 Noon)
                        and check-out (11.00 AM) times to ensure smooth transitions between stays.</p>
                            <ul>
                                <li>Child Supervision: For the safety of all, children must be supervised by an adult at all times, especially in pool and seafront areas.</li>
                                <li>Lost and Found: The resort is not responsible for lost or stolen items. Members are encouraged to be mindful of their personal belongings and report any lost items promptly to the front desk.</li>
                                <li>Swimwear Policy: Appropriate swimwear is required in pool and beach areas to
                                maintain decorum and hygiene.</li>
                                <li>Environmental Conservation: Members are strictly prohibited from littering the ocean and the resort’s environments, and from harming nature in any way while at the resort.</li>
                                <li>Noise Restrictions: To maintain a peaceful environment, we implement quiet hours during the night and limit loud activities</li>
                                <li>Smoking: Smoking is typically restricted to designated areas - beachfront areas, away from non-smoking guests and members.</li>
                                <li>Pet Policy: No pets are allowed into the resort for safety purposes.</li>
                                <li>Water Sports and Equipment: Members must follow safety guidelines and instructions when engaging in water sports. No member or guest is allowed into the sea beyond 4 feet from the shore, or at an above-ankle water level.</li>
                            </ul>
                    </ol>

                    <p>By adhering to these guidelines, we will create an harmonious and enjoyable experience
                    or you and loved ones at the Iceland Beach Resort. Thank you for your cooperation and
                    understanding.</p>
                    <p>By signing below, you agree to adhere to the above rules and regulations as a condition of your membership at Iceland Beach Resort.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        </div>


        <!-- form validation -->
        <script>
            (() => {
                'use strict'
                const forms = document.querySelectorAll('.needs-validation')

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
        <!-- footer section -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="../../bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    </body>

    </html>
<?php else: ?>
    <script>
        window.location.href = "../../membership"
    </script>
<?php endif; ?>