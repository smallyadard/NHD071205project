<?php
include '../connect.php';
include 'header.php';

$classid = $_GET['classid'] ?? '';

if (!$classid) {
    echo "<div class='alert alert-danger'>Class ID không hợp lệ.</div>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentID = $_POST['studentID'] ?? '';

    if ($studentID) {
        $sqlInsert = "INSERT INTO Studentclass (studentID, classID) VALUES (?, ?)";
        $stmtInsert = $pdo->prepare($sqlInsert);
        try {
            $stmtInsert->execute([$studentID, $classid]);
            echo "<div class='alert alert-success'>Thêm sinh viên vào lớp thành công.</div>";
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Lỗi khi thêm sinh viên: " . htmlspecialchars($e->getMessage()) . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Vui lòng chọn sinh viên.</div>";
    }
}

$sqlStudentsNoClass = "
    SELECT s.studentID, s.name 
    FROM Students s
    LEFT JOIN Studentclass sc ON s.studentID = sc.studentID
    WHERE sc.classID IS NULL
    ORDER BY s.name
";

$stmtStudentsNoClass = $pdo->query($sqlStudentsNoClass);
$studentsNoClass = $stmtStudentsNoClass->fetchAll();
?>

<div class="container mt-4">
    <h3>Thêm sinh viên vào lớp</h3>

    <?php if (count($studentsNoClass) === 0): ?>
        <div class="alert alert-info">Không còn sinh viên nào chưa có lớp.</div>
    <?php else: ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="studentID" class="form-label">Chọn sinh viên:</label>
                <select name="studentID" id="studentID" class="form-select" required>
                    <option value="">-- Chọn sinh viên --</option>
                    <?php foreach ($studentsNoClass as $student): ?>
                        <option value="<?php echo $student['studentID']; ?>">
                            <?php echo htmlspecialchars($student['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Thêm vào lớp</button>
            <a href="viewclass.php?id=<?php echo $classid; ?>" class="btn btn-secondary">Quay lại</a>
        </form>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
