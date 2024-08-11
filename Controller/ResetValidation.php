<?php

require_once 'Model/Read.php';
require_once 'Core/Dotenv.php';
require_once 'vendor/autoload.php';
require_once 'Mailer.php';

// Creating object of Dotenv class.
$env = new Dotenv();

/**
 * Function to send reset token.
 *
 * @param string $email_id
 *   User provided email.
 */
function sendToken(string $email_id) {

// Creating an object of Read class.
$select = new Read($_ENV['username'], $_ENV['password'], $_ENV['dbname']);
// Checking for existing user.
  if (!$select->UserExist($email_id)) {
    session_start();

    // Function to generate token.
    $token=$select->generateToken($email_id);
    $_SESSION['Email_id']= $email_id;

    // Creating an object of PHP-Mailer.
    $Mail = new Mailer($email_id);

    // Calling reset function to send token with email.
    $Mail->reset($token);
  }
  else{
    $message = urlencode('User does not ex');
    header("Location:/?message={$message}");
  }
}
