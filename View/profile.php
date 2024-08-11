<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="./View/css/navbar.css">
  <link rel="stylesheet" href="../View/css/style.css?<?= time() ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <?php
  require_once 'Navbar.php';

  ?>
</head>

<body>
  <div class="outer-box">
    <button class="update">Update profile</button>
    <h1>Nazaaarrr aaaaallllliiiii</h1>
    <div class="inner-box update-form">
      <main class="signup-body">
        <form action="" method="post">
          <p>
            <label for="firstname">Update First Name</label>
            <input type="text" id="firstname" placeholder="Enter your First name" required>
          </p>
          <p>
            <label for="lastname">Update Last Name</label>
            <input type="text" id="lastname" placeholder="Enter your Last name" required>
          </p>
          <p>
            <input type="submit" id="submit-update" name="submit" value="update">
          </p>
        </form>
    </div>
    <div class="inner-box in-b box">
      <div>FirstName: <?= $rows['User_firstname'] ?></div>
      <div>LastName: <?= $rows['User_lastname'] ?></div>
      <div>Email-id: <?= $rows['Email_id'] ?></div>
    </div>
    </main>
  </div>
  <script src="../View/script/Ajax.js"></script>
  <script src="../View/script/script.js"></script>
</body>

</html>
