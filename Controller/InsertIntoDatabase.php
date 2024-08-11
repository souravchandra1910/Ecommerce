<?php

require_once 'Model/Insertion.php';
require_once 'Core/Dotenv.php';
require_once 'vendor/autoload.php';

// Creating object of Dotenv class.
$env = new Dotenv();

/**
 * Function to check otp
 *
 * @param string $otp
 *   Otp entered by user.
 */
function otpcheck(string $otp){
  session_start();
  $validator=new Validation();
  if ($_SESSION['OTP'] == $otp) {

    // Creating an object of Insertion class.
    $insert = new Insertion($_ENV['username'], $_ENV['password'],$_ENV['dbname']);
    // Calling class method for inserting user data into database.
    $insert->insertIntoDatabase(
      $_SESSION['Email_id'],
      $_SESSION['User_firstname'],
      $_SESSION['User_lastname'],
      $_SESSION['Password']
    );

    // Calling function to unset and destroy session variables.
    $validator->destroySession();

    // Sending a success message if registration is successful.
    $register_success = "Registered successed";
    header("Location:/?register_success={$register_success}");
  }
  else{

    // Calling function to unset and destroy session variables.
   $validator->destroySession();

    // Sending a error message if registration is notsuccessful.
    $login_error= "login error";
    header("Location:/?login_error={$login_error}");
  }
}
