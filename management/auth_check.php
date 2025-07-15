<?php
if (!isset($_SESSION['user'])) {
    header("Location: /devi/login.php");
    exit();
}
