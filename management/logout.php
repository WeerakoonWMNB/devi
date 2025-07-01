<?php
session_start();
session_destroy();
header("Location: /devi/login.php");
exit();
?>