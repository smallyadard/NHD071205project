<?php
include '../connect.php';
include 'header.php';
session_start();

$teacherID = $_SESSION['teacherID']; 
$sql = "SELECT courseID, coursename 
        FROM ViewTeacherCourse 
        WHERE teacherID = ? 
        ORDER BY coursename ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute([$teacherID]);
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<h2 class="mb-4">Danh sách môn học giảng dạy</h2>

<?php if (count($courses) > 0): ?>
    <ul class="list-group">
        <?php foreach ($courses as $course): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <?php echo htmlspecialchars($course['coursename']); ?>
                    <span class="badge bg-primary rounded-pill">
                        Mã: <?php echo htmlspecialchars($course['courseID']); ?>
                    </span>
                </div>
                <a href="viewstudents.php?courseID=<?php echo urlencode($course['courseID']); ?>" class="btn btn-sm btn-outline-secondary">
                    Xem sinh viên
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <div class="alert alert-warning" role="alert">
        Giảng viên chưa có môn học nào.
    </div>
<?php endif; ?>


<?php include 'footer.php'; ?>
