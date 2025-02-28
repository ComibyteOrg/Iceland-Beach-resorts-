<?php 
    class Controller{
        public static function sanitize($input){
            $input = htmlspecialchars($input);
            $input = trim($input);
            $input = stripslashes($input);

            return $input;
        }

        public static function alert($type, $message){
            return "<div class='alert alert-{$type}'>$message</div>";
        }

        public static function counttime($seconds, $value){
            return 
            "
                <script>
                    setInterval(() => {
                        window.location.href = '$value'
                    }, $seconds);
                </script>
            ";
        }
    }