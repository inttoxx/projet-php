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
    <title>My shop-Sign In</title>
</head>

<body>
    <article>
        <a href="index.php"><img src="/assets/images/Logo.png" alt="Logo" /></a>
        <div id="formulaire">
            <h1>Sign IN</h1>
            <form method="post" action="/actions/verifSignIn.php">
                <label for="email">Your email</label><br>
                <input id="email" type="email" name="email" placeholder="email" /><br>
                <label for="password">Your password</label><br>
                <input type="password" name="password" placeholder="password" /><br>
                <br><input type="submit" value="Login" /> <a href="signup.php">Créer un compte</a>
            </form>
            <?php
            if (isset($_GET['error'])) {
                echo "<h2>{$_GET['error']}</h2>";
            }
            ?>
        </div>
    </article>
</body>

</html>