<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Mail response page</title>
    <style>
    body {
        color: #00C1FF;
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100vw;
        height: 100vh;
        background-image: linear-gradient(60deg, rgba(236, 246, 248, 0.7) 15%, rgba(174, 188, 209, 0.7), rgba(233, 247, 250, 0.6) 85%);
        background-size: cover;
    }

    div.m-auto {
        width: 100%;
        height: 40vh;
    }

    div.row {
        padding: 10px;
        background: #284866;
        position: absolute;
        margin: auto;
        width: 100%;
        bottom: 0;
    }

    a {
        margin: auto;
    }

    img {
        width: 100%;
    }
    </style>
</head>

<body>

<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try{
    //Server settings
    $mail->SMTPDebug = false;                      // Enable verbose debug output
    // $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = gethostbyname('smtp.gmail.com');                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'spicedsimply@gmail.com';                     // SMTP username
    $mail->Password   = 'nivax316';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->SMTPOptions = array(
        'tls' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    $from = $_POST["email"];
    $name = $_POST["name"];
    $body = $_POST["message"];
    $mail->addAddress('spicedsimply@gmail.com'); // Set the recipient of the message.
    $mail->AddReplyTo($from, $name);
    $mail->setFrom($from, $name); // Set the sender of the message.
    $mail->Subject = 'Message from website'; // The subject of the message
    $mail->Body = $body; // Set a plain text body.
    if ($mail->send()) {?>
        <div class="m-auto text-center">
            <h2>
                <?php 
        echo 'Your message was sent successfully!' . "       $from"; ?>
            </h2>
            <div class="row no-gutters text-center m-auto">
                <a href="#"><img src="img/rddesign-weis.png" alt="logo footer"></a>
                <p class="text-center w-100"><small>Copyright © RDdesign 2020. All Rights Reserved</small></p>
            </div>
        </div>
        <?php
        header( "refresh:3;url=http://simplyspiced.rs/" );
    } 
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo} {$e}";
} ;?>
    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
    </body>
    
    </html>