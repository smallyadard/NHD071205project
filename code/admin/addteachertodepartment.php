<?php
include '../connect.php';
include 'header.php';

$departmentID = $_GET['id'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $teacherID = $_POST['teacherID'] ?? '';

    if ($teacherID) {
        $sqlInsert = "INSERT INTO Teacherdepartment (teacherID, departmentID) VALUES (?, ?)";
        $stmtInsert = $pdo->prepare($sqlInsert);
        try {
            $stmtInsert->execute([$teacherID, $departmentID]);
            echo "<div class='alert alert-success'>Thêm giảng viên vào khoa thành công.</div>";
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Lỗi khi thêm giảng viên: " . htmlspecialchars($e->getMessage()) . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Vui lòng chọn giảng viên.</div>";
    }
}

$sql = "
    SELECT t.teacherID, t.name 
    FROM Teachers t
    LEFT JOIN Teacherdepartment td ON t.teacherID = td.teacherID
    WHERE td.departmentID IS NULL
    ORDER BY t.name
";
$stmt = $pdo->query($sql);
$teachers = $stmt->fetchAll();
?>

<div class="container mt-4">
    <h3>Thêm giảng viên vào khoa</h3>

    <?php if (count($teachers) === 0): ?>
        <div class="alert alert-info">Không còn giảng viên nào chưa thuộc khoa.</div>
    <?php else: ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="teacherID" class="form-label">Chọn giảng viên:</label>
                <select name="teacherID" id="teacherID" class="form-select" required>
                    <option value="">-- Chọn giảng viên --</option>
                    <?php foreach ($teachers as $teacher): ?>
                        <option value="<?php echo $teacher['teacherID']; ?>">
                            <?php echo htmlspecialchars($teacher['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Thêm vào khoa</button>
            <a href="department_detail.php?id=<?php echo $departmentID; ?>" class="btn btn-secondary">Quay lại</a>
        </form>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
