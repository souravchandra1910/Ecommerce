<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link rel="stylesheet" href="../View/css/style.css">
  <link rel="stylesheet" href="./View/css/navbar.css">
</head>
<body>
  <div class="container">
    <main class="signup-body">
      <form action="" enctype="multipart/form-data" method="POST">
        <div class="post-container">
          <div class="post"><textarea name="text" id="text" cols="36" rows="1" placeholder="what's on your mind" required></textarea></div>
          <div class="post"><input type="file" name="image" id="image" accept="image/png,image/jpeg"></div>
        </div>
        <div class="text-center">
          <input type="submit" id="submit" name="submit" value="Post">
      </form>
    </main>
  </div>
</body>
</html>
