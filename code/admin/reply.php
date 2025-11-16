<?php
include '../connect.php';
include 'header.php';

$postID = $_GET['id'] ?? '';

?>

<div class="container mt-4">
    <h4>Trả lời bài viết</h4>
    
    <form method="post" action="submitreply.php">
        <input type="hidden" name="postID" value="<?php echo htmlspecialchars($postID); ?>">

        <?php
        session_start();
        $replyusername = $_SESSION['username'] ?? '';
        if (!$replyusername) {
            echo "<script>alert('Bạn cần đăng nhập để trả lời.'); window.location.href = '../login.php';</script>";
            exit;
        }
        ?>

        <input type="hidden" name="replyusername" value="<?php echo htmlspecialchars($replyusername); ?>">
        <p><strong>Người trả lời:</strong> <?php echo htmlspecialchars($replyusername); ?></p>


        <div class="mb-3">
            <label for="replycontent" class="form-label">Nội dung trả lời</label>
            <textarea class="form-control" id="replycontent" name="replycontent" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Gửi trả lời</button>
        <a href="viewpost.php?id=<?php echo htmlspecialchars($postID); ?>" class="btn btn-secondary">Quay lại bài viết</a>
    </form>
</div>

<?php include 'footer.php'; ?>
