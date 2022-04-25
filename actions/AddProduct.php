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
$cat = intval($_POST['category']);


if (empty($name)) {
    header("Location: ../AddProduct.php?error=Invalid%20product%20name");
} elseif (empty($price) || $price <= 0) {
    header("Location: ../AddProduct.php?error=Invalid%20price");
} elseif (empty($cat) || !is_int($cat)) {
    header("Location: ../AddProduct.php?error=Invalid%20category");
} else {
    $picture = $_FILES["picture"];
    if ($picture['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $picture["tmp_name"];
        $extension = explode('/', $picture["type"])[1];
        $id = createProducts($name, $price, $description, $cat, ".$extension");
        move_uploaded_file($tmp_name, __DIR__ . "/../assets/products/$id.$extension");
        header("Location: ../produits.php?message=New%20product%20add%20successfully");
    } else {
        header("Location: ../AddProd.php?error=Picture%20missing");
    }
}
