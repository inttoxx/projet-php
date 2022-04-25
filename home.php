<?php
require_once('lib/infos.php');
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
    <h1>Admin Center</h1>
    <div id='pages_admin'>
        <div class='pages'>
            <a href="produits.php"><img src='/assets/images/Cart Button.png'></a>
            <a class='lien' href="produits.php">Products managment</a>
        </div>
        <div class='pages'>
            <a href="users.php"><img src='/assets/images/users.png'></a>
            <a class='lien' href="users.php">Users managment</a>
        </div>
        <div class='pages'>
            <a href="categories.php"><img src='/assets/images/cat.png'></a>
            <a class='lien' href="categories.php">Categories managment</a>
        </div>
    </div>
</body>

</html>