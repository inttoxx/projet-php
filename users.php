<?php
require_once('lib/infos.php');
require_once('lib/users.php');
require_once('lib/session.php');
if (!isCurrentUserAdmin()) {
    header("Location: /index.php");
}
?>
<html>

<head>
    <link rel='stylesheet' href="assets/style/styleadmin.css">
</head>

<body>
    <a href="index.php"><img id='logo' src="/assets/images/Logo.png" alt="Logo" /></a>

    <h1>Users Managment</h1>
    <?php
    if (isset($_GET['message'])) {
        echo "<h2 id='ok'>{$_GET['message']}</h2>";
    }
    if (isset($_GET['error'])) {
        echo "<h2 id='nop'>{$_GET['error']}</h2>";
    }

    ?>
    <table id='coller'>
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Email</td>
            <td>Admin</td>
            <td>Update</td>
            <td>Delete</td>
        </tr>
        <?php
        foreach (getUsers() as $user) {
            echo "<tr>
                    <td>" . $user['id'] . "</td>
                    <td>" . $user['username'] . "</td>
                    <td>" . $user['email'] . "</td>
                    <td>" . $user['admin'] . "</td>
                    <td><a href='updUser.php?username={$user['username']}&email={$user['email']}&admin={$user['admin']}&id={$user['id']}''><img id='croix' src='/assets/images/update.png'></a></td>
                    <td><a href='/actions/delUser.php?id={$user['id']}'><img id='croix' src='/assets/images/croix_rouge.jpg'></a></td>
                </tr>";
        }
        ?>
    </table>
    <br><a class='lien' href='AddUsers.php'>ADD NEW USER</a><br>
    <a class='lien' href='home.php'>Admin Home Page</a>

</body>

</html>