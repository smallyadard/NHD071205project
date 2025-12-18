<?php
include '../connect.php';
include 'header.php';

$stmt = $pdo->query("SELECT * FROM ViewPosts ");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content">
    <h1 class="mb-4">All Posts</h1>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Người dùng</th>
                <th>Khóa học</th>
                <th>Title</th>
                <th>Thời gian tạo</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($posts as $post): ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo htmlspecialchars($post['username']); ?></td>
                <td><?php echo htmlspecialchars($post['coursename']); ?></td>
                <td><?php echo htmlspecialchars($post['posttitle']); ?></td>
                <td><?php echo htmlspecialchars($post['postcreated']); ?></td>
                <td>
                    <a href="viewpost.php?id=<?php echo $post['postID'] ; ?>" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="mb-3">
        <a href="createpost.php" class="btn btn-primary">Tạo bài đăng</a>
    </div>
</div>

<?php include 'footer.php'; ?>