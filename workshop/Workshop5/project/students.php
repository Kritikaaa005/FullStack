<?php
include "header.php";

if (file_exists("students.txt")) {
    $lines = file("students.txt");

    foreach ($lines as $line) {
        [$name, $email, $skills] = explode("|", trim($line));
        $skillsArray = explode(",", $skills);

        echo "<p>";
        echo "Name: $name<br>";
        echo "Email: $email<br>";
        echo "Skills: ";
        print_r($skillsArray);
        echo "</p><hr>";
    }
}

include "footer.php";
?>
