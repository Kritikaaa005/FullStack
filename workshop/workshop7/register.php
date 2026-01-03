<?php
session_start();
require 'db.php';


$dummyStudents = [
    ['np0023', 'Ram Prasad', '12345'],
    ['np5678', 'Sita Kumari', 'password']
];

foreach ($dummyStudents as $s) {
    $check = $pdo->prepare("SELECT id FROM students WHERE student_id = ?");
    $check->execute([$s[0]]);
    if (!$check->fetch()) {
        $hash = password_hash($s[2], PASSWORD_BCRYPT);
        $insert = $pdo->prepare("INSERT INTO students (student_id, full_name, password_hash) VALUES (?, ?, ?)");
        $insert->execute([$s[0], $s[1], $hash]);
        // echo $s[1] . " inserted as dummy user.<br>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_POST['student_id'];
    $fullName = $_POST['full_name'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("INSERT INTO students (student_id, full_name, password_hash) VALUES (?, ?, ?)");
    try {
        $stmt->execute([$studentId, $fullName, $hash]);
        echo "Registration successful! Redirecting to login...";
        header("refresh:2;url=login.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<h2>Student Registration</h2>
<form method="post">
    Student ID: <input type="text" name="student_id" required><br>
    Full Name: <input type="text" name="full_name" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>
