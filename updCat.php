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
        $name = $_GET['name'];
        $parent_id = $_GET['parent_id'];

        echo "<h1>Updating {$_GET['name']}</h1>
    
        <form method='post' action='/actions/updCat.php?id={$id}'>
            <label for='name'>Name</label><br/>
            <input id='name' type='text' name='name' value='{$name}' /><br/>
            <label for='parent_id'>Parent_id</label><br/>
            <input id='parent_id' type='number' name='parent_id' value={$parent_id} /><br/>
            <br/><input type='submit' value='Update'/>
         </form>";

        ?>
    </article>
</body>

</html>