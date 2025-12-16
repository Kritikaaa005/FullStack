<form method="POST">
    Full Name: <input type="text" name="fullname"><br><br>
    Email: <input type="email" name="email"><br><br>
    <button>Submit</button>
</form>

<?php
if(isset($_POST['fullname'], $_POST['email'])){
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);

    if($fullname === "" || $email === ""){
        echo "<p style='color:red;'>Please fill in all required fields!</p>";
    } else {
        echo "<p style='color:green;'>All good!</p>";
    }
}
?>
