<?php

$count=$_POST['count'];

require_once '../Controller/fetchPost.php';

// Checking whether Data exists or not.
if(count($rows)) {
foreach ($rows as $row) {
?>
  <div class="container">
    <div class="box-container">
      <div class="box">
        <?php
        if($row['image']!=null) {
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
}
