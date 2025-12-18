<?php
include '../connect.php';
session_start();   
include 'header.php';

$userID=$_SESSION['userID'];
$studentID = $_SESSION['studentID'];

echo $studentID;

$sql = "SELECT c.classID
        FROM StudentClass sc
        INNER JOIN Classes c ON sc.classID = c.classID
        INNER JOIN Students s ON sc.studentID = s.studentID
        WHERE s.studentID = ?
        ORDER BY SUBSTRING_INDEX(c.classname, ' ', -1) ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$studentID]);
$class = $stmt->fetchAll(PDO::FETCH_ASSOC);

$classID = $class[0]['classID'];

$sql = "SELECT * FROM ViewClasses WHERE classID = ? ORDER BY SUBSTRING_INDEX(name, ' ', -1) ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$classID]);
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

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>