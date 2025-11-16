<?php
session_start();
include('connect.php');


$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';


$sql = "SELECT * FROM Users WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $username]);
$user = $stmt->fetch();
if ($user && $password === $user['password']) {
    $_SESSION['userID'] = $user['userID'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    switch ($user['role']) {
        case 'admin':
            header('Location: admin/index.php');
            break;
        case 'teacher':
            header('Location: teacher/index.php');
            break;
        case 'student':
            header('Location: student/index.php');
            break;
        default:
            header('Location: student/index.php');
            exit();
    }
    exit(); 
} else {
    echo "Sai tên đăng nhập hoặc mật khẩu.";
}
?>
