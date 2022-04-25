<?php
require_once('lib/infos.php');
if (isset($_SESSION['id_user'])) {
    header("Location: /index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="assets/style/styleForm.css">
    <title>My shop-Register</title>
</head>

<body>
    <article>
        <div id="tout">
            <a href="index.php"><img src="/assets/images/Logo.png" alt="Logo" /></a>
            <div id="formulaire">
                <h1>Register</h1>
                <form method="post" action="/actions/register.php">
                    <label for="username">Your username</label><br>
                    <input id="username" type="text" name="username" placeholder="username" /><br>
                    <label for="email">your email</label><br>
                    <input id="email" type="email" name="email" placeholder="email" /><br>
                    <label for="password">Choose your password</label><br>
                    <input type="password" name="password" placeholder="password" /><br>
                    <br><input type="submit" value="Register" />
                </form>
                <?php
                if (isset($_GET['error'])) {
                    echo "<h2>{$_GET['error']}</h2>";
                }
                ?>
            </div>
        </div>
    </article>
</body>

</html>