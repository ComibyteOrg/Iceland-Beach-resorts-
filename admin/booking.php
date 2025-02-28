<?php 
    session_start();
    require_once "../core/config/dbquery.php";
    $query = new Dbquery();

    if(isset($_SESSION['username'])):
        $username = $_SESSION['username'];
        $selectuser = $query->select("admin", "*", "username = ?", [$username], "s");

        // room booking
        if(isset($_POST['booknow'])){
            $r_name = htmlspecialchars($_POST['r_name']);
            $r_mail = htmlspecialchars($_POST['r_mail']);
            $signin = htmlspecialchars($_POST['signin']);
            $signout = htmlspecialchars($_POST['signout']);
            $room = $_GET['room'];
            $updaterooms = $query->update("room", ['customer_name' => $r_name, 'email' => $r_mail, 'is_booked' => 'booked', 'start_date' => $signin, 'end_date' => $signout], "room_name = '$room'");
            if($updaterooms){
                echo "<div class='alert alert-success'> <strong>Success!</strong> Room booked successfully </div>";
                echo "<script> 
                    setTimeout(() => {
                        window.location.href = 'index.php'
                    }, 2000);
                    </script>";
            }else{
                echo "<div class='alert alert-danger'> Could not book room". $query->conn->error. "</div>";
            }
        }

        // service booking
        if(isset($_POST['bookservice'])){
            $s_name = htmlspecialchars($_POST['s_name']);
            $s_mail = htmlspecialchars($_POST['s_mail']);
            $signin = htmlspecialchars($_POST['signin']);
            $signout = htmlspecialchars($_POST['signout']);
            $noofpeople = htmlspecialchars($_POST['nofopeople']);
            $space = $_GET['space'];
            $updateservice = $query->update("services", ['customers_name' => $s_name, 'customers_email' => $s_mail, 'signin' => $signin, 'signout' => $signout, 'is_booked' => 'booked', 'no_of_people' => $noofpeople], "service_name = '$space'");
            if($updateservice){
                echo "<div class='alert alert-success'> <strong>Success!</strong> Service booked successfully </div>";
                echo "<script> 
                    setTimeout(() => {
                        window.location.href = 'index.php'
                    }, 2000);
                    </script>";
            }else{
                echo "<div class='alert alert-danger'> Could not book service". $query->conn->error. "</div>";
            }
        }

        // free room
        if(isset($_POST['unfree'])){
            $room = $_GET['free'];
            $free = $query->update("room", ['is_booked' => 'no', 'customer_name' => NULL, 'email' => NULL], "room_name = '$room'");
            if($free){
                echo "<div class='alert alert-success'> <strong>Success!</strong> Room freed successfully </div>";
                echo "<script> 
                    setTimeout(() => {
                        window.location.href = 'index.php'
                    }, 2000);
                    </script>";
            }else{
                echo "<div class='alert alert-danger'> Could not free room". $query->conn->error. "</div>";
            }
        }

        // free service
        if(isset($_POST['freeservice'])){
            $space = $_GET['frees'];
            $unbook = $query->update("services", ['customers_name' => NULL, 'customers_email' => NULL, 'no_of_people' => 0, 'is_booked' => 'no'], "service_name = '$space'");
            if($unbook){
                echo "<div class='alert alert-success'> <strong>Success!</strong> Service freed successfully </div>";
                echo "<script> 
                    setTimeout(() => {
                        window.location.href = 'index.php'
                    }, 2000);
                    </script>";
            }else{
                echo "<div class='alert alert-danger'> Could not free service". $query->conn->error. "</div>";
            }
        }
?>




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
   <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Iceland Beach resorts | Admin Pannel</title>
</head>
<body>

<?php  
    if(isset($_GET['room']) and $_GET['room'] != ""):
        $room = $_GET['room'];
