<?php
include '../connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $enrollmentID = $_POST['enrollmentID'] ?? '';
    $courseID = $_POST['courseID'] ?? '';
    $semester = $_POST['semester'] ?? '';
    $midterm = $_POST['midterm'] ?? '';
    $final = $_POST['final'] ?? '';
    $grade = $_POST['grade'] ?? '';

    $errors = [];

    if (!is_numeric($midterm) || $midterm < 0 || $midterm > 10) {
        $errors[] = "Điểm giữa kỳ không hợp lệ (phải từ 0 đến 10)";
    }
    if (!is_numeric($final) || $final < 0 || $final > 10) {
        $errors[] = "Điểm cuối kỳ không hợp lệ (phải từ 0 đến 10)";
    }
    if (!is_numeric($grade) || $grade < 0 || $grade > 10) {
        $errors[] = "Điểm tổng kết không hợp lệ (phải từ 0 đến 10)";
    }

    if (!empty($errors)) {
        foreach ($errors as $err) {
            echo "<p style='color:red;'>$err</p>";
        }
        echo "<a href='javascript:history.back()'>Quay lại</a>";
        exit;
    }

    $sql = "UPDATE Grades 
            SET midterm = ?, final = ?, grade = ?
            WHERE enrollmentID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$midterm, $final, $grade, $enrollmentID]);

    header("Location: viewstudents.php?courseID=" . urlencode($courseID));
    exit;
}
?>

