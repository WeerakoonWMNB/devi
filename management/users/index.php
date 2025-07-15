<?php include('../header.php'); include('../../connection.php'); ?>
<h3>User List</h3>
<a href="create.php" class="btn btn-success mb-3">+ Add User</a>
<table class="table table-bordered">
<tr><th>Username</th><th>Created At</th><th>Actions</th></tr>
<?php
$res = $conn->query("SELECT * FROM users ORDER BY created_at DESC");
while ($row = $res->fetch_assoc()):
?>
<tr>
  <td><?= htmlspecialchars($row['username']) ?></td>
  <td><?= $row['created_at'] ?></td>
  <td>
    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this user?')">Delete</a>
  </td>
</tr>
<?php endwhile; ?>
</table>
<?php include('../footer.php'); ?>
