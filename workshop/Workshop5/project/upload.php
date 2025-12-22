<?php
include "functions.php";
include "header.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        uploadPortfolioFile($_FILES["portfolio"]);
        echo "file uploaded.yayyy!";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="portfolio">
    <button type="submit">Upload</button>
</form>

<?php include "footer.php"; ?>
