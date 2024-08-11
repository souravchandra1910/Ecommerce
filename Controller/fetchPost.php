<?php

require_once '../vendor/autoload.php';
require_once '../Model/Read.php';
require_once '../Core/Dotenv.php';

// Creating object of Dotenv class.
$env = new Dotenv();

// Creating an object of Read class.
$select = new Read($_ENV['username'], $_ENV['password'], $_ENV['dbname']);

// Creating an object of Read class.
$rows = $select->getPost($count);
