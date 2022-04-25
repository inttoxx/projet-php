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
        <h1>New Category</h1>
        <form method="post" action="../actions/AddCat.php">
            <label for='name'>Name</label><br />
            <input type="text" name="name" placeholder="Category's name" /><br />
            <label for='parent_id'>Parent_id</label><br />
            <input type="number" name="parent_id" placeholder="parent_id" /><br />
            <br /><input type="submit" value="Add" />
        </form>
    </article>
</body>

</html>