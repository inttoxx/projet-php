<?php
require_once('lib/infos.php');
require_once('lib/categories.php');
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
    <a href="index.php"><img id='logo' src=" /assets/images/Logo.png" alt="Logo" /></a>
    <h1>Categories managment</h1>
    <?php
    if (isset($_GET['message'])) {
        echo "<h2 id='ok'>{$_GET['message']}</h2>";
    }
    if (isset($_GET['error'])) {
        echo "<h2 id='nop'>{$_GET['error']}</h2>";
    }
    ?>

    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>parent_id</td>
            <td>update</td>
            <td>Delete</td>
        </tr>
        <?php
        foreach (getCategories() as $categories) {
            echo "<tr>
                    <td>" . $categories['id'] . "</td>
                    <td>" . $categories['name'] . "</td>
                    <td>" . $categories['parent_id'] . "</td>
                    <td><a href='updCat.php?name={$categories['name']}&parent_id={$categories['parent_id']}&id={$categories['id']}'><img id='croix' src='/assets/images/update.png'></a></td>
                    <td><a href='/actions/DelCategories.php?id={$categories['id']}'><img id='croix' src='/assets/images/croix_rouge.jpg'></a></td>
                  </tr>";
        }
        ?>
    </table>
    <br>
    <a class='lien' href='AddCat.php'>ADD NEW</a><br>
    <a class='lien' href='home.php'>Admin Home Page</a>


</body>

</html>