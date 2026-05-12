<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $passagain = $_POST['passagain'];

    if ($pass != $passagain) {
        die("A jelszavak nem egyeznek!");
    }

    $check = $connect->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $check->bind_param("ss", $username, $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        die("Felhasznalonev, vagy email mar foglalt.");
    }

    $hashedpw = password_hash($pass, PASSWORD_DEFAULT);

    $stmt = $connect->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedpw);
    $stmt->execute();

    header("Location: index.html");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
    <title>Regisztráció</title>
</head>
<body>
        <div w3-container w3-green>
            <h1>Regisztráció</h1>
        </div>
        <form class="w3-container" action="register.php" method="POST">
                <label for="username">Felhasznalonev</label>
                <input class="w3-input w3-border" type="text" placeholder="Felhasznalonev" name="username" id="username" required>

                <label for="email">Email</label>
                <input class="w3-input w3-border" type="email" placeholder="Email" name="email" id="email" required>

                <label for="pass">Jelszo</label>
                <input class="w3-input w3-border" type="password" placeholder="Jelszo" name="pass" id="pass" required>

                <label for="passagain">Jelszo ismet</label>
                <input class="w3-input w3-border" type="password" placeholder="Jelszo ismet" name="passagain" id="passagain" required>

                <button type="submit" class="registerbtn">Regisztráció</button>
    </form>
</body>
</html>