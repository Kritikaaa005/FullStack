
<?php
$users = [
  ["email" => "louis@gmail.com"],
  ["email" => "harry@gmail.com"],
  ["email" => "esther@gmail.com"]
];

$newEmail = "louis@gmail.com";
$found = false;

foreach ($users as $u) {
    if ($u["email"] == $newEmail) {
        $found = true;
        break;
    }
}

echo $found ? "Email already exists" : "Email available";
?>