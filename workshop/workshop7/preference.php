<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

$theme = $_COOKIE['theme'] ?? 'light';
$bg = $theme === 'dark' ? 'black' : 'white';
$color = $theme === 'dark' ? 'white' : 'black';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body style="background-color: <?= $bg ?>; color: <?= $color ?>;">
    <h1>Welcome <?= $_SESSION['student_name'] ?>!</h1>
    <nav>
        <a href="preference.php">Preferences</a> |
        <a href="logout.php">Logout</a>
    </nav>
</body>
</html>
