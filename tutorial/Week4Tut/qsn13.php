
<form method="POST">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    Password: <input type="password" name="pass"><br>
    Confirm Password: <input type="password" name="cpass"><br>
    <button>Preview</button>
</form>

<?php
function strength($p) {
    return (strlen($p)>=8 && preg_match('/[0-9]/',$p) && preg_match('/[\W]/',$p))
        ? "Strong" : "Weak";
}

if (!empty($_POST)) {
    if ($_POST['pass'] !== $_POST['cpass']) {
        echo "Passwords do not match.";
        exit;
    }

    echo "<h3>Registration Preview:</h3>";
    echo "Name: ".$_POST['name']."<br>";
    echo "Email: ".$_POST['email']."<br>";
    echo "Password Strength: ".strength($_POST['pass']);
}
?>