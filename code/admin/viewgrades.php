<?php
include '../connect.php';
include 'header.php';

$courseid = $_GET['courseID'];

if (!$courseid) {
    die("Thiếu mã môn học.");
}

$sql = "SELECT * FROM ViewGrades WHERE courseID = ? ORDER BY SUBSTRING_INDEX(name, ' ', -1) ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$courseid]);
$grades = $stmt->fetchAll();

$coursename = $grades[0]['coursename'];
$courseID = $grades[0]['courseID'];
?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="mb-4"><?php echo htmlspecialchars($coursename); ?></h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <?php if (count($grades) > 0): ?>
                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>STT</th>
                            <th>Tên sinh viên</th>
                            <th>Mã sinh viên</th>
                            <th>Học kì</th>
                            <th>Điểm giữa kì</th>
                            <th>Điểm cuối kì</th>
                            <th>Tổng kết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        <?php foreach ($grades as $grade): ?>
                            <tr>
                                <td><?php echo $stt++; ?></td>
                                <td><?php echo htmlspecialchars($grade['name']); ?></td>
                                <td><?php echo htmlspecialchars($grade['userID']); ?></td>
                                <td><?php echo htmlspecialchars($grade['semester']); ?></td>
                                <td><?php echo htmlspecialchars($grade['midterm']); ?></td>
                                <td><?php echo htmlspecialchars($grade['final']); ?></td>
                                <td><?php echo htmlspecialchars($grade['grade']); ?></td>
                            </tr>
                            <form method="post" action="updatedscore.php">
                                <input type="hidden" name="enrollmentID" value="<?php echo $grade['enrollmentID']; ?>">
                                <input type="hidden" name="courseID" value="<?php echo $courseid; ?>">
                                <tr>
                                    <td colspan="3"><strong>Chỉnh sửa điểm cho: <?php echo htmlspecialchars($grade['name']); ?></strong></td>
                                    <td>
                                        <input type="text" name="semester" class="form-control form-control-sm" value="<?php echo htmlspecialchars($grade['semester']); ?>">
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" name="midterm" class="form-control form-control-sm" value="<?php echo htmlspecialchars($grade['midterm']); ?>">
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" name="final" class="form-control form-control-sm" value="<?php echo htmlspecialchars($grade['final']); ?>">
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" name="grade" class="form-control form-control-sm" value="<?php echo htmlspecialchars($grade['grade']); ?>">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-sm btn-success">Lưu</button>
                                    </td>
                                </tr>
                            </form>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-warning">Không có sinh viên nào trong khóa học này.</div>
            <?php endif; ?>

            <a href="allcourses.php" class="btn btn-secondary mt-3">Quay lại danh sách khóa học</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>