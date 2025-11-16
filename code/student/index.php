<?php
include '../connect.php';
session_start();

$userID = $_SESSION['userID'];
$username = $_SESSION['username'];

$stmt = $pdo->prepare("SELECT s.*, u.userID, u.username
                       FROM Students s 
                       INNER JOIN Users u ON u.userID=s.userID
                       WHERE u.userID = ?");
$stmt->execute([$userID]);
$student = $stmt->fetch();

$_SESSION['studentID'] = $student['studentID'];
?>

<?php include 'header.php'; ?>

<div class="main" style="margin-left: 250px; padding: 20px;">
    <div class="container-fluid">
        <h1 class="mb-4">Thông tin cá nhân</h1>
        <table class="table table-bordered w-50">
            <tr>
                <th>Mã sinh viên</th>
                <td><?php echo htmlspecialchars($student['userID']); ?></td>
            </tr>
            <tr>
                <th>Họ tên</th>
                <td><?php echo htmlspecialchars($student['name']); ?></td>
            </tr>
            <tr>
                <th>Ngày sinh</th>
                <td><?php echo htmlspecialchars($student['birthdate']); ?></td>
            </tr>
            <tr>
                <th>Giới tính</th>
                <td><?php echo htmlspecialchars($student['gender']); ?></td>
            </tr>
            <tr>
                <th>Địa chỉ</th>
                <td><?php echo htmlspecialchars($student['Address']); ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?php echo htmlspecialchars($student['username']); ?></td>
            </tr>
        </table>
        <a href="editstudent.php?id=<?php echo urlencode($student['studentID']); ?>&role=student" class="btn btn-primary mt-3">
            Sửa
        </a>


    </div>
</div>

<?php include 'footer.php'; ?>
