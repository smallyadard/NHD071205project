<?php
include '../connect.php';
include 'header.php';

// ----------------------------------------------------------số lượng
$stmt = $pdo->query("SELECT COUNT(*) FROM Students");
$student_count = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT COUNT(*) FROM Teachers");
$teacher_count = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT COUNT(*) FROM Admins");
$admin_count = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT COUNT(*) FROM Classes");
$class_count = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT COUNT(*) FROM Departments");
$department_count = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT COUNT(*) FROM Courses");
$course_count = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT COUNT(*) FROM Posts");
$post_count = $stmt->fetchColumn();

?>
<div class="container">
<div class="content">
    <h1 class="mb-4">Dashboard</h1>
    
    
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Sinh viên</h5>
                    <h2 class="card-text"><?php echo $student_count; ?></h2>
                    <a href="allstudents.php" class="text-white">Xem</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Giảng viên</h5>
                    <h2 class="card-text"><?php echo $teacher_count; ?></h2>
                    <a href="allteachers.php" class="text-white">Xem</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Admin</h5>
                    <h2 class="card-text"><?php echo $admin_count; ?></h2>
                    <a href="alladmins.php" class="text-white">Xem</a>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title">Lớp</h5>
                <h2 class="card-text"><?php echo $class_count; ?></h2>
                <a href="allclasses.php" class="text-white">Xem</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Khoa</h5>
                <h2 class="card-text"><?php echo $department_count; ?></h2>
                <a href="alldepartments.php" class="text-white">Xem</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-dark mb-3">
            <div class="card-body">
                <h5 class="card-title">Khóa học</h5>
                <h2 class="card-text"><?php echo $course_count; ?></h2>
                <a href="allcourses.php" class="text-white">Xem</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Bài đăng</h5>
                <h2 class="card-text"><?php echo $post_count; ?></h2>
                <a href="allposts.php" class="text-white">Xem</a>
            </div>
        </div>
    </div>

</div>
    
    
</div>
</div>

<?php include 'footer.php'; ?>