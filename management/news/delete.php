<?php include('../../connection.php');
$id = $_GET['id'];

// Optional: Delete associated image file
$res = $conn->query("SELECT image_link FROM tbl_news WHERE id = $id");
if ($row = $res->fetch_assoc()) {
    $image_path = '../../' . $row['image_link'];
    if ($row['image_link'] && file_exists($image_path)) {
        unlink($image_path); // delete image file
    }
}

$conn->query("DELETE FROM tbl_news WHERE id = $id");
header("Location: index.php");
exit();
