<?php
include '../connect.php';
session_start();

$userID = $_SESSION['userID'];
$username = $_SESSION['username'];

$stmt = $pdo->prepare("SELECT t.*, u.userID, u.username
                       FROM Teachers t
                       INNER JOIN Users u ON u.userID=t.userID
                       WHERE u.userID = ?");
$stmt->execute([$userID]);
$teacher = $stmt->fetch();

$_SESSION['teacherID'] = $teacher['teacherID'];
?>

<?php include 'header.php'; ?>

    <div class="container-fluid">
        <h1 class="mb-4">Thông tin cá nhân</h1>
        <table class="table table-bordered w-50">
            <tr>
                <th>Mã giảng viên</th>
                <td><?php echo htmlspecialchars($teacher['userID']); ?></td>
            </tr>
            <tr>
                <th>Họ tên</th>
                <td><?php echo htmlspecialchars($teacher['name']); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo htmlspecialchars($teacher['email']); ?></td>
            </tr>
            <tr>
                <th>Bằng cấp</th>
                <td><?php echo htmlspecialchars($teacher['degree']); ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?php echo htmlspecialchars($teacher['username']); ?></td>
            </tr>
        </table>
        <a href="editteacher.php?id=<?php echo urlencode($teacher['teacherID']); ?>&role=teacher" class="btn btn-primary mt-3">
            Sửa
        </a>

</div>

<?php include 'footer.php'; ?>
