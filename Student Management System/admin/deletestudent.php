<?php
include '../connect.php';

$studentID = $_GET['id'];

try {
    $pdo->beginTransaction();

    $stmt1 = $pdo->prepare("DELETE FROM Students WHERE studentID = :id");
    $stmt1->execute(['id' => $studentID]);

    $stmt2 = $pdo->prepare("DELETE FROM Users WHERE userID = :id");
    $stmt2->execute(['id' => $studentID]);

    if ($stmt1->rowCount() > 0 || $stmt2->rowCount() > 0) {
        $pdo->commit(); 
        header("Location: allstudents.php?msg=Xóa thành công");
        exit;
    } else {
        $pdo->rollBack();
        echo "Không tìm thấy học sinh hoặc người dùng với ID này.";
    }
} catch (PDOException $e) {
    $pdo->rollBack(); 
    echo "Lỗi khi xóa: " . $e->getMessage();
}

