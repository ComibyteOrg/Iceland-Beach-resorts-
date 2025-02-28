<?php include_once "includes/header.php"; ?> 

<link rel="stylesheet" href="static/styles/gallery.css">
<section id="hero">
    <div class="container-fluid">
        <small class="t text-uppercase text-warning">OUR GALLERY</small>
        <h1>ICELAND PRIVATE BEACH RESORTS</h1>
        <p>We are Nestled on the pristine shores, Iceland Private Beach Resort offers an exclusive haven for discerning individuals seeking tranquility and refinement. Our resort embodies the essence of elegance, blending breathtaking natural beauty with exquisite amenities.</p>
    </div>
</section>


<!-- gallery section -->
<section id="gallery">
<h1 class="text-center text-uppercase">Our gallery</h1>
<div class="container m4-5 py-5">
    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs " id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active text-dark" id="home-tab" data-bs-toggle="tab" data-bs-target="#bcubana" type="button" role="tab" aria-controls="bcubana" aria-selected="true">Bed Cabanas</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-dark" id="ccubana-tab" data-bs-toggle="tab" data-bs-target="#ccubana" type="button" role="tab" aria-controls="ccubana" aria-selected="false">Sofa cubana</button>
      </li>

      <li class="nav-item" role="presentation">
        <button class="nav-link text-dark" id="scabana-tab" data-bs-toggle="tab" data-bs-target="#scabana" type="button" role="tab" aria-controls="scabana" aria-selected="false">Swing cabana</button>
      </li>

      <li class="nav-item" role="presentation">
        <button class="nav-link text-dark" id="huts-tab" data-bs-toggle="tab" data-bs-target="#huts" type="button" role="tab" aria-controls="huts" aria-selected="false">Huts</button>
      </li>

      <li class="nav-item" role="presentation">
        <button class="nav-link text-dark" id="strecher-tab" data-bs-toggle="tab" data-bs-target="#strecher" type="button" role="tab" aria-controls="strecher" aria-selected="false">Strechers</button>
      </li>

      <li class="nav-item" role="presentation">
        <button class="nav-link text-dark" id="beachfront-tab" data-bs-toggle="tab" data-bs-target="#beachfront" type="button" role="tab" aria-controls="beachfront" aria-selected="false">Beach front</button>
      </li>

      <li class="nav-item" role="presentation">
        <button class="nav-link text-dark" id="rooms-tab" data-bs-toggle="tab" data-bs-target="#rooms" type="button" role="tab" aria-controls="rooms" aria-selected="false">Rooms</button>
      </li>

      <li class="nav-item" role="presentation">
        <button class="nav-link text-dark" id="clounge-tab" data-bs-toggle="tab" data-bs-target="#clounge" type="button" role="tab" aria-controls="clounge" aria-selected="false">Creative lounge</button>
      </li>

      <li class="nav-item" role="presentation">
        <button class="nav-link text-dark" id="video-tab" data-bs-toggle="tab" data-bs-target="#video" type="button" role="tab" aria-controls="video" aria-selected="false">Video</button>
      </li>
    </ul>
    


    <!-- Tab Content -->
  <div class="tab-content mt-3" id="myTabContent">
      <!--Bed Cubannas -->
      <div class="tab-pane fade show active p-4 container" id="bcubana" role="tabpanel" aria-labelledby="bcubana-tab">
        <div class="row">
          <div class="col-md-4 gimg"><img src="static/images/img (6).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/img (17).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/img (18).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/img (19).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/img (20).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/img (5).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/imge (2).jpeg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/imge (7).jpeg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/imge (13).jpeg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimage (4).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimage (6).jpg"></div>
        </div>
      </div>

      <!-- Sofa Cubannas -->
      <div class="tab-pane fade p-4 container" id="ccubana" role="tabpane1" aria-labelledby="ccubana-tab">
        <div class="row">
          <div class="col-md-4 gimg"><img src="static/images/img (1).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/img (21).jpg"></div>
        </div>
      </div>

      <!--Swing Cubannas -->
      <div class="tab-pane fade p-4 container" id="scabana" role="tabpane1" aria-labelledby="scabana-tab">
        <div class="row">
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimage (2).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimage (3).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimage (5).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimg (11).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimg (10).jpg"></div>
        </div>
      </div>

      <!-- Huts -->
      <div class="tab-pane fade p-4 container" id="huts" role="tabpane1" aria-labelledby="huts-tab">
        <div class="row">
          <div class="col-md-4 gimg"><img src="static/images/gallery/imge (8).jpeg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/imge (10).jpeg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/imge (3).jpeg"></div>
          <div class="col-md-4 gimg"><img src="static/images/img (4).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/img (15).jpg"></div>
        </div>
      </div>

      <!-- Strecher -->
      <div class="tab-pane fade p-4 container" id="strecher" role="tabpane1" aria-labelledby="strecher-tab">
        <div class="row">
          <div class="col-md-4 gimg"><img src="static/images/img (2).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/img (3).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/imge (9).jpeg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimage (7).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimage (8).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimage (9).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimage (10).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimg (12).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimg (13).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimg (14).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/imge (11).jpeg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/imge (12).jpeg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/imge (4).jpeg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/imge (5).jpeg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/imge (14).jpeg"></div>
        </div>
      </div>

      <!-- Beach front -->
      <div class="tab-pane fade p-4 container" id="beachfront" role="tabpane1" aria-labelledby="beachfront-tab">
        <div class="row">
          <div class="col-md-4 gimg"><img src="static/images/img (8).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/img (9).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/img (10).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/img (11).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/img (12).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/img (13).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/imge (9).jpeg"></div>
        </div>
      </div>

      <!-- Rooms -->
      <div class="tab-pane fade p-4 container" id="rooms" role="tabpane1" aria-labelledby="rooms-tab">
        <div class="row">
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimg (1).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimg (4).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimg (5).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimg (8).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimg (15).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimg (16).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimg (17).jpg"></div>
        </div>
      </div>

      <!-- Lounge -->
      <div class="tab-pane fade p-4 container" id="clounge" role="tabpane1" aria-labelledby="clounge-tab">
        <div class="row">
          <div class="col-md-4 gimg"><img src="static/images/gallery/nimg (9).jpg"></div>
          <div class="col-md-4 gimg"><img src="static/images/music (1).jpeg"></div>
          <div class="col-md-4 gimg"><img src="static/images/music (2).jpeg"></div>
        </div>
      </div>

      <!-- Lounge -->
      <div class="tab-pane fade p-4 container" id="video" role="tabpane1" aria-labelledby="video-tab">
        <div class="row">
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (1).mp4" controls></video></div>
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (3).mp4" controls></video></div>
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (4).mp4" controls></video></div>
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (5).mp4" controls></video></div>
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (6).mp4" controls></video></div>
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (7).mp4" controls></video></div>
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (8).mp4" controls></video></div>
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (9).mp4" controls></video></div>
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (10).mp4" controls></video></div>
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (11).mp4" controls></video></div>
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (12).mp4" controls></video></div>
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (13).mp4" controls></video></div>
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (14).mp4" controls></video></div>
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (15).mp4" controls></video></div>
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (16).mp4" controls></video></div>
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (17).mp4" controls></video></div>
          <div class="col-md-4 gimg"><video class="img-fluid" src="static/videos/video (18).mp4" controls></video></div>
        </div>
      </div>

  </div>

</section>

<?php 
    include "includes/footer.php";
?>