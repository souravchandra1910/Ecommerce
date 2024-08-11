<title>Home</title>
<link rel="stylesheet" href="./View/css/navbar.css">
<link rel="stylesheet" href="../View/css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<?php
require_once 'Navbar.php';
?>
<body>
  <?php
  require_once "post.php";
  ?>
  <div class="total">
    <div class="content1">
    </div>
    <div class="content">
    </div>
    <div class="container btn-container">
      <button class="load-data load-more">Click me load data</button>
    </div>
  </div>
  <script src="../View/script/Ajax.js"></script>
  <script src="../View/script/script.js"></script>
</body>
