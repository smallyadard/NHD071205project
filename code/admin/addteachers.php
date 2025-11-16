<?php
include '../connect.php';

$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $degree = trim($_POST['degree']);

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
    
    $username = 'tch' . strtolower(removeVietnamese($name));
    $password = '123'; 
    $role = 'teacher';

    $i = 1;
    $originalUsername = $username;
    while (true) {
        $stmt = $pdo->prepare("SELECT * FROM Users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        if ($stmt->rowCount() === 0) break;
        $username = $originalUsername . $i++;
    }

    $pdo->beginTransaction();
    $stmt = $pdo->query("SELECT userID FROM Users WHERE userID LIKE 'TCH%' ORDER BY userID DESC LIMIT 1");
    $lastUserID = $stmt->fetchColumn();

    if ($lastUserID) {
        $num = (int)substr($lastUserID, 3); 
        $newNum = $num + 1;
        $userID = 'TCH' . str_pad($newNum, 5, '0', STR_PAD_LEFT);
    }
    else {
        $userID= 'TCH99999';
    }

    $stmt = $pdo->prepare("INSERT INTO Users (userID, username, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$userID, $username, $password, $role]);

    $stmt = $pdo->prepare("INSERT INTO Teachers (userID, name, email, degree) VALUES (?, ?, ?, ?)");
    $stmt->execute([$userID, $name, $email, $degree]);

    $pdo->commit();
    $success = "Thêm giảng viên thành công!";
}
?>

<?php include 'header.php'; ?>

<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Thêm Giảng Viên Mới</h4>
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
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" >
                </div>

                <div class="mb-3">
                    <label for="degree" class="form-label">Trình độ:</label>
                    <input type="text" class="form-control" id="degree" name="degree" >
                </div>

                <button type="submit" class="btn btn-success">Thêm Giảng Viên</button>
                <a href="index.php" class="btn btn-secondary ms-2">Quay lại</a>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
