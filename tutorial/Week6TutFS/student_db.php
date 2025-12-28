<?php
include 'db.php';

if (isset($_POST['add'])) {
    $stmt = $conn->prepare("INSERT INTO students (name, email, course) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $_POST['name'], $_POST['email'], $_POST['course']);
    $stmt->execute();
}

if (isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE students SET name=?, email=?, course=? WHERE id=?");
    $stmt->bind_param("sssi", $_POST['name'], $_POST['email'], $_POST['course'], $_POST['id']);
    $stmt->execute();
}

if (isset($_GET['delete'])) {
    $stmt = $conn->prepare("DELETE FROM students WHERE id=?");
    $stmt->bind_param("i", $_GET['delete']);
    $stmt->execute();
}

$editData = null;
if (isset($_GET['edit'])) {
    $stmt = $conn->prepare("SELECT * FROM students WHERE id=?");
    $stmt->bind_param("i", $_GET['edit']);
    $stmt->execute();
    $editData = $stmt->get_result()->fetch_assoc();
}

$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>student list</title>
    <style>
        body { font-family: Arial; background: #ffe6f0; padding: 20px; }
        input, button { margin: 5px; padding: 6px; }
        table { border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; background: pink; }
    </style>
</head>
<body>

<h3>add / edit student</h3>
<form method="post">
    <input type="hidden" name="id" value="<?= $editData['id'] ?? '' ?>">
    <input type="text" name="name" placeholder="name" value="<?= $editData['name'] ?? '' ?>" required>
    <input type="email" name="email" placeholder="email" value="<?= $editData['email'] ?? '' ?>" required>
    <input type="text" name="course" placeholder="course" value="<?= $editData['course'] ?? '' ?>" required>
    <button type="submit" name="<?= $editData ? 'update' : 'add' ?>">
        <?= $editData ? 'update' : 'add' ?>
    </button>
</form>

<h3>students list</h3>
<table>
<tr>
    <th>name</th>
    <th>email</th>
    <th>course</th>
    <th>action</th>
</tr>

<?php while ($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= htmlspecialchars($row['email']) ?></td>
    <td><?= htmlspecialchars($row['course']) ?></td>
    <td>
        <a href="?edit=<?= $row['id'] ?>">edit</a> |
        <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('sure?')">delete</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
