<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link rel="stylesheet" href="../View/css/style.css">
</head>
<body>
  <div class="outer-box">
    <div class="inner-box">
      <header class="signup-header">
        <h1>Signup</h1>
      </header>
      <main class="signup-body">
        <form action="/register" enctype="multipart/form-data" method="post">
          <p>
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="User_firstname" placeholder="Enter your First name" required>
          </p>
          <p>
            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="User_lastname" placeholder="Enter your Last name" required>
          </p>
          <p>
            <label for="email">Your Email</label>
            <input type="email" id="email" name="Email_id" placeholder="email@gmail.com" required>
          </p>
          <p>
            <label for="password">Your New Password</label>
            <input type="password" id="password" name="Password" placeholder="at least 8 characters" required>
          </p>
          <p>
            <input type="submit" id="submit" name="submit" value="Create Account">
          </p>
        </form>
      </main>
      <footer class="signup-footer">
        <p>Already have an Account? <a href="/">Login</a> </p>
      </footer>
    </div>
    <div class="circle c1"></div>
    <div class="circle c2"></div>
  </div>
  <script src='../View/script/script.js'></script>
</body>
</html>
