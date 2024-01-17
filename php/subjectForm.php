<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if(isset($_POST["send"])){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $errors = array();

        $checkName = '/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,10}$/';
        $checkEmail = '/[a-z0-9]+@[a-z]+\.[a-z]{2,3}/';
        $checkMessage = '/[A-z]{3,}/';

        if (!preg_match($checkName, $name)) {
            $errors[] = 'The name is not correctly written.';
        }

        if (!preg_match($checkEmail, $email)) {
            $errors[] = 'Please enter the correct email.';
        }

        if (!preg_match($checkMessage, $message)) {
            $errors[] = 'Write a message.';
        }

        if (!empty($errors)) {
            echo json_encode($errors);
        } else {
            $mail = new PHPMailer(true);
    
            $mail->IsSMTP;
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'nikolajanjicrs@gmail.com';
            $mail->Password = '';
            $mail->SMTPSecure='ssl';
            $mail->Port = 465;
    
            $mail->setFrom('nikolajanjicrs@gmail.com');
    
            $mail->addAddress($email);
    
            $mail->isHTML(true);
    
            $mail->Subject = $_POST["subject"];
            $mail->Body = $name. " " .$message;
    
            try {
                $mail->send();
                echo json_encode(array('success' => 'You have successfully sent the email.'));
            } catch (Exception $e) {
                echo json_encode(array('error' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo));
            }
    
        }


    }
?>