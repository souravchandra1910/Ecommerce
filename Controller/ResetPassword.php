<?php

require_once 'Model/Read.php';
require_once 'Core/Dotenv.php';
require_once 'vendor/autoload.php';

// Creating object of Dotenv class.
$env = new Dotenv();

/**
 * Function to reset password.
 *
 * @param string $password_id
 *   User's password.
 */
function resetPassword(string $password_id){
  session_start();
  $validator = new Validation();
  // Creating an object of Read class.
  $select = new Read($_ENV['username'], $_ENV['password'], $_ENV['dbname']);

  // Calling the function to reset password.
  if($select->resetPassword($_SESSION['Token'],$_SESSION['Email_id'],$password_id)){

   // If reset is successful then navigate to the login page.
   $validator->destroySession();
   $message = urlencode('Reset successfully');
   header("Location:/?message={$message}");
  }
  else {
   $validator->destroySession();
   // If reset id not successful then navigate to the login page.
   $message = urlencode('Reset not successfully');
   header("Location:/forget?message={$message}");
  }
}
