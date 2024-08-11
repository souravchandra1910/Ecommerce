<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forget Password</title>
  <link rel="stylesheet" href="../View/css/style.css">
</head>
<body>
  <?php
     require_once 'Message.php';
  ?>
  <div class="outer-box">
    <div class="inner-box">
      <header class="signup-header">
        <h1>Reset</h1>
      </header>
      <main class="signup-body">
        <form action="/forget" method="post">
          <p>
            <label for="email">Your Email</label>
            <input type="email" id="email" name="Email_id" placeholder="souravchandra@gmail.com" required>
          </p>
          <p>
            <input type="submit" id="submit" name="submit" value="Send Token">
          </p>
        </form>
      </main>
      <footer class="signup-footer">
        <p>Don't have an Account? <a href="/register">signup</a></p>
      </footer>
    </div>
    <div class="circle c1"></div>
    <div class="circle c2"></div>
  </div>
</body>
</html>
