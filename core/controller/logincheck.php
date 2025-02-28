<?php 
    require_once "core/config/dbquery.php";
    if(isset($_SESSION['email'])){
        $users = new Dbquery();
        $email = $_SESSION['email'];
        $selectuser = $users->select("membership", "*", "email = ? AND member_status = ?", [$email, 'paid'], "s");
        if($selectuser->num_rows > 0){
            $user = $selectuser->fetch_assoc(); 
        }

        return false;
    }