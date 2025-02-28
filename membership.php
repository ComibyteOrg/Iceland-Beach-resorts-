<?php 
    $title = "membership";
    include_once "includes/header.php";
    include_once "core/controller/logincheck.php";
?>
<link rel="stylesheet" href="static/styles/member.css">
<?php if(isset($_SESSION['password'])): ?>
    <section class="py-5 text-center member">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="font-weight-light become">CONGRATULATION ON BECOMING <span class="hblue">MEMBER OF ICEAND BEACH</span> </h1>
          <p class="lead text-muted">
            As a member of Iceland beach. With Your membership on iceland beach resorts, you now have access to countless and best services from us at iceland beach.
          </p>
          <p>
            <a href="index" class="btn btn-primary my-2"><?php echo $user['email'] ?></a>
            <a href="contact" class="btn btn-secondary my-2">Contact us</a>
          </p>
        </div>
      </div>
    </section>

<?php else: ?>

    <section class="py-5 text-center member">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="font-weight-light become">BECOME A FULL <span class="hblue">MEMBER OF ICEAND BEACH</span> </h1>
          <p class="lead text-muted">
            Become a member of Iceland beach. With Your membership on iceland beach resorts, you will have access to countless and best servces from us
          </p>
          <p>
            <a href="#membercards" class="btn btn-primary my-2">Become a member</a>
            <a href="contact" class="btn btn-secondary my-2">Contact us</a>
          </p>
        </div>
      </div>
    </section>


    <div class="album py-5 bg-light">
        <div class="container">
            <h2 class="mb-4 text-uppercase text-center text-dark become">Benefits of <span class="hblue"> Iceland Membership</span></h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <div class="col">
                    <div class="card shadow-sm">
                    <div class="img-div"><img src="static/images/gallery/imge (6).jpeg" alt="iceland beach ajah bed sofa"></div>
                    <div class="card-body">
                        <h3>Access to beach Front</h3>
                        <p>As a member of the iceland beach resorts, you will have priviledge to our beach front at anytime of the month</p>
                    </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm">
                    <div class="img-div"><img src="static/images/gallery/imge (13).jpeg" alt="iceland beach ajah bed sofa"></div>
                    <div class="card-body">
                        <h3>Free Access all games</h3>
                        <p>As a member of the iceland beach resorts, you will have priviledge play any of our games at anytime of the month</p>
                    </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm">
                    <div class="img-div"><img src="static/images/gallery/imge (9).jpeg" alt="iceland beach ajah bed sofa"></div>
                    <div class="card-body">
                        <h3>Discounts on all services</h3>
                        <p>As a member of the iceland beach resorts, you will have some discount on all food, drinks, and other services at anytime of the month</p>
    </div>
    </div>
</div>

</div>
</div>
</div>


    <div class="container py-5 my-5" id="membercards">
        <h1 class="text-center text-uppercase become">Membership <span class="hblue">plans</span> </h1>
        <div class="row justify-content-center align-items-center mt-4">

            <div class="col-md-4 p-3 memberbox m-3">
                <h5>Basic Membership</h5>
                <small>Level up with more enhanced opportunities</small><br>
                <hr>
                <span class="price">₦ <?php echo (number_format('20000')) ?></span> / <small>Month</small><br>
                <small class="text-secondary">120,000 QUARTERLY PAYMENT</small><br>
                <small class="text-secondary">192,000 ANNUAL PAYMENT</small><br>
                <small class="text-secondary">Yearly pay Covers 20% discount</small><br><br>

                <h6 class="hblue">ADVANTAGES</h6>
                <small class="hblue">● Access to all All games</small><br><br>
                <small class="hblue">● Access to thatched roof hut and stretchers</small><br><br>
                <small class="hblue">● 5% discount on all food, drinks, and other services</small><br><br><br>

                <small class="text-secondary text-center">Note: All memberships must be renewed within 7 days of expiration, or they will be terminated.</small><br><br>
                <small class="text-secondary text-center">Note: Membership fees are not refundable</small><br>

                <a href="core/processor/membership.php?type=basic" class="btn btn-secondary w-100 my-4">Choose Plan</a>
                <a href="#" class="text-dark text-center">Renew Membership</a>

            </div>

            <div class="col-md-4 p-3 memberbox m-3">
                <h5>Premium Membership</h5>
                <small>Level up with more enhanced opportunities</small><br>
                <hr>
                <span class="price">₦ <?php echo (number_format('50000')) ?></span> / <small>Month</small><br>
                <small class="text-secondary">300,000 QUARTERLY PAYMENT</small><br>
                <small class="text-secondary">480,000 ANNUAL PAYMENT</small><br>
                <small class="text-secondary">Yearly pay Covers 20% discount</small><br><br>

                <h6 class="hblue">ADVANTAGES</h6>
                <small class="hblue">● Access to all All games</small><br><br>
                <small class="hblue">● Access to thatched roof hut and stretchers</small><br><br>
                <small class="hblue">● 5% discount on all food, drinks, and other services</small><br><br>
                <small class="hblue">● 50% discount on gate passes</small><br><br>
                <small class="hblue">● 10% on all Spa services</small><br><br>
                
                <br>

                <small class="text-secondary text-center">Note: All memberships must be renewed within 7 days of expiration, or they will be terminated.</small><br><br>
                <small class="text-secondary text-center">Note: Membership fees are not refundable</small><br>

    <a href="core/processor/membership.php?type=premium" class="btn btn-secondary w-100 my-4">Choose Plan</a>
    <a href="#" class="text-dark text-center">Renew Membership</a>
</div>

        </div>
    </div>

<?php endif; ?>
    <!-- gif section -->
    <div class="container-fluid gif-section">
        <img src="static/images/gallery/slide (1).gif" alt="">
    </div>

    <!-- images section -->
    <section id="images">
    <div class="container py-5 px-2">
        <div class="row">
        <div class="col-md-3 col-sm-6 images-galery">
            <img src="static/images/img (15).jpg" alt="Images of iceland beach">
        </div>
        <div class="col-md-3 col-sm-6 images-galery mt-5">
            <img src="static/images/img (8).jpg" alt="Images of iceland beach">
        </div>
        <div class="col-md-3 col-sm-6 images-galery">
            <img src="static/images/img (7).jpg" alt="Images of iceland beach">
        </div>
        <div class="col-md-3 col-sm-6 images-galery mt-5">
            <img src="static/images/img (4).jpg" alt="Images of iceland beach">
        </div>
        </div>
        </div>
    </section>

<?php 
    include_once "includes/footer.php";
?>