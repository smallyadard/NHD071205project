<?php
include '../connect.php';
include 'header.php';

$stmt = $pdo->query("SELECT d.*, t.*
                            FROM Departments d
                            INNER JOIN Users u ON d.chiefID = u.userID
                            INNER JOIN Teachers t ON u.userID = t.userID
                            ORDER BY SUBSTRING_INDEX(departmentname, ' ', -1) ASC ");
$departments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content">
    <h1 class="mb-4">All Departments</h1>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên khoa</th>
                <th>Trưởng khoa</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($departments as $department): ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo htmlspecialchars($department['departmentname']); ?></td>
                <td><?php echo htmlspecialchars($department['name']); ?></td>
                <td><?php echo htmlspecialchars($department['email']); ?></td>
                <td>
                    <a href="viewdepartment.php?id=<?php echo $department['departmentID'] ; ?>" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>