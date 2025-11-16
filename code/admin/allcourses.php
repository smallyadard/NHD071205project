<?php
include '../connect.php';
include 'header.php';

$stmt = $pdo->query("SELECT c.*, t.name, t.email, d.departmentname
                            FROM Courses c
                            INNER JOIN Teachers t ON c.teacherID = t.teacherID
                            INNER JOIN Departments d ON c.departmentID = d.departmentID
                            ORDER BY c.coursename ASC ");
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content">
    <h1 class="mb-4">All Courses</h1>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên khóa học</th>
                <th>Khoa</th>
                <th>Giảng viên</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($courses as $course): ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo htmlspecialchars($course['coursename']); ?></td>
                <td><?php echo htmlspecialchars($course['departmentname']); ?></td>
                <td><?php echo htmlspecialchars($course['name']); ?></td>
                <td><?php echo htmlspecialchars($course['email']); ?></td>
                <td>
                    <a href="viewcourse.php?id=<?php echo $course['courseID'] ; ?>" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>