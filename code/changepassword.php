<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đổi mật khẩu</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
  <div class="border p-4 rounded shadow-sm bg-white" style="min-width: 300px; max-width: 400px;">
    <h2 class="text-center mb-4">Đổi mật khẩu</h2>

    <form action="change.php" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Tên đăng nhập</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" required>
      </div>
      <div class="mb-3">
        <label for="old_password" class="form-label">Mật khẩu cũ</label>
        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Mật khẩu cũ" required>
      </div>
      <div class="mb-3">
        <label for="new_password" class="form-label">Mật khẩu mới</label>
        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Mật khẩu mới" required>
      </div>
      <div class="mb-3">
        <label for="confirm_password" class="form-label">Xác nhận mật khẩu mới</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Xác nhận mật khẩu" required>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-success">Xác nhận</button>
      </div>
    </form>

    <div class="mt-3 text-center">
      <a href="index.html">← Quay lại đăng nhập</a>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
