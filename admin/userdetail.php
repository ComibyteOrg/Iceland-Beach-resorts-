<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../static/styles/style.css">
    <link rel="stylesheet" href="style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="../static/CAOS.file/CAOS.file.v-1.5/style.css">
  
   <link rel="icon" type="image/png" sizes="16x16" href="../static/images/img (1).png">
    <title>Iceland Beach resorts | Admin Pannel</title>
</head>
<body>
<?php 
    require_once "../core/config/dbquery.php";
    require_once '../core/controller/controller.php';

    $query = new Dbquery();

    if(isset($_GET['name'])):
        $name = Controller::sanitize($_GET['name']);
        $data = $query->select("membership", "*", "full_name = ?", [$name], 's');
            if($data->num_rows > 0):
                $fetchuser = $data->fetch_assoc();
?> 
    <div class="container">
        

        <h2>User Details</h2>
        <div class="card my-5">
            <div class="card-body">
                <h3 class="card-title mb-4">Name: <?php echo $fetchuser['full_name'];?></h3>
                <a href="mailto: <?php echo $fetchuser['email'];?>" class="card-subtitle mb-2 text-muted">Email: <?php echo $fetchuser['email'];?></a>
                <h6 class="card-text mb-2 text-muted">Date Of Birth: <?php echo $fetchuser['dob'];?></h6>
                <h6 class="card-text mb-2 text-muted">Place Of Birth: <?php echo $fetchuser['pob'];?></h6>
                <a href="tel: <?php echo $fetchuser['phone_no'];?>" class="card-text mb-2 text-muted">Phone: <?php echo $fetchuser['phone_no'];?></a>
                <h6 class="card-text mb-2 text-muted">Membership Type: <?php echo $fetchuser['type'];?></h6>
                <h6 class="card-text mb-2 text-muted">Join Date: <?php echo $fetchuser['start_date'];?></h6>
                <h6 class="card-text mb-2 text-muted">Expiry Date: <?php echo $fetchuser['end_date'];?></h6>
                <h6 class="card-text mb-2 text-muted">Address: <?php echo $fetchuser['address'];?></h6>
                <h6 class="card-text mb-2 text-muted">City: <?php echo $fetchuser['city'];?></h6>
                <h6 class="card-text mb-2 text-muted">Nationality: <?php echo $fetchuser['nationality'];?></h6>
                <h6 class="card-text mb-2 text-muted">Emergency Name: <?php echo $fetchuser['ename'];?></h6>
                <h6 class="card-text mb-2 text-muted">Emergency Number: <a href="tel: <?php echo $fetchuser['ephone'];?>"><?php echo $fetchuser['ephone'];?></a></h6>
                
                <a href="index.php" class="btn btn-secondary my-4">Back Home</a>
            </div>
        </div>
        </div>

            <?php else: ?>
                <p class="text-center mt-5 mb-2 text-muted">User does'nt exist</p>
                <a href="index.php" class="btn btn-secondary my-4">Back Home</a>
            <?php endif; ?>



    </div>
<?php else: ?>
    <h1 class="text-center my-5">No User is Available</h1>
<?php endif; ?>
<!-- FOOTER -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- javascript -->
<script src="../static/scripts/script.js"></script>
</body>
</html>