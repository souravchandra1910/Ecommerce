<?php

require_once '../Model/Update.php';
require_once '../Model/Read.php';
require_once '../Core/Dotenv.php';
require_once '../vendor/autoload.php';

// Creating object of Dotenv class.
$env = new Dotenv();

// Creating object of update class.
$update = new Update($_ENV['username'], $_ENV['password'], $_ENV['dbname']);
session_start();

// Calling updateProfile function to update profile information.
$update->updateProfile($_POST['first_name'], $_POST['last_name'], $_SESSION['Email_id']);

// Creating object of read class.
$select = new Read($_ENV['username'], $_ENV['password'], $_ENV['dbname']);

// Function to get user data.
$rows = $select->getUser($_SESSION['Email_id']);

?>
<div>FirstName: <?= $rows['User_firstname'] ?></div>
<div>LastName: <?= $rows['User_lastname'] ?></div>
<div>Email-id: <?= $rows['Email_id'] ?></div>
