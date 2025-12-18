<?php
include '../connect.php';
include 'header.php';

$postID = $_GET ['id'] ?? '';

$sql = "SELECT * FROM ViewPosts2 WHERE postID = ? ORDER BY postcreated ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$postID]);
$posts = $stmt->fetchAll();
?>

<div class="container mt-4">
    <?php if (count($posts) > 0): ?>
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5><?php echo htmlspecialchars($posts[0]['posttitle']); ?></h5>
                <small>Đăng bởi: <?php echo htmlspecialchars($posts[0]['postusername']); ?> | <?php echo $posts[0]['postcreated']; ?></small>
            </div>
            <div class="card-body">
                <p><?php echo nl2br(htmlspecialchars($posts[0]['postcontent'])); ?></p>
            </div>
        </div>

        <h5>Trả lời</h5>
        <?php foreach ($posts as $row): ?>
            <div class="card mb-3">
                <div class="card-header bg-light">
                    <strong><?php echo htmlspecialchars($row['replyusername']); ?></strong> - <?php echo $row['replycreated']; ?>
                </div>
                <div class="card-body">
                    <p><?php echo nl2br(htmlspecialchars($row['replycontent'])); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        <a href="allposts.php" class="btn btn-secondary mt-3 ms-2">Quay về danh sách bài đăng</a>
        <a href="reply.php?id=<?php echo $posts[0]['postID']; ?>" class="btn btn-success mt-3">Trả lời bài viết</a>

    <?php else: ?>
        <div class="alert alert-info">Không tìm thấy bài đăng hoặc chưa có trả lời nào.</div>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>;