<?php 
    require_once "core/config/dbquery.php";
    require_once "core/controller/controller.php";

    class Validatelogin extends Dbquery{
        public $alerts = array();

        public function validLogin($post){
            $email = Controller::sanitize($post['email']);
            $password = Controller::sanitize($post['password']);

            if(empty($email) or empty($password)){
                $this->alerts[] = Controller::alert("danger", "All inputs must be filled");

            } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $this->alerts[] = Controller::alert("danger", "Please Provied a valid email");
            }

            if(count($this->alerts) == 0){
                $selectuser = $this->select("membership", "*", "email = ? AND member_status = ?", [$email, 'paid'], "ss");
                if($selectuser->num_rows > 0){
                    $user = $selectuser->fetch_assoc();
                    $_SESSION['email'] = $user['email'];
                    $user_password = $user['password'];
                    
                    if(password_verify($password, $user_password)){
                        $_SESSION['password'] = $password;
                        $this->alerts = Controller::alert("success", "Logged In successfully");
                        echo Controller::counttime("1", "index");
                    }else{
                        $this->alerts[] = Controller::alert("danger", "Incorrect Password");
                    }
                }else{
                    $this->alerts[] = Controller::alert("danger", "User not found");
                }
            }

            return $this->alerts;
        }
    }