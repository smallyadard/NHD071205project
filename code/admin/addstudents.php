<?php
include '../connect.php';

$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $address = trim($_POST['address']);
    function removeVietnamese($str) {
        $str = preg_replace('/[áàảãạăắằẳẵặâấầẩẫậ]/u', 'a', $str);
        $str = preg_replace('/[éèẻẽẹêếềểễệ]/u', 'e', $str);
        $str = preg_replace('/[íìỉĩị]/u', 'i', $str);
        $str = preg_replace('/[óòỏõọôốồổỗộơớờởỡợ]/u', 'o', $str);
        $str = preg_replace('/[úùủũụưứừửữự]/u', 'u', $str);
        $str = preg_replace('/[ýỳỷỹỵ]/u', 'y', $str);
        $str = preg_replace('/đ/u', 'd', $str);
        $str = preg_replace('/[^a-z0-9]/i', '', $str);
        return $str;
    }
    
    $username = 'std' . strtolower(removeVietnamese($name));
    $password = '123'; 
    $role = 'student';

    $i = 1;
    $originalUsername = $username;
    while (true) {
        $stmt = $pdo->prepare("SELECT * FROM Users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        if ($stmt->rowCount() === 0) break;
        $username = $originalUsername . $i++;
    }

    $pdo->beginTransaction();

    $stmt = $pdo->query("SELECT userID FROM Users WHERE userID LIKE 'STD%' ORDER BY userID DESC LIMIT 1");
    $lastUserID = $stmt->fetchColumn();

    if ($lastUserID) {
        $num = (int)substr($lastUserID, 3); 
        $newNum = $num + 1;
        $userID = 'STD' . str_pad($newNum, 5, '0', STR_PAD_LEFT);
    }
    else {
        $userID= 'STD99999';
    }

    $stmt = $pdo->prepare("INSERT INTO Users (userID, username, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$userID, $username, $password, $role]);

    $stmt = $pdo->prepare("INSERT INTO Students (userID, name, gender, birthdate, Address) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$userID, $name, $gender, $birthdate, $address]);

    $pdo->commit();
    $success = "Thêm sinh viên thành công!";
    
}
?>

<?php include 'header.php'; ?>

<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Thêm Sinh Viên Mới</h4>
        </div>
        <div class="card-body">

            <?php if ($success): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>

            <?php if ($errors): ?>
                <?php foreach ($errors as $err): ?>
                    <div class="alert alert-danger"><?php echo $err; ?></div>
                <?php endforeach; ?>
            <?php endif; ?>

            <form method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Họ tên:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Giới tính:</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="birthdate" class="form-label">Ngày sinh:</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>

                <button type="submit" class="btn btn-success">Thêm Sinh Viên</button>
                <a href="index.php" class="btn btn-secondary ms-2">Quay lại</a>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
