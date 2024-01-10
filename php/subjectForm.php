<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"]


        $to = "nikolajanjicrs@gmial.com";
        $subject = $_POST["subject"];
        $headers = "From: $email";

        mail($to,$subject,$message,$headers);
    }
?>