<?php
    session_start();
    $title = "Admin Login";
    require_once "../core/controller/controller.php";
    require_once "../core/config/dbquery.php";

    $query = new Dbquery();
    $error = "";
    if(isset($_POST['login'])){
        $username = Controller::sanitize($_POST['username']);
        $password = Controller::sanitize(md5($_POST['password']));

        // echo $password;

        if(empty($username) or empty($password)){
            $error = Controller::alert("danger", "Inputs must not be empty");
        }else{
            $selectadmin = $query->select("admin", "*", "username = ?", [$username], "s");

            if($selectadmin->num_rows > 0){
                $selected = $selectadmin->fetch_assoc();
    
                if(hash_equals($selected['password'], $password)){
                    header("Location: index.php");
                    $_SESSION['username'] = $selected['username'];
                    $_SESSION['password'] = $selected['password'];
                }
                $error = Controller::alert("danger", "Incorrect Password");
            }
            // $error = Controller::alert("danger", "Account not found");
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
   <link rel="icon" type="image/png" sizes="16x16" href="../static/images/img (1).png">
    <title>Iceland Beach resorts | Admin Pannel</title>
</head>
<body>

  <style>
    table{
      overflow-x: auto;
    }
    th, td{
      min-width: max-content;
    }
    body{
        overflow-x: auto;
    }
  </style>

<nav>
   <div class="logo"><img src="../static/images/img (1).png" alt="Iceland Logo" width="30"><span class="lead ms-3"> | ADMIN PANNEL</span></div>
   <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
      <i class="fa fa-bars"></i>
   </button>
</nav>

<style>
    form{
            width: 500px;
            max-width: 90%;
        }
</style>
<div class="container my-5 py-5">
        <form method="post" class="mx-auto">
            <h3 class="text-uppercase">ADMIN LOGIN</h3>
            <?php if(isset($error)): ?>
                <?php echo $error; ?>
            <?php endif; ?>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput2" placeholder="name@example.com" name="username">
                <label for="floatingInput2">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput3" placeholder="name@example.com" name="password">
                <label for="floatingInput3">Password</label>
            </div>
            <div class="form-group mb-3">
                <button type="submit" name="login" class="btn btn-warning w-100">Login</button>
            </div>
            <div class="form-group mb-3">
                <a href="../../index" class="btn btn-secondary w-100">Back Home</a>
            </div>
        </form>
    </div>



</body>
</html>