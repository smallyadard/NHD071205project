<?php
include '../connect.php';
include 'header.php';

$id = $_GET['id'] ?? '';
$role = $_GET['role'] ?? '';

if (!$id || !$role) {
    die("Thiếu tham số id hoặc role");
}

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
        die("Role không hợp lệ");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    if (!$name || !$email) {
        die("Vui lòng điền đầy đủ thông tin");
    }

    $sql_update = "UPDATE $table SET name = :name, email =:email WHERE $id_field = :id";
    $stmt_update = $pdo->prepare($sql_update);

    $result = $stmt_update->execute([
        'name' => $name,
        'email'=> $email,
    ]);

    if ($result) {
        header("Location: alladmins.php");
        exit();
    } else {
        echo "Cập nhật thất bại!";
    }
}


$sql = "SELECT * FROM $table WHERE $id_field = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Chỉnh sửa thông tin Admin</h4>
        </div>
        <div class="card-body">
            <form method="post" action="editadmin.php?id=<?php echo htmlspecialchars($id); ?>&role=<?php echo htmlspecialchars($role); ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Họ tên:</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($record['name']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($record['email']); ?>" required>
                </div>

                <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                <a href="index.php" class="btn btn-secondary ms-2">Hủy</a>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php';?>
