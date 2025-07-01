<?php include('../header.php'); include('../../connection.php'); ?>
<h3>News List</h3>
<a href="create.php" class="btn btn-success mb-3">+ Add News</a>
<table class="table table-bordered">
<tr><th>Title</th><th>Description</th><th>Image</th><th>Expire Date</th><th>Created Date</th><th>Actions</th></tr>
<?php
$res = $conn->query("SELECT * FROM tbl_news ORDER BY created_date DESC");
while ($row = $res->fetch_assoc()):
?>
<tr>
  <td><?= htmlspecialchars($row['title']) ?></td>
  <td><?= htmlspecialchars($row['description']) ?></td>
  <!-- display image -->
    <td>
        <?php if ($row['image_link']): ?>
        <img src="<?= htmlspecialchars('../../'.$row['image_link']) ?>" alt="News Image" style="max-width: 100px;">
        <?php else: ?>
        No Image
        <?php endif; ?>
  <td><?= htmlspecialchars($row['expire_date']) ?></td>
  <td><?= $row['created_date'] ?></td>
  <td>
    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</a>
  </td>
</tr>
<?php endwhile; ?>
</table>
<?php include('../footer.php'); ?>
