<?php
$errors = [];
$success = "";

if(isset($_POST['register'])) {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $cpass    = $_POST['confirm_password'];

    if(empty($name)) $errors['name'] = "Name is required";
    if(empty($email)) $errors['email'] = "Email is required";
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Invalid email format";
    if(empty($password)) $errors['password'] = "Password is required";
    elseif(strlen($password) < 8) $errors['password'] = "Password must be ≥ 8 characters";
    if(empty($cpass)) $errors['confirm_password'] = "Confirm password is required";
    elseif($password !== $cpass) $errors['confirm_password'] = "Passwords do not match";

    $file = 'users.json';
    if(!file_exists($file)) file_put_contents($file, json_encode([]));

    $all_users = json_decode(file_get_contents($file), true);

    foreach($all_users as $u) {
        if($u['email'] === $email) {
            $errors['email'] = "Email already registered";
            break;
        }
    }

    if(empty($errors)) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $all_users[] = ["name"=>$name, "email"=>$email, "password"=>$hashed];
        if(file_put_contents($file, json_encode($all_users, JSON_PRETTY_PRINT))) {
            $success = "Registration successful! Welcome, <b>$name</b>!";
        } else {
            $errors['file'] = "Error saving data. Try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
        body{font-family:sans-serif;margin:50px;}
        input, button{padding:12px;width:350px;margin:8px 0;}
        button{background:pink;color:white;border:none;cursor:pointer;}
        .error{color:red;font-weight:bold;}
        .success{background:green;color:white;padding:20px;border-radius:10px;}
    </style>
</head>
<body>
    <h2>User Registration</h2>
    <?php if($success) echo "<div class='success'>$success</div>"; ?>
    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $_POST['name'] ?? ''; ?>">
        <div class="error"><?php echo $errors['name'] ?? ''; ?></div>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $_POST['email'] ?? ''; ?>">
        <div class="error"><?php echo $errors['email'] ?? ''; ?></div>

        <label>Password:</label>
        <input type="password" name="password">
        <div class="error"><?php echo $errors['password'] ?? ''; ?></div>

        <label>Confirm Password:</label>
        <input type="password" name="confirm_password">
        <div class="error"><?php echo $errors['confirm_password'] ?? ''; ?></div>

        <button type="submit" name="register">Register Now</button>
    </form>
</body>
</html>
