<?php
session_start();
include '../connect.php';
include 'header.php';

$id= $_GET['id'] ?? '';
$role = $_GET['role'] ??'';

switch ($role) {
    case 'admin':
        $table = 'Admins';
        $id_field = 'adminID';
        break;
    case 'teacher':
        $table = 'Teachers';
        $id_field = 'teacherID';
        break;
    case 'student':
        $table = 'Students';
        $id_field = 'studentID';
        break;
    default:
        die('Loại người dùng không hợp lệ.');
}

$sql = "SELECT $table.*, u.username 
        FROM $table 
        INNER JOIN Users u ON $table.userID = u.userID
        WHERE $id_field = :userID";
$stmt = $pdo->prepare($sql);
$stmt->execute(['userID' => $id]);
$record = $stmt->fetch();

?>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Thông tin người dùng</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <tbody>
                    <?php foreach ($record as $key => $value): ?>
                        <tr>
                            <th class="bg-light text-capitalize" style="width: 30%;"><?php echo htmlspecialchars($key); ?></th>
                            <td><?php echo htmlspecialchars($value); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-secondary mt-3">Quay lại Dashboard</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
