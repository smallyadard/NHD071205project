<?php
include '../connect.php';
session_start();   
include 'header.php';

$userID=$_SESSION['userID'];
$teacherID = $_SESSION['teacherID'];

$sql = "SELECT d.departmentID
        FROM Teacherdepartment td
        INNER JOIN Teachers t ON td.teacherID = t.teacherID
        INNER JOIN Departments d ON d.departmentID = td.departmentID
        WHERE t.teacherID = ?
        ORDER BY SUBSTRING_INDEX(d.departmentname, ' ', -1) ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$teacherID]);
$department = $stmt->fetchAll(PDO::FETCH_ASSOC);

$departmentID = $department[0]['departmentID'];

$sql = "SELECT * FROM ViewDepartments WHERE departmentID = ? ORDER BY SUBSTRING_INDEX(name, ' ', -1) ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$departmentID]);
$teachers = $stmt->fetchAll();

$departmentname = $teachers[0]['departmentname'];
?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="mb-4"><?php echo htmlspecialchars($departmentname); ?></h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <?php if (count($teachers) > 0): ?>
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
                        <?php foreach ($teachers as $teacher): ?>
                            <tr>
                                <td><?php echo $stt++; ?></td>
                                <td><?php echo htmlspecialchars($teacher['name']); ?></td>
                                <td><?php echo htmlspecialchars($teacher['email']); ?></td>
                                <td><?php echo htmlspecialchars($teacher['degree']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-warning">Không có giảngviên nào trong khoa này.</div>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>