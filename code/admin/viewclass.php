<?php
include '../connect.php';
include 'header.php';

$classid= $_GET['id'] ?? '';

$sql = "SELECT * FROM ViewClasses WHERE classID = ? ORDER BY SUBSTRING_INDEX(name, ' ', -1) ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$classid]);
$students = $stmt->fetchAll();

$classname = $students[0]['classname'];
?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="mb-4"><?php echo htmlspecialchars($classname); ?></h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <?php if (count($students) > 0): ?>
                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>STT</th>
                            <th>Tên sinh viên</th>
                            <th>Ngày sinh</th>
                            <th>Địa chỉ</th>
                            <th>Giới tính</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td><?php echo $stt++; ?></td>
                                <td><?php echo htmlspecialchars($student['name']); ?></td>
                                <td><?php echo htmlspecialchars($student['birthdate']); ?></td>
                                <td><?php echo htmlspecialchars($student['Address']); ?></td>
                                <td><?php echo htmlspecialchars($student['gender']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-warning">Không có sinh viên nào trong lớp này.</div>
            <?php endif; ?>
            <a href="addstudenttoclass.php?classid=<?php echo $classid; ?>" class="btn btn-primary mt-3">Thêm sinh viên vào lớp</a>
            <a href="allclasses.php" class="btn btn-secondary mt-3">Quay lại danh sách lớp</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>