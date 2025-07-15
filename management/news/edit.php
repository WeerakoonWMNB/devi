<?php include('../header.php'); include('../../connection.php');

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM tbl_news WHERE id = $id");
$news = $res->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $expire_date = $_POST['expire_date'];
    $image_link = $news['image_link']; // Keep existing image by default

    // Handle image replacement
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "uploads/";
        if (!is_dir('../../' . $target_dir)) {
            mkdir('../../' . $target_dir, 0777, true);
        }
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . time() . '_' . $image_name;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], '../../' . $target_file)) {
            $image_link = $target_file;
        }
    }

    $stmt = $conn->prepare("UPDATE tbl_news SET title = ?, description = ?, image_link = ?, expire_date = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $title, $description, $image_link, $expire_date, $id);
    $stmt->execute();
    header("Location: index.php");
    exit();
}
?>

<h3>Edit News</h3>
<form method="POST" enctype="multipart/form-data">
    <div class="mb-2">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($news['title']) ?>" required>
    </div>
    <div class="mb-2">
        <label>Description</label>
        <textarea name="description" class="form-control" required><?= htmlspecialchars($news['description']) ?></textarea>
    </div>
    <div class="mb-2">
        <label>Current Image</label><br>
        <?php if ($news['image_link']): ?>
            <img src="<?= '../../' . htmlspecialchars($news['image_link']) ?>" style="max-width: 100px;"><br>
        <?php else: ?>
            No image uploaded.
        <?php endif; ?>
        <label>Change Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="mb-2">
        <label>Expire Date</label>
        <input type="date" name="expire_date" class="form-control" value="<?= htmlspecialchars($news['expire_date']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php include('../footer.php'); ?>
