<?php
include '../connect.php';
session_start();
include 'header.php';

$userID = $_SESSION['userID'];
$stmt = $pdo->prepare("SELECT c.*, t.name, t.email
                       FROM Courses c
                       INNER JOIN Teachers t ON c.teacherID = t.teacherID
                       INNER JOIN Enrollments e ON e.courseID = c.courseID
                       INNER JOIN Students s ON e.studentID = s.studentID
                       INNER JOIN Users u ON u.userID = s.userID
                       WHERE u.userID = :userID
                       ORDER BY c.coursename ASC");
$stmt->execute(['userID' => $userID]);
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content">
    <h1 class="mb-4">All Courses</h1>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên khóa học</th>
                <th>Giảng viên</th>
                <th>Email</th>
                <th>Kết quả</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($courses as $course): ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo htmlspecialchars($course['coursename']); ?></td>
                <td><?php echo htmlspecialchars($course['name']); ?></td>
                <td><?php echo htmlspecialchars($course['email']); ?></td>
                <td>
                    <a href="viewgrade.php?id=<?php echo $course['courseID'] ; ?>" class="btn btn-sm btn-info">Kết quả</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>