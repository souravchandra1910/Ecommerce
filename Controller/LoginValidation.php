<?php

require_once 'Model/Read.php';
require_once 'Core/Dotenv.php';
require_once 'vendor/autoload.php';

/**
 * Funtion for login validation.
 *
 * @param string $email_id
 *   User's email.
 * @param string $password_id
 *   User's password.
 */
function loginValidation(string $email_id,string $password_id){
  $env = new Dotenv();
  // Creating object of Read class.
  $select = new Read($_ENV['username'], $_ENV['password'], $_ENV['dbname']);
  // Checking if user exists or not.
  if (!$select->UserExist($email_id) ){
     if($select->isPasswordCorrect($email_id,$password_id)){
      session_start();
      $_SESSION['Email_id']= $email_id;
      return TRUE;
      }
      else{
        return FALSE;
      }
    }
    else{
      return FALSE;
    }
 }
