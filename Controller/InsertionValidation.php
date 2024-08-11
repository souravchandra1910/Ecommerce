<?php

require_once 'Model/Read.php';
require_once 'Core/Dotenv.php';
require_once 'vendor/autoload.php';
require_once 'Mailer.php';
require_once 'FieldValidation.php';

// Creating an object of Dotenv class.
$env = new Dotenv();

/**
 * Function validate insertion and send otp.
 *
 * @param string $email_id
 *   User provided email.
 * @param string $password_id
 *   User's password.
 * @param string $first_name
 *   User's first name.
 * @param string $last_name
 *   User's last name.
 */
function insert(string $email_id, string $password_id, string $first_name, string $last_name){
  // Creating a object of FieldValidation.
  $field_validator = new FieldValidation();
  // Creating an object of Read class.
  $select = new Read($_ENV['username'], $_ENV['password'], $_ENV['dbname']);
  // Checking for valid Email pattern.
  if ($field_validator->emailValidation($email_id)) {
    // Checking if the User exists.
    if ($select->UserExist($email_id)) {
      session_start();
      $_SESSION['Email_id'] = $email_id;
      $_SESSION['User_firstname'] = $first_name;
      $_SESSION['User_lastname'] = $last_name;
      $_SESSION['Password'] = $password_id;
      $OTP = rand(1000, 9999);
      $_SESSION['OTP'] = $OTP;
      // Creating an object of PHP-Mailer to send Otp via Mail.
      $Mail = new Mailer($email_id);
      // Calling class method and passing in the Otp to be send.
      $Mail->register($OTP);
    }
    else {
      // Redirecting to login page id user already exists.
      $userExists = "UserExist";
      header("Location:/?userExists={$userExists}");
    }
  }
}
