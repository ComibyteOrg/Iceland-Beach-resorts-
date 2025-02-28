<?php
    $title = "Member Login";
    include_once "includes/header.php";
    require_once "core/validations/Validatelogin.php";

    if(count($_POST) > 0){
        $login = new Validatelogin();
        $alerts = $login->validLogin($_POST);
    }
?>
<style>
    form{
            width: 500px;
            max-width: 90%;
        }
</style>
<div class="container my-5 py-5">
        <form method="post" class="mx-auto">
            <h3 class="text-uppercase">MEMBERS LOGIN</h3>
            <?php require_once "core/controller/alert.php"; ?>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput2" placeholder="name@example.com" name="email">
                <label for="floatingInput2">Email Address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput3" placeholder="name@example.com" name="password">
                <label for="floatingInput3">Password</label>
            </div>
            <div class="form-floating mb-3 text-end">
                <small>Not a member ? <a class="text-warning" href="membership">Join Now</a></small>
            </div>
            <div class="form-group mb-3">
                <button type="submit" name="login" class="btn btn-warning w-100">Login</button>
            </div>
            <div class="form-group mb-3">
                <a href="../../index" class="btn btn-secondary w-100">Back Home</a>
            </div>
        </form>
    </div>



<?php 
    include_once "includes/footer.php";
?>