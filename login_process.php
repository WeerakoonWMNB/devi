<?php
session_start();
include 'connection.php'; // contains database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user'] = $username;
            header("Location: /devi/management/news/index.php");
            exit();
        } else {
            header("Location: login.php?error=Invalid+password");
            exit();
        }
    } else {
        header("Location: login.php?error=User+not+found");
        exit();
    }
}
?>
