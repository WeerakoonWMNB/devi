<?php session_start(); ?>
<?php include('../auth_check.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Management</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="/devi/management/news/index.php">News</a></li>
        <li class="nav-item"><a class="nav-link" href="/devi/management/users/index.php">Users</a></li>
      </ul>
      <span class="navbar-text text-light me-3">
        <?= htmlspecialchars($_SESSION['user'] ?? '') ?>
      </span>
      <a href="/devi/management/logout.php" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
  </div>
</nav>
<div class="container mt-4">
