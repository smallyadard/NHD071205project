<?php
include '../connect.php';

$teacherID = $_GET['id'];

try {
    $pdo->beginTransaction();

    $stmt1 = $pdo->prepare("DELETE FROM Teachers WHERE teacherID = :id");
    $stmt1->execute(['id' => $teacherID]);
    
    $stmt2 = $pdo->prepare("DELETE FROM Users WHERE userID = :id");
    $stmt2->execute(['id' => $teacherID]);

    if ($stmt1->rowCount() > 0 || $stmt2->rowCount() > 0) {
        $pdo->commit();
        header("Location: allteachers.php?msg=Xóa thành công");
        exit;
    } else {
        $pdo->rollBack();
        echo "Không tìm thấy giảng viên hoặc người dùng với ID này.";
    }
} catch (PDOException $e) {
    $pdo->rollBack();
    echo "Lỗi khi xóa: " . $e->getMessage();
}
