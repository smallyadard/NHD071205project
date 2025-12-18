<?php
include('connect.php');

$username = $_POST['username'] ?? '';
    $old_password = $_POST['old_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if ($new_password !== $confirm_password) {
        exit('❌ Mật khẩu mới và xác nhận không khớp.');
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->execute(['username' => $username, 'password' => $old_password]);

    if ($stmt->rowCount() === 1) {
        $update = $pdo->prepare("UPDATE users SET password = :new_password WHERE username = :username");
        $update->execute(['new_password' => $new_password, 'username' => $username]);

        echo "Đổi mật khẩu thành công! Đang chuyển về trang đăng nhập...";
        header("refresh:1; url=index.php");
        exit;
    } else {
        exit('Sai tên đăng nhập hoặc mật khẩu cũ.');
    }
?>
