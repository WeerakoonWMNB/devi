<?php include('../header.php'); include('../../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $expire_date = $_POST['expire_date'];
    $created_date = date('Y-m-d H:i:s');
    $image_link = '';

    // Handle image upload
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

    $stmt = $conn->prepare("INSERT INTO tbl_news (title, description, image_link, expire_date, created_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $description, $image_link, $expire_date, $created_date);
    $stmt->execute();
    header("Location: index.php");
    exit();
}
?>

<h3>Add News</h3>
<form method="POST" enctype="multipart/form-data">
    <div class="mb-2">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="mb-2">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="mb-2">
        <label>Expire Date</label>
        <input type="date" name="expire_date" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

<?php include('../footer.php'); ?>
