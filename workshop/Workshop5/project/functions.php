<?php

function formatName($name) {
    return ucwords(trim($name));
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function cleanSkills($string) {
    $skills = explode(",", $string);
    return array_map("trim", $skills);
}

function saveStudent($name, $email, $skillsArray) {
    $line = $name . "|" . $email . "|" . implode(",", $skillsArray) . PHP_EOL;
    file_put_contents("students.txt", $line, FILE_APPEND);
}

function uploadPortfolioFile($file) {
    if ($file["error"] !== 0) {
        throw new Exception("upload failed");
    }

    if ($file["size"] > 2 * 1024 * 1024) {
        throw new Exception("file too big");
    }

    $allowed = ["pdf", "jpg", "jpeg", "png"];
    $ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        throw new Exception("invalid file type");
    }

    if (!is_dir("uploads")) {
        mkdir("uploads");
    }

    $newName = time() . "_" . preg_replace("/[^a-zA-Z0-9]/", "", pathinfo($file["name"], PATHINFO_FILENAME)) . "." . $ext;
    move_uploaded_file($file["tmp_name"], "uploads/" . $newName);
}
