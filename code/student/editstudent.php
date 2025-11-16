<?php
include '../connect.php';
include 'header.php';

$id = $_GET['id'] ?? '';
$role = $_GET['role'] ?? '';

if (!$id || !$role) {
    die("Thiếu tham số id hoặc role");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $birthdate = $_POST['birthdate'] ?? '';
    $address = $_POST['address'] ?? '';


    if (!$name || !$birthdate || !$address) {
        die("Vui lòng điền đầy đủ thông tin");
    }

    $sql_update = "UPDATE Students SET name = :name, gender = :gender, birthdate = :birthdate, Address = :address WHERE studentID = :id";
    $stmt_update = $pdo->prepare($sql_update);

    $result = $stmt_update->execute([
        'name' => $name,
        'gender' => $gender,
        'birthdate' => $birthdate,
        'address' => $address,
        'id' => $id
    ]);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Cập nhật thất bại!";
    }
}


$sql = "SELECT * FROM Students WHERE studentID = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Chỉnh sửa thông tin Sinh viên</h4>
        </div>
        <div class="card-body">
            <form method="post" action="editstudent.php?id=<?php echo htmlspecialchars($id); ?>&role=<?php echo htmlspecialchars($role); ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Họ tên:</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($record['name']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Giới tính:</label>
                    <select id="gender" name="gender" class="form-select">
                        <option value="Nam" <?php if ($record['gender'] == 'Nam') echo 'selected'; ?>>Nam</option>
                        <option value="Nữ" <?php if ($record['gender'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="birthdate" class="form-label">Ngày sinh:</label>
                    <input type="date" id="birthdate" name="birthdate" class="form-control"
                           value="<?php echo date('Y-m-d', strtotime($record['birthdate'])); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ:</label>
                    <input type="text" id="address" name="address" class="form-control"
                           value="<?php echo htmlspecialchars($record['Address']); ?>" required>
                </div>

                <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                <a href="index.php" class="btn btn-secondary ms-2">Hủy</a>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php';?>
