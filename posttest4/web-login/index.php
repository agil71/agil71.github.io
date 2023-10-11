<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Login Form</title>
</head>
<body>

<div class="background"></div>

<div class="login-container">
    <div class="login-box">
        <h2>Login To Anime Web</h2>
        <form action="hasil2.php" method="post">
            <label for="username">Username:</label>
            <input type="username" name="username" required autocomplete="off" placeholder="username" >

            <label for="password">Password:</label>
            <input type="password" name="password" required autocomplete="off" placeholder="password">

            <label for="age">Age:</label>
            <input type="age" name="age" required autocomplete="off" placeholder="age">

            <button type="submit">Login</button>
        </form>
        <?php
        // Display login error (if any)
        if (isset($_GET['error'])) {
            echo '<p class="error-message">' . $_GET['error'] . '</p>';
        }
        ?>
    </div>
</div>

</body>
</html>
