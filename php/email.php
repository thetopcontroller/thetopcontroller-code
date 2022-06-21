<?php

require_once 'PHPMailer.php';
require_once 'Exception.php';
require_once 'SMTP.php';
require_once 'link.php';

$email="";
$from_ip = $_SERVER['REMOTE_ADDR'];
$from_browser = $_SERVER['HTTP_USER_AGENT'];
date_default_timezone_set("Asia/Calcutta");
$date_now = date("r");

if(isset($_POST['email'])){

    if (filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];
        $query = "INSERT INTO `coming_soon` (`email`, `from_ip`, `from_browser`, `date`) VALUES ('$email' , '$from_ip', '$from_browser', '$date_now')";

        if($result = mysqli_query($link, $query))  {

            echo '<div class="status-icon valid"><i class="fa fa-check"></i></div>';
        }else{
            echo "<script>console.log('error','problem with query')</script>"; 
        }

    } else{
        echo '<div class="status-icon invalid"><i class="fa fa-close"></i></div>';
    }
    

}else{
    echo '<div class="status-icon invalid"><i class="fa fa-close"></i></div>';
}




?>