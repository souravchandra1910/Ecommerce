<?php

// Setting image.
$img=NULL;
if (isset($_FILES['file'])){
  $img = file_get_contents($_FILES['file']['tmp_name']);
}
$text = $_POST['text'];
require_once 'InsertPost.php';

