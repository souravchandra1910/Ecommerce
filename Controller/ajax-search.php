<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once '../Model/Read.php';
require_once '../Core/Dotenv.php';

$env=new Dotenv();
// Creating an object of Read class.
$select = new Read($_ENV['username'], $_ENV['password'], $_ENV['dbname']);

// Function to get post on search key.
$rows = $select->getPostwithSearch($_POST['search']);

foreach ($rows as $row) {
?>
  <div class="container">
    <div class="box-container">
      <div class="box">
          <?php
        if($row['image']!=null){
        ?>
        <div class="Home-image">
          <?php echo '<img src="data:image;base64,' . base64_encode($row['image']) . '" >'; ?>
        </div>
        <?php
        }
        ?>
        <div class="text"> BIO : <?= $row['text'] ?></div>
        <div class="user"> From User : <?= $row['Email_id'] ?></div>
        <div class="user"> First Name : <?= $row['User_firstname'] ?></div>
        <div class="user"> Last Name : <?= $row['User_lastname'] ?></div>
        <div class="user"> Time : <?= $row['time'] ?></div>
      </div>
    </div>
  </div>
<?php
}
