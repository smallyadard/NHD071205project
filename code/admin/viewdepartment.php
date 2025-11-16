<?php
include '../connect.php';
include 'header.php';

$departmentID= $_GET['id'] ?? '';

$sql = "SELECT * FROM ViewDepartments WHERE departmentID = ? ORDER BY SUBSTRING_INDEX(name, ' ', -1) ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$departmentID]);
$departments = $stmt->fetchAll();

$departmentname = $departments[0]['departmentname'];
?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="mb-4"><?php echo "Khoa ". htmlspecialchars($departmentname); ?></h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <?php if (count($departments) > 0): ?>
                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>STT</th>
                            <th>Tên giảng viên</th>
                            <th>Email</th>
                            <th>Bằng cấp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        <?php foreach ($departments as $department): ?>
                            <tr>
                                <td><?php echo $stt++; ?></td>
                                <td><?php echo htmlspecialchars($department['name']); ?></td>
                                <td><?php echo htmlspecialchars($department['email']); ?></td>
                                <td><?php echo htmlspecialchars($department['degree']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-warning">Không có giảng viên nào trong khoa này.</div>
            <?php endif; ?>
            <a href="addteachertodepartment.php?id=<?php echo $departmentID; ?>" class="btn btn-primary mt-3">Thêm giảng viên vào khoa</a>
            <a href="alldepartments.php" class="btn btn-secondary mt-3">Quay lại danh sách khoa</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>