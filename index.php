<?php require_once "includes/header.php"; ?>
<style>
    
.gif-section{
  height: 500px;
}
.gif-section img{
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.videoimg{
  width: 500px;
  max-width: 90%;
  position: relative;
  margin: 10px auto;
}
.videoimg img{
  width: 100%;
}
.videoimg span{
  position: absolute;
  font-size: 30px;
  top: 45%;
  left: 43%;
  padding: 15px 17px;
  background-color: var(--primary-color);
  color: var(--fifth-color);
  border-radius: 100%;
}
</style>
<!-- carousel section -->
<div class="container-fluid p-4 carousel-section">
    <div class="row justify-content-evenly align-items-center">
        <div class="col-md-6">
            <h1 class="text-uppercase animate">Escape to serenity, Indulge in luxury.</h1>
            <p class="animate delay-1">Nestled away from the hustle and bustle, our serene beach provides a haven for artists, writers, and thinkers seeking inspiration. With its tranquil atmosphere, gentle waves, and unspoiled natural beauty, this space is designed to spark creativity and foster collaboration. Whether you're sketching, journaling, or simply reflecting, our beach offers a safe and peaceful environment where ideas flow effortlessly.</p>
            <a href="services" class="btn btn-dark animate slide-down delay-2">Explore More</a>
            <a href="rooms" class="btn btn-outline-dark animate slide-down delay-3">Book Rooms</a>
        </div>
        <div class="col-md-5 animate slide-right">
            <img src="static/images/image3d.png" alt="Image of a 3d beach" class="img-fluid">
        </div>
    </div>
</div>

<!-- welcome section -->
<section class="welcome-section">
   <div class="welcome-title animate slide-down">WELCOME TO ICELAND</div>
   <div class="welcome-text animate slide-down delay-1">
      Nestled on the pristine shores, Iceland Private Beach Resort offers an exclusive haven for discerning individuals seeking tranquility and refinement. Our resort embodies the essence of elegance, blending breathtaking natural beauty with exquisite amenities.
   </div>
</section>

<!-- images section -->
<section id="images">
    <div class="container py-5 px-2">
      <div class="row">
        <div class="col-md-3 col-sm-6 images-galery animate fade-zoom">
          <img src="static/images/gallery/imge (11).jpeg" alt="Images of iceland beach">
        </div>
        <div class="col-md-3 col-sm-6 images-galery mt-5 animate fade-zoom delay-1">
          <img src="static/images/gallery/imge (13).jpeg" alt="Images of iceland beach">
        </div>
        <div class="col-md-3 col-sm-6 images-galery animate fade-zoom delay-2">
          <img src="static/images/gallery/imge (5).jpeg" alt="Images of iceland beach">
        </div>
        <div class="col-md-3 col-sm-6 images-galery mt-5 animate fade-zoom delay-3">
          <img src="static/images/gallery/imge (4).jpeg" alt="Images of iceland beach">
        </div>
      </div>
      </div>
  </section>

<!-- about section -->
<section id="about" class="p-5">
   <div class="row justify-content-between align-items-center">
      <div class="col-md-6 about-image animate fade-zoom">
         <img src="static/images/gallery/imge (6).jpeg" alt="A Safe and Quiet Beach for the Creative Community">
      </div>
      <div class="col-md-6 mt-5 mt-md-0">
         <small></small>
         <div class="about-heading animate slide-down">ABOUT ICELAND PRIVATE BEACH RESORT</div>
         <div class="about-header animate slide-down delay-1">A Safe and Quiet Beach for the Creative Community</div>
         <div class="about-text animate slide-down delay-2">Nestled away from the hustle and bustle, our serene beach provides a haven for artists, writers, and thinkers seeking inspiration. With its tranquil atmosphere, gentle waves, and unspoiled natural beauty, this space is designed to spark creativity and foster collaboration. Whether you're sketching, journaling, or simply reflecting, our beach offers a safe and peaceful environment where ideas flow effortlessly.</div>
         <a href="#" class="button_link animate slide-down delay-3">Learn More</a>
      </div>
   </div>
   <div class="row justify-content-between align-items-center my-4">
      <div class="col-md-6 small-img animate fade-down-left">
         <img src="static/images/gallery/imge (9).jpeg" alt="Image of a lady on iceland beach">
      </div>
      <div class="col-md-6">
         <div class="about-heading animate slide-down">OUR ROOMS</div>
         <div class="about-header animate slide-down delay-1">THE COMFORTABLE AND LUXIRIOUS ACCOMODATION</div>
         <div class="about-text animate slide-down delay-2">Our resort offers a variety of luxurious and comfortable accommodations, including suites, villas, and private villas. Our rooms are designed to cater to the needs of our guests, ensuring that you have the perfect escape from the city.</div>
         <a href="#" class="button_link animate slide-down delay-3">View Our Rooms</a>
      </div>
      </div>
   </div>
</section>

<!-- play video -->
<div class="container my-5 text-center">
    <h3>HERE IS A INTRODUCTION ABOUT US</h3>
    <div class="videoimg" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">
        <img src="static/images/img (8).jpg" alt="Image of our beach">
        <span class="fa fa-play play-icon"></span>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <iframe class="w-100" height="315" src="https://youtu.be/SpdG_JpLmlw?si=J-spIqT1rEBitmy1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>


</div>

<!-- Facilities section -->
<section id="facility">
<div class="container py-5">
        <h1 class="text-center mb-4">Facilities</h1>
        <div class="row g-4">
            <div class="col-md-4 col-sm-6 animate slide-up">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <span class="fas fa-bed fa-2x text-dark mb-3"></span>
                        <h5 class="card-title">Ocean Facing Beds</h5>
                        <p class="card-text">Wake up to breathtaking views of the ocean.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 animate slide-up delay-1">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <span class="fas fa-gamepad fa-2x text-dark mb-3"></span>
                        <h5 class="card-title">Games Room</h5>
                        <p class="card-text">Play and unwind in our dedicated games room.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 animate slide-up delay-2">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <span class="fas fa-football-ball fa-2x text-dark mb-3"></span>
                        <h5 class="card-title">Sport Court</h5>
                        <p class="card-text">Indulge in cinematic experiences with comfort and style.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 animate slide-up delay-3">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <span class="fas fa-swimmer fa-2x text-dark mb-3"></span>
                        <h5 class="card-title">Adult Pool</h5>
                        <p class="card-text">Luxury poolside lounging with cocktails and more.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 animate slide-up">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <span class="fas fa-child fa-2x text-dark mb-3"></span>
                        <h5 class="card-title">Children Pool</h5>
                        <p class="card-text">Family fun with your kids swimming and more.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 animate slide-up delay-1">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <span class="fas fa-child fa-2x text-dark mb-3"></span>
                        <h5 class="card-title">Children Playground</h5>
                        <p class="card-text">Safe, whimsical place for your children to have fun.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 animate slide-up delay-2">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <span class="fas fa-baby fa-2x text-dark mb-3"></span>
                        <h5 class="card-title">Childminding</h5>
                        <p class="card-text">Professional care for your little ones.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 animate slide-up delay-3">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <span class="fas fa-house fa-2x text-dark mb-3"></span>
                        <h5 class="card-title">Beach Side SHuts</h5>
                        <p class="card-text">Spa treatments tailored for you to relax and unwind.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 animate slide-up">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <span class="fas fa-utensils fa-2x text-dark mb-3"></span>
                        <h5 class="card-title">Restaurant & Bar</h5>
                        <p class="card-text">Savor delectable cuisine and crafted cocktails.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 animate slide-up delay-1">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <span class="fas fa-golf-ball fa-2x text-dark mb-3"></span>
                        <h5 class="card-title">Snooker Room</h5>
                        <p class="card-text">Nature-inspired fun at our outdoor jungle gym.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 animate slide-up delay-2">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <span class="fa-brands fa-cc-diners-club fa-2x text-dark mb-3"></span>
                        <h5 class="card-title">Event Space</h5>
                        <p class="card-text">Organize memorable events and celebrations.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 animate slide-up delay-3">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <span class="fas fa-wifi fa-2x text-dark mb-3"></span>
                        <h5 class="card-title">High-speed Wi-Fi</h5>
                        <p class="card-text">Seamless high-speed internet throughout your stay.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- gif section -->
<div class="container-fluid gif-section">
    <img src="static/images/gallery/slide (1).gif" alt="">
</div>

<!-- images section -->
<section id="images">
<div class="container py-5 px-2">
    <div class="row">
    <div class="col-md-3 col-sm-6 images-galery animate fade-zoom">
        <img src="static/images/img (15).jpg" alt="Images of iceland beach">
    </div>
    <div class="col-md-3 col-sm-6 images-galery mt-5 animate fade-zoom delay-1">
        <img src="static/images/img (8).jpg" alt="Images of iceland beach">
    </div>
    <div class="col-md-3 col-sm-6 images-galery animate fade-zoom delay-2">
        <img src="static/images/img (7).jpg" alt="Images of iceland beach">
    </div>
    <div class="col-md-3 col-sm-6 images-galery mt-5 animate fade-zoom delay-3">
        <img src="static/images/img (4).jpg" alt="Images of iceland beach">
    </div>
    </div>
    </div>
</section>

<!-- footer -->
<?php 
    include "includes/footer.php";
?>