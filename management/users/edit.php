<?php include('../header.php'); include('../../connection.php');

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM users WHERE id = $id");
$user = $res->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $updatePassword = !empty($_POST['password']);
    
    if ($updatePassword) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
        $stmt->bind_param("ssi", $username, $password, $id);
    } else {
        $stmt = $conn->prepare("UPDATE users SET username = ? WHERE id = ?");
        $stmt->bind_param("si", $username, $id);
    }

    $stmt->execute();
    header("Location: index.php");
    exit();
}
?>
<h3>Edit User</h3>
<form method="POST">
    <div class="mb-2">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($user['username']) ?>" required>
    </div>
    <div class="mb-2">
        <label>New Password <small>(leave blank to keep current)</small></label>
        <input type="password" name="password" class="form-control">
    </div>
    <button class="btn btn-primary">Update</button>
</form>
<?php include('../footer.php'); ?>
