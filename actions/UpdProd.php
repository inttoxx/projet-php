<?php
require_once('../lib/infos.php');
require_once('../lib/produits.php');
require_once('../lib/session.php');
if (!isCurrentUserAdmin()) {
    header("Location: /index.php");
}

$name = $_POST['name'];
$price = floatval($_POST['price']);
$description = $_POST['description'];
$cat = $_POST['category'];
$id = $_GET['id'];

if (empty($name)) {
    header("Location: ../updProd.php?error=Invalid%20product%20name&id={$id}&name={$name}&price={$price}&category={$cat}");
} elseif (empty($price) || $price <= 0) {
    header("Location: ../updProd.php?error=Invalid%20price&id={$id}&name={$name}&price={$price}&category={$cat}");
} elseif (empty($cat) || is_int($cat)) {
    header("Location: ../updProd.php?error=Invalid%20category&id={$id}&name={$name}&price={$price}&category={$cat}");
} else {
    $picture = $_FILES["picture"];
    if ($picture['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $picture["tmp_name"];
        $extension = explode('/', $picture["type"])[1];
        $rc = updateProduct($name, $price, $description, $cat, ".$extension", $id);
        if ($rc) {
            move_uploaded_file($tmp_name, __DIR__ . "/../assets/products/$id.$extension");
            header("Location: ../produits.php?message=Product%20{$name}%20successfully%20updated");
        } else {
            header("Location: ../produits.php?error=Product%20{$name}%20not%20updated");
        }
    } else {
        header("Location: ../updProd.php?error=Picture%20missing&id={$id}&name={$name}&price={$price}&category={$cat}&description={$description}");
    }
}
