<?php
include '../connect.php';
include 'header.php';
session_start();

$userID= $_SESSION['userID'];
$courseid= $_GET['id'] ?? '';

$sql = "SELECT * FROM ViewGrades 
        WHERE courseID = ? AND userID = ?
        ORDER BY SUBSTRING_INDEX(name, ' ', -1) ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$courseid, $userID]);
$grades = $stmt->fetchAll();

$coursename = $grades[0]['coursename'] ?? 'Tên khóa học';
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