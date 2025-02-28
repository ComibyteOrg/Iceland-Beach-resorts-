<?php 
    $title = "Available Rooms";
    include_once "includes/header.php"; 
    require_once "core/validations/Validatebooking.php";

    $query_room = new Dbquery();
    if(isset($_POST['book'])){
        $validatebooking = new Validatebooking();
        $alerts = $validatebooking->validate($_POST);
    }

    if(isset($_GET['room'])):
        $room_name = $_GET['room'];
        $check_room = $query_room->select("room", "*", "room_name = ? AND is_booked = ?", [$room_name, 'no'], "ss");
            if($check_room->num_rows > 0):
                $roomName = $check_room->fetch_assoc();
?>


    <link rel="stylesheet" href="static/styles/form.css">
    <form method="post">
    <h4>INPUT YOUR DETAILS</h4>
    <?php require_once "core/controller/alert.php"; ?>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="My Name" name="fullname">
        <label for="floatingInput">Full Name</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput2" placeholder="name@example.com" name="email">
        <label for="floatingInput2">Email Address</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput2" placeholder="Sample Name" value="<?=$roomName['room_name']?>" readonly name="roomname">
        <label for="floatingInput2">Room Name</label>
    </div>
    <div class="form-floating mb-3">
        <input type="date" class="form-control" id="floatingInput3" placeholder="signindate" name="signindate">
        <label for="floatingInput3">SignIn Date</label>
    </div>
    <div class="form-floating mb-3">
        <input type="date" class="form-control" id="floatingInput4" placeholder="signoutdate" name="signoutdate">
        <label for="floatingInput4">Signout Date</label>
    </div>

    <div>
        <input type="hidden" class="form-control" id="floatingInput2" placeholder="Sample Name" value="<?=$roomName['room_price']?>" readonly name="roomprice">
    </div>

    <div class="form-floating mb-3"> 
       <button class="btn btn-primary w-100 py-3" name="book" type="submit">Book Now</button>
    </div>
    </form>


<?php 
        else:
            echo "<div class='p-4 shadow text-center'>No room Selected or Room is booked</div>";
        endif;
    else:
        echo "<div class='p-4 shadow text-center'>No room Selected</div>";
    endif;
    include_once "includes/footer.php";
?>