<?php
include '../connect.php';
include 'header.php';

$stmt = $pdo->query("SELECT * FROM ViewAdmins ORDER BY SUBSTRING_INDEX(name, ' ', -1) ASC");
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content">
    <h1 class="mb-4">All Admins</h1>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ Tên</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo htmlspecialchars($admin['name']); ?></td>
                <td><?php echo htmlspecialchars($admin['email']); ?></td>
                <td>
                    <a href="view.php?id=<?php echo $admin['adminID'];?> &role=admin" class="btn btn-sm btn-info">View</a>
                    <a href="editadmin.php?id=<?php echo $admin['adminID']; ?>&role=admin" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>