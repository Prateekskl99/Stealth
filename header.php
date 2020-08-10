<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcout icon" type="image/png" href="images/loginfavicon.png">
    <title>Login System</title>
</head>

<body>
    <header>
        <nav>
            <a href="#">
                <img src="images/logo.svg" alt="logo">
            </a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">About Me</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div>
                <?php
                if (isset($_SESSION['userId'])) {
                    echo '<form action="includes/logout.inc.php" method="post">
                        <button type="Submit" name="logout-submit">Logout</button>
                    </form>';
                } else {
                    echo '<form action="includes/login.inc.php" method="post">
                        <input type="text" name="mailuid" placeholder="Username/E-mail">
                        <input type="password" name="pwd" placeholder="Password">
                        <button type="submit" name="login-submit">Login</button>
                    </form>
                    <a href="signup.php" class="header-signup">Signup</a>';
                }
                ?>
            </div>
        </nav>
    </header>
</body>

</html>