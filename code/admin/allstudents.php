<?php
include '../connect.php';
include 'header.php';

$stmt = $pdo->query("SELECT * FROM ViewStudents ORDER BY SUBSTRING_INDEX(name, ' ', -1) ASC");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content">
    <h1 class="mb-4">All Students</h1>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ Tên</th>
                <th>Giới tính</th>
                <th>Ngày Sinh</th>
                <th>Địa Chỉ</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo htmlspecialchars($student['name']); ?></td>
                <td><?php echo htmlspecialchars($student['gender']); ?></td>
                <td><?php echo htmlspecialchars($student['birthdate']); ?></td>
                <td><?php echo htmlspecialchars($student['Address']); ?></td>
                <td>
                    <a href="view.php?id=<?php echo $student['studentID']; ?> &role=student" class="btn btn-sm btn-info">View</a>
                    <a href="editstudent.php?id=<?php echo $student['studentID']; ?>&role=student" class="btn btn-sm btn-warning">Edit</a>
                    <a href="deletestudent.php?id=<?php echo $student['studentID']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure about that????');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>