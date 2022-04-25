<?php
require_once('lib/infos.php');
if (!isCurrentUserAdmin()) {
    header("Location: /index.php");
}
?>
<html>

<head>
    <link rel='stylesheet' href="assets/style/styleForm.css">
</head>

<body>
    <article>
        <?php
        if (isset($_GET['error'])) {
            echo "<h2>{$_GET['error']}</h2>";
        }
        ?>
        <a href="index.php"><img src="/assets/images/Logo.png" alt="Logo" /></a>
        <h1>Nouveau Client</h1>
        <form method="post" action="../actions/AddUser.php" action="input_radio.htm">
            <label for='username'>User Name</label><br>
            <input type="text" name="username" placeholder="Client's name" /><br>
            <label for='password'>Password</label><br>
            <input type="password" name="password" placeholder="password" /><br>
            <label for='email'>Email</label><br>
            <input type="email" name="email" placeholder="email" /><br>
            <p>Droit d'administrateur accordé?</p>
            <p>
                <input id='isAdmin' type="radio" name="admin" value="1"><label for='isAdmin'>Yes</label><br>
                <input id='notAdmin' type="radio" name="admin" value="0"> <label for='notAdmin'>No</label><br>
            </p>
            <input type="submit" value="Add" />
        </form>

    </article>
</body>

</html>