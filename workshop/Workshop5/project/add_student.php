<?php
include "functions.php";
include "header.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $name = formatName($_POST["name"]);
        $email = $_POST["email"];
        $skills = cleanSkills($_POST["skills"]);

        if (!$name || !validateEmail($email)) {
            throw new Exception("invalid input");
        }

        saveStudent($name, $email, $skills);
        echo "student saved.";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>

<form method="post">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="text" name="email"><br><br>
    Skills: <input type="text" name="skills"><br><br>
    <button type="submit">Save</button>
</form>

<?php include "footer.php"; ?>
