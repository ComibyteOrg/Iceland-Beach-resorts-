<?php 
    if(isset($alerts) and is_array($alerts)){
        foreach ($alerts as $alert ) {
            echo $alert;
        }
    }