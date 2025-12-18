<?php
include '../connect.php';
include 'header.php';

$stmt = $pdo->query("SELECT c.*, t.*
                            FROM Classes c
                            INNER JOIN Teachers t ON c.teacherID = t.teacherID
                            ORDER BY SUBSTRING_INDEX(classname, ' ', -1) ASC ");
$classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content">
    <h1 class="mb-4">All Classes</h1>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên lớp</th>
                <th>GV quản lí</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($classes as $class): ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo htmlspecialchars($class['classname']); ?></td>
                <td><?php echo htmlspecialchars($class['name']); ?></td>
                <td><?php echo htmlspecialchars($class['email']); ?></td>
                <td>
                    <a href="viewclass.php?id=<?php echo $class['classID'] ; ?>" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>