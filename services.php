<?php 
  $title = "Our spaces";
  include_once "includes/header.php"; 
  include_once "core/config/dbquery.php"; 
  require_once "core/controller/logincheck.php";

  $query = new Dbquery();
  $space = $query->select("services", "*", "", [], ""); 

?>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    .img-div{
      overflow: hidden;
    }

    .img-div video{
      width: 100%;
      height: 100%;
    }
    #quantity{
      width: 150px;
      border: 1px solid gray !important;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <?php 
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
    }
  ?>

    <section class="text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="text-uppercase">Our spaces</h1>
          <p class="lead text-muted">
            Our mission is to provide exceptional service and quality services to our clients. We strive to create lasting memories through our services.
          </p>
          <p>
            <a href="contact" class="btn btn-primary my-2">Make Enquiry</a>
            <a class="btn btn-secondary my-2" data-bs-toggle="offcanvas" href="#cartoffcanva" role="button" aria-controls="cartoffcanva">View Cart</a>
          </p>
        </div>
      </div>
    </section>
    <div class="album py-5 bg-light"></div>
      <div class="container">
        <div class="row g-3 p-3">
    <?php 
      if($space->num_rows > 0): 
        $currentCategory = "";

        // if add to cart button is clicked
        if (isset($_POST['addtocart'])) {
          $product_id = intval(htmlspecialchars($_POST['product_id']));
          $result = $query->select("services", "*", "id = ?", [$product_id], 'i'); 

          if ($result->num_rows > 0) { 
            // adding to cart 
            if (isset($_SESSION['cart'][$product_id])) {
              $_SESSION['cart'][$product_id]['quantity'] += intval($_POST['quantity']);
            } else {
              $product = $result->fetch_assoc();
              $price = NULL;
              if(isset($user['email'])){
                $price = $price * 10 / 100;
              }
    
              $quantity = intval($_POST['quantity']);
              // calculating price of each product
              // for tached roof 
              if($quantity >= 1 and $quantity < 5 and $product['service_category'] == "hut"){
                $price = 10000;       
              } elseif($quantity >= 5 and $quantity < 10 and $product['service_category'] == "hut"){
                $price = 25000;
              }elseif($quantity >= 10 and $product['service_category'] == "hut"){
                $price = 40000;
              }

              // for bed cubannas 
              if($quantity >= 1 and $product['service_name'] == "Classic Bed cabana"){
                $price = 40000;
              } elseif($quantity >= 1 and $product['service_name'] == "Deluxe Bed cabana"){
                $price = 50000;
              }

              // for vip lounge 
              if($quantity <= 35 and $product['service_category'] == "VIP Lounge"){
                $price = 80000;
              }

              // for creative lounge 
              if($quantity <= 40 and $product['service_category'] == "Creative Lounge"){
                $price = 100000;
              }

              // for creative lounge 
              if($quantity >= 1 and $product['service_category'] == "Stretcher & Umbrella"){
                $price = 5000;
              }




              $_SESSION['cart'][$product_id] = [
                'name' => $product['service_name'],
                'price' => $price,
                'quantity' => intval($_POST['quantity'])
              ];
            }
          } else {
            echo "Could not find result";
          }
        }



        // whiile loop to display services
        while($row = $space->fetch_assoc()):
          if ($currentCategory != $row['service_category']){
            $currentCategory = $row['service_category'];

            echo "<h1 class='text-uppercase mt-4'>" .htmlspecialchars($currentCategory) . "</h1>";
          }
    ?>  
<!-- offcanvas for cart -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cartoffcanva" aria-labelledby="cartoffcanvaLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="cartoffcanvaLabel">Your Cart</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
   <?php 
    if (!empty($_SESSION['cart'])) {
    echo "<h2>Your Cart</h2>";
    $total = 0;
    foreach ($_SESSION['cart'] as $product_id => $item) {
        echo "<p>" . $item['name'] . " - ₦" . $item['price'] . " (Quantity: " . $item['quantity'] . ")</p>";
        $total += $item['price'];
        $_SESSION['total_cart'] = $total;
        $_SESSION['product_id'] = $product_id;
        $_SESSION['quantity'] = $item['quantity'];
    }
    echo "<h2>Total: ₦" . $total . "</h2>";

    echo "<form method='POST' class='sticky-bottom bg-light p-3'>";
    echo "<a href='core/processor/checkout.php' class='btn btn-primary' style='width: 100%; padding: 5px; margin-bottom: 10px;'><span class='fa fa-cart-shopping'></span> Checkout</a>";
    echo "<button type='submit' name='reset_cart' class='btn btn-outline-secondary' style='width: 100%; padding: 5px; margin-bottom: 10px;'><span class='fa fa-times'></span> Clear Cart</button>";
    echo "</form>";

} else {
    echo "<p class='alert alert-warning'>No item has been added to cart</p>";
}

if(isset($_POST['reset_cart'])){
  unset($_SESSION['cart']);
  unset($_SESSION['total_cart']);
  echo "<script>window.location.href = 'services'</script>";
}
   ?>
  </div>
</div>


             <div class="col-md-4">
                <div class="card shadow-sm">
                <div class="img-div">
                  <img src="<?=$row['service_image']?>" alt="ICELAND BEACH RESORT">
                  <video src="<?=$row['service_image']?>" autoplay muted loop></video>
                </div>
                <div class="card-body">
                    <p class="card-text"><?=$row['service_name']?></p>
                    <small class="text-secondary">PRICE MY DEFER BASED ON THE NUMBER OF VISITORS</small>
                    <h3 class="card-text my-3"><?="₦".number_format($row['service_price'])?></h3>
                    <div>
                    <form class="" method="post">
                    <input type="hidden" name="product_id" value="<?=$row['id']?>">
                    <div class="btn-group d-flex justify-content-between align-items-center mb-3">
                        <label for="quantity">Number of Visitors</label>
                        <input type="number" name="quantity" id="quantity" min="1" max="<?=$row['max_no']?>" required>
                    </div>
                        <div class="btn-group d-flex justify-content-between align-items-center">
                          <button class="btn btn-sm btn-outline-secondary" name="addtocart" type="submit">Add to cart</button>
                          <a class="btn btn-sm btn-outline-secondary" data-bs-toggle="offcanvas" href="#cartoffcanva" role="button" aria-controls="cartoffcanva">View Cart</a>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
                  

    <?php endwhile; else:?>

    <?php endif;?>
  </div>
  </div>
  </div>
  </main>

  
<?php include_once "includes/footer.php"; ?>