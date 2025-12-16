<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Age: <input type="number" name="age" required min="1"><br><br>
    Favorite Programming Language: 
    <input type="text" name="language" required><br><br>
    <button>Submit</button>
</form>

<?php
if(isset($_POST['name'], $_POST['age'], $_POST['language'])){
    $name = trim($_POST['name']);
    $age = intval($_POST['age']);
    $language = trim($_POST['language']);

    if($name === "" || $age <= 0 || $language === ""){
        echo "Please fill all fields correctly!";
    } else {
        echo "Preview: <br>";
        echo "Hello <b>$name</b>! You are <b>$age</b> years old and your favorite programming language is <b>$language</b>.";
    }
}
?>
