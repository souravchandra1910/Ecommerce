<?php

require_once 'Core/Dotenv.php';
require_once 'vendor/autoload.php';
// Creating object of Dotenv class.
$env = new Dotenv();
/**
 * Function to set user data.
 *
 * @param mixed $mail
 *   An instance of PHPMailer is passed as a parameter to set all user
 *   related data.
 *
 */

function setUserData(mixed $mail){

  // Set the SMTP server to send through.
  $mail->Host = $_ENV['host'];

  // Enable SMTP authentication.
  $mail->SMTPAuth = true;

  // SMTP username
  $mail->Username = $_ENV['mail_username'];

  // SMTP password.
  $mail->Password = $_ENV['mail_password'];

  // Enable implicit TLS encryption.
  $mail->SMTPSecure = 'ssl';

  // TCP port to connect to; use 587 if you have set
  // `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`.
  $mail->Port = 465;
}

/**
 * Function to send email.
 *
 * @param mixed $mail
 *   An instance of PHPMailer is passed as a parameter to set all user
 *   related data.
 * @param mixed $email
 *   User's email id.
 *
 */

function sendMail(mixed $mail, mixed $email){
  // Sender.
  $mail->setFrom($_ENV['mail_username']);

  // Recipient.
  $mail->addAddress($email);
}

/**
 * Function to send Email data
 *
 * @param mixed $mail
 *   An instance of PHPMailer is passed as a parameter to set all user
 *   related data.
 * @param string $otp
 *   Otp generated.
 */

function sendMailData(mixed $mail,string $otp){
  // Set email format to HTML.
  echo "Send";
  $mail->isHTML(true);

  // Set Subject and Email body.
  $mail->Subject = 'Here is your OTP';
  $mail->Body    = "<h2>{$otp}</h2>";
}

function sendMailDataToken(mixed $mail,string $token){
  // Set email format to HTML.
  $mail->isHTML(true);

  // Set Subject and Email body.
  $mail->Subject = "Password Reset";
  $mail->Body = <<<END

    Click <a href="http://site4.com/View/Reset.php?token=$token">here</a>
    to reset your password.
    END;
}
