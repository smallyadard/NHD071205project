<?php
include '../connect.php';
include 'header.php';

$stmt = $pdo->query("SELECT * FROM ViewTeachers ORDER BY SUBSTRING_INDEX(name, ' ', -1) ASC");
$teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content">
    <h1 class="mb-4">All Teachers</h1>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ Tên</th>
                <th>Email</th>
                <th>Bằng cấp</th>
                <th>Khóa học</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
                
            <?php foreach ($teachers as $teacher): ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo htmlspecialchars($teacher['name']); ?></td>
                <td><?php echo htmlspecialchars($teacher['email']); ?></td>
                <td><?php echo htmlspecialchars($teacher['degree']); ?></td>
                <td>
                    <a href="viewteachercourse.php?id=<?php echo $teacher['teacherID']; ?>&role=teacher" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>