<?php

session_start();
require_once 'vendor/autoload.php';
require_once 'Model/Read.php';
require_once 'Core/Dotenv.php';

// Creating object of Dotenv class.
$env=new Dotenv();

// Creating an object of Read class.
$select = new Read($_ENV['username'], $_ENV['password'],$_ENV['dbname']);

$rows = $select->getUser($_SESSION['Email_id']);

require_once './View/profile.php';
