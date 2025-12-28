<?php
include 'db.php';
$cat = $_POST['category'];
$result = mysqli_query($conn,"SELECT * FROM books WHERE category='$cat'");
while($row = mysqli_fetch_assoc($result)){
    echo $row['title']." - ".$row['author']."<br>";
}
?>
