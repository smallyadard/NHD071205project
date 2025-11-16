<?php
session_start();
include '../connect.php';
include 'header.php';

$postID = $_POST['postID'] ?? '';
$replyusername = $_SESSION['username'] ?? '';
$replycontent = trim($_POST['replycontent'] ?? '');

if (empty($postID) || empty($replyusername) || empty($replycontent)) {
    echo "<script>alert('Thiếu thông tin, vui lòng kiểm tra lại.'); history.back();</script>";
    exit;
}

$insertStmt = $pdo->prepare("INSERT INTO replies (postID, replyusername, replycontent) VALUES (?, ?, ?)");
$insertStmt->execute([$postID, $replyusername, $replycontent]);

header("Location: viewpost.php?id=" . urlencode($postID));
exit;

include 'footer.php';
?>

