<?php
require_once('lib/infos.php');
require_once('lib/categories.php');
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
        <h1>New Produit</h1>
        <form method="post" action="/actions/AddProduct.php" enctype="multipart/form-data">
            <label for='name'>Name</label><br />
            <input id='name' type='text' name='name' placeholder="Product's name" /><br />
            <label for='price'>Price</label><br />
            <input id='price' type='number' name='price' placeholder="Product's price" /><br />
            <label for='description'>Description</label><br />
            <textarea id='sescription' name='description' cols='50' rows='8' maxlength='500' placeholder='product description'></textarea><br />
            <label for='category'>Category</label><br />
            <select name='category'>
                <?php
                foreach (getCategories() as $cat) {
                    echo "<option value={$cat['id']}> {$cat['name']}</option>";
                }
                ?>
            </select><br />
            <label for='picture'>Picture</label><br />
            <input type='file' id='picture' name='picture'><br />
            <br /><input type="submit" value="Add" />
        </form>
    </article>
</body>

</html>