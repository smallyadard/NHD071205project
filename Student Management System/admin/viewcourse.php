<?php
include '../connect.php';
include 'header.php';

$courseid= $_GET['id'] ?? '';

$sql = "SELECT * FROM ViewCourses WHERE courseID = ? ORDER BY SUBSTRING_INDEX(name, ' ', -1) ASC ";
$stmt = $pdo->prepare($sql);
$stmt->execute([$courseid]);
$courses = $stmt->fetchAll();

$coursename = $courses[0]['coursename'];
?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="mb-4"><?php echo htmlspecialchars($coursename); ?></h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <?php if (count($courses) > 0): ?>
                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>STT</th>
                            <th>Tên sinh viên</th>
                            <th>Mã sinh viên</th>
                            <th>Học kì</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        <?php foreach ($courses as $course): ?>
                            <tr>
                                <td><?php echo $stt++; ?></td>
                                <td><?php echo htmlspecialchars($course['name']); ?></td>
                                <td><?php echo htmlspecialchars($course['userID']); ?></td>
                                <td><?php echo htmlspecialchars($course['semester']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-warning">Không có sinh viên nào trong khóa học này.</div>
            <?php endif; ?>

            <a href="allcourses.php" class="btn btn-secondary mt-3">Quay lại danh sách khóa học</a>
            <a href="viewgrades.php?courseID=<?php echo $_GET['id'] ?? ''; ?>" class="btn btn-primary mt-3 ms-2">Xem điểm</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>