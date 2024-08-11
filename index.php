<?php
require_once './Controller/UrlManagement.php';

$manage_url = new UrlManagment();

$url = $_SERVER['REQUEST_URI'];
$url1 = explode("?", $url);
$url = explode("/", $url1[0]);
switch ($url[1]) {
  case '':
    $manage_url->Login();
    break;
  case '/home':
    $manage_url->home();
    break;
  case 'forget':
    $manage_url->forget();
    break;
  case 'register':
    $manage_url->register();
    break;
  case 'otp':
    $manage_url->otp();
    break;
  case 'home':
    $manage_url->home();
    break;
  case 'logout':
    $manage_url->logout();
    break;
  case 'helo':
    require_once './View/helo.php';
    break;
  case 'profile':
    $manage_url->profile();
    break;
  case 'View/Reset.php':
    $manage_url->reset();
    break;
  case 'post':
    $manage_url->post();
    break;
  default:
    $manage_url->default();
}
