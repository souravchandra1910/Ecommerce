<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<?php
session_start();
$url = parse_url($_SERVER['REQUEST_URI']);
$_SESSION['Token']=substr($url['query'],6);
?>
<body>
  <div class="outer-box">
    <div class="inner-box">
      <header class="signup-header">
        <h1>Password</h1>
      </header>
      <main class="signup-body">
        <form action="/reset" method="post">
          <p>
            <label for="Password">Password</label>
            <input type="password" id="Password" name="Password" placeholder="Enter new Password" required>
          </p>
          <p>
            <input type="submit" id="submit" name="submit" value="submit password">
          </p>
        </form>
    </div>
    <div class="circle c1"></div>
    <div class="circle c2"></div>
  </div>
</body>
</html>
