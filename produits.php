<?php
require_once('lib/infos.php');
require_once('lib/produits.php');
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
    <h1>Products managment</h1>
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
            <td>Price</td>
            <td>Description</td>
            <td>Category id</td>
            <td>picture_ext</td>
            <td>Update</td>
            <td>Delete</td>
        </tr>
        <?php
        foreach (getProducts() as $produit) {
            echo "<tr>
                    <td>" . $produit['id'] . "</td>
                    <td>" . $produit['name'] . "</td>
                    <td>" . $produit['price'] . "</td>
                    <td>" . $produit['description'] . "</td>
                    <td>" . $produit['category_id'] . "</td>
                    <td>" . $produit['picture_ext'] . "</td>
                    <td><a href='updProd.php?name={$produit['name']}&price={$produit['price']}&category={$produit['category_id']}&id={$produit['id']}&description={$produit['description']}'><img id='croix' src='/assets/images/update.png'></td>
                    <td></a> <a href='/actions/DelProd.php?id={$produit['id']}'><img id='croix' src='/assets/images/croix_rouge.jpg'></a></td>
                  </tr>";
        }
        ?>
    </table>
    <br>
    <a class='lien' href='AddProduct.php'>ADD NEW</a><br>
    <a class='lien' href='home.php'>Admin Home Page</a>


</body>

</html>