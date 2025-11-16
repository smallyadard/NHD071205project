<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web quản lý học sinh</title>
  <link rel="stylesheet" href="css/indexstyle.css">
  <style>
    .change-password-form {
      margin-top: 20px;
    }
  </style>
</head>
<body class="body-home">
  <div class="login-box">
    <h1>おはよう</h1>    
    <h2>Đăng nhập</h2>
    <form action="login.php" method="POST">
      <input type="text" name="username" placeholder="Tên đăng nhập" required>
      <input type="password" name="password" placeholder="Mật khẩu" required>
      <input type="submit" value="Đăng nhập">
    </form>

    <!-- Nút đổi mật khẩu cách xa nút đăng nhập -->
    <form action="changepassword.php" method="GET" class="change-password-form">
      <input type="submit" value="Đổi mật khẩu">
    </form>
  </div>
</body>
</html>
