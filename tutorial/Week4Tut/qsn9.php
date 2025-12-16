
<form method="POST">
    Password: <input type="password" name="pass">
    <button>Check</button>
</form>

<?php
if (isset($_POST['pass'])) {
    $p = $_POST['pass'];
    $errors = [];

    if (strlen($p) < 8) $errors[] = "Min 8 characters";
    if (!preg_match('/[0-9]/', $p)) $errors[] = "Must include number";
    if (!preg_match('/[\W]/', $p)) $errors[] = "Must include special character";

    if ($errors) foreach ($errors as $e) echo $e."<br>";
    else echo "Password is valid!";
}
?>