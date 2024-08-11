<?php

require_once '../Model/Update.php';
require_once '../Model/Insertion.php';
require_once '../Core/Dotenv.php';
require_once '../vendor/autoload.php';

// Creating object of Dotenv class.
$env = new Dotenv();
// Creating object of Insertion class.
$insert_post = new Insertion($_ENV['username'], $_ENV['password'], $_ENV['dbname']);
$current_time = time();
session_start();

// Inserting post related data.
$insert_post->insertImage($current_time, $text, $img, $_SESSION['Email_id']);
