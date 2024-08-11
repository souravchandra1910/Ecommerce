<?php

/**
 * Class to load dotenv.
 */
class Dotenv{
  public function __construct() {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
  }
}
