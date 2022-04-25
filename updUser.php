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
        <?php
        $id = $_GET['id'];
        $username = $_GET['username'];
        $email = $_GET['email'];
        $admin = $_GET['admin'];

        echo "<h1>Updating {$_GET['username']}</h1>
    
        <form method='post' action='/actions/updUser.php?id={$id}'>
            <label for='username'>Userame</label><br>
            <input id='username' type='text' name='username' value={$username} /><br>
            <label for='email'>Email</label><br>
            <input id='email' type='email' name='email' value={$email} /><br>
            <label for='admin'>Is Admin</label><br>";
        if ($admin == 1) {
            echo "<br/><input id='isAdmin' type='radio' name='admin' value='1' checked><label for='isAdmin'>Yes</label><br>
                <input id='notAdmin' type='radio' name='admin' value='0'> <label for='notAdmin'>No</label><br> ";
        } else {
            echo "<br><input id='isAdmin' type='radio' name='admin' value='1'><label for='isAdmin'>Yes</label><br>
                <input id='notAdmin' type='radio' name='admin' value='0' checked> <label for='notAdmin'>No</label><br> ";
        }
        echo "<br><input type='submit' value='Update'/>
         </form>";


        ?>
    </article>


</body>

</html>