?>

    <div class="container p-4">
        <form method="post" class="mt-5 mx-auto" style="width: 500px; max-width: 90%;">
            <h2>Add new room to room "<?php echo $room;?>"</h2>
            <div class="mb-1">
                <label for="r_name" class="form-label">Recipient Name</label>
                <input type="text" class="form-control" id="r_name" name="r_name" required>
            </div>
            <div class="mb-1">
                <label for="r_mail" class="form-label">Recipient Email</label>
                <input type="email" class="form-control" id="r_mail" name="r_mail" required>
            </div>
            <div class="mb-1">
                <label for="signin" class="form-label">Signin Date</label>
                <input type="datetime-local" class="form-control" id="signin" name="signin" required>
            </div>
            <div class="mb-1">
                <label for="signout" class="form-label">Signout Date</label>
                <input type="datetime-local" class="form-control" id="signout" name="signout" required>
            </div>
            <div class="mt-3">
                <a href="index.php" class="btn btn-close-white btn-secondary">Back Home</a>
                <button type="submit" class="btn btn-success" name="booknow">Book Room</button>
            </div>
        </form>
    </div>

<?php  
    elseif(isset($_GET['space']) and $_GET['space'] != ""):
        $space_name = $_GET['space'];
?>

    <div class="container p-4">
        <form method="post" class="mt-5 mx-auto" style="width: 500px; max-width: 90%;">
            <h2>Add new order to service "<?php echo $space_name;?>"</h2>
            <div class="mb-1">
                <label for="r_name" class="form-label">Recipient Name</label>
                <input type="text" class="form-control" id="s_name" name="s_name" required>
            </div>
            <div class="mb-1">
                <label for="s_mail" class="form-label">Recipient Email</label>
                <input type="email" class="form-control" id="s_mail" name="s_mail" required>
            </div>
            <div class="mb-1">
                <label for="signin" class="form-label">Signin Date</label>
                <input type="datetime-local" class="form-control" id="signin" name="signin" required>
            </div>
            <div class="mb-1">
                <label for="signout" class="form-label">Signout Date</label>
                <input type="datetime-local" class="form-control" id="signout" name="signout" required>
            </div>
            <div class="mb-1">
                <label for="nofopeople" class="form-label">Number of Visitors</label>
                <input type="number" class="form-control" id="nofopeople" name="nofopeople" required min="1" max="10">
            </div>
            <div class="mt-3">
                <a href="index.php" class="btn btn-close-white btn-secondary">Back Home</a>
                <button type="submit" class="btn btn-success" name="bookservice">Book Service</button>
            </div>
        </form>
    </div>


<?php 
    elseif(isset($_GET['free']) and $_GET['free']!= NULL): 
    $room = $_GET['free'];
?>

    <div class="container p-4">
        <form method="post" class="mt-5 mx-auto" style="width: 500px; max-width: 90%;">
        <h2>Free room "<?php echo $room;?>"</h2>
            <p>Are You sure you want to free this room. Note: The if room is free any user can book this room and can see it on the booking section</p>
            <div class="mt-3">
                <a href="index.php" class="btn btn-close-white btn-secondary">Back Home</a>
                <button type="submit" class="btn btn-success" name="unfree">Free Room</button>
            </div>
        </form>
    </div>



<?php 
    elseif(isset($_GET['frees']) and $_GET['frees']!= NULL): 
    $frees = $_GET['frees'];
?>

    <div class="container p-4">
        <form method="post" class="mt-5 mx-auto" style="width: 500px; max-width: 90%;">
        <h2>Free Service "<?php echo $frees;?>"</h2>
            <p>Are You sure you want to free this service. Note: The if service is free any user can book this service and can see it on the booking section</p>
            <div class="mt-3">
                <a href="index.php" class="btn btn-close-white btn-secondary">Back Home</a>
                <button type="submit" class="btn btn-success" name="freeservice">Free service</button>
            </div>
        </form>
    </div>



<?php else: ?>
    <div class="mt-5 mx-auto text-center" style="width: 500px; max-width: 90%;">
        <p class="text-center lead"> No room or service is selected </p>
        <a href="index.php" class="btn btn-close-white btn-secondary">Back Home</a>
    </div>
<?php endif;?>






<!-- FOOTER -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
<!-- javascript -->
<script src="../static/scripts/script.js"></script>
</body>
</html>

<?php else: ?>
    echo "<script> window.location.href = "../index.php"</script>";
<?php endif; ?>