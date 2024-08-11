<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP</title>
  <link rel="stylesheet" href="./View/css/style.css">
</head>
<body>
  <div class="outer-box">
    <div class="inner-box">
      <header class="signup-header">
        <h1>OTP</h1>
      </header>
      <main class="signup-body">
        <form action="/otp" method="post">
          <p>
            <label for="OTP">OTP</label>
            <input type="number" id="OTP" name="OTP" placeholder="OTP" required>
          </p>
          <p>
            <input type="submit" id="submit" name="submit" value="Verify OTP">
          </p>
        </form>
    </div>
    <div class="circle c1"></div>
    <div class="circle c2"></div>
  </div>
</body>
</html>
