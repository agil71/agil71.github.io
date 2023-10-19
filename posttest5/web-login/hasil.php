<?php
// Simulate user credentials (replace with a secure authentication mechanism)
$validEmail = "admin";
$validPassword = "password";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];

    if ($enteredUsername === $validUsername && $enteredPassword === $validPassword) {
        header("Location: welcome.php"); // Redirect to a welcome page upon successful login
        exit();
    } else {
        header("Location: index.php?error=Invalid credentials");
        exit();
    }
}
?>
