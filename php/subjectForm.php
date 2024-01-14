<?php
    // if($_SERVER["REQUEST_METHOD"] == "POST"){
    //     $name = $_POST["name"];
    //     $email = $_POST["email"];
    //     $message = $_POST["message"]


    //     $to = "nikolajanjicrs@gmial.com";
    //     $subject = $_POST["subject"];
    //     $headers = "From: $email";

    //     mail($to,$subject,$message,$headers);
    // }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if(isset($_POST["send"])){
        // $name = $_POST["name"];
        // $email = $_POST["email"];
        // $message = $_POST["message"]

        $mail = new PHPMailer(true);

        $mail->IsSMTP;
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nikolajanjicrs@gmail.com';
        $mail->Password = '';
        $mail->SMTPSecure='ssl';
        $mail->Port = 465;

        $mail->setFrom('nikolajanjicrs@gmail.com');

        $mail->addAddress($_POST["email"]);

        $mail->isHTML(true);

        $mail->Subject = $_POST["subject"];
        $mail->Body = $_POST["message"];

        $mail->send();

        echo
        "
        <script>
        alert('Sent Successfully');
        document.location.href='index.html'
        </script>
        "


    }
?>