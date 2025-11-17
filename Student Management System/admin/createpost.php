<?php
include '../connect.php';
include 'header.php';
session_start();   

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $courseID = $_POST['course_id'];

    $stmt = $pdo->prepare("INSERT INTO Posts (posttitle, postcontent, postcreated, postusername, courseID) 
                           VALUES (?, ?, NOW(), ?, ?)");
    $stmt->execute([$title, $content, $username, $courseID]);

    header("Location: allposts.php");
    exit();
}

$courses = $pdo->query("SELECT * FROM Courses")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content">
    <h1 class="mb-4">Tạo bài đăng mới</h1>
    <form method="post">
        <div class="form-group mb-3">
            <label for="title">Tiêu đề</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="content">Nội dung</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="course_id">Khóa học</label>
            <select name="course_id" id="course_id" class="form-control" required>
                <option value="">-- Chọn khóa học --</option>
                <?php foreach ($courses as $course): ?>
                    <option value="<?php echo $course['courseID']; ?>">
                        <?php echo htmlspecialchars($course['coursename']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Đăng bài</button>
        <a href="allposts.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<?php include 'footer.php'; ?>
