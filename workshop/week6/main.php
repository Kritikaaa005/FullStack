<?php
include 'db.php';

$search = "";
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $sql = "SELECT * FROM books WHERE category='$search'";
} else {
    $sql = "SELECT * FROM books";
}

$result = mysqli_query($conn, $sql);
?>

<table border="1">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Author</th>
    <th>Category</th>
    <th>Qty</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['book_id'] ?></td>
    <td><?= $row['title'] ?></td>
    <td><?= $row['author'] ?></td>
    <td><?= $row['category'] ?></td>
    <td><?= $row['quantity'] ?></td>
    <td>
        <a href="delete.php?id=<?= $row['book_id'] ?>">Delete</a>
    </td>
</tr>
<?php } ?>
</table>
