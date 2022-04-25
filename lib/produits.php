<?php

function getProducts()
{
    global $db;
    $sql = "SELECT * FROM products";
    $produit = $db->prepare($sql);
    $produit->execute();
    return $produit->fetchAll();
}

function DelProduct($id)
{
    global $db;
    $sql = "DELETE FROM products WHERE id=?";
    $delete = $db->prepare($sql);
    $delete->execute([$id]);
}
function createProducts($name, $price, $description, $cat, $picture_ext)
{
    global $db;
    $sql = "INSERT INTO products (name, price, description, category_id, picture_ext) VALUES (?, ?, ?, ?, ?)";
    $statement = $db->prepare($sql);
    $statement->execute([$name, $price, $description, $cat, $picture_ext]);
    return $db->lastInsertId();
}

function updateProduct($name, $price, $description, $cat_id, $picture_ext, $id)
{
    global $db;
    $sql = "UPDATE products SET name = :name, price = :price, description = :desc, category_id = :cat_id, picture_ext = :pic_ext WHERE id = :id";
    $update = $db->prepare($sql);
    $update->bindParam('name', $name);
    $update->bindParam('price', $price);
    $update->bindParam('desc', $description);
    $update->bindParam('cat_id', $cat_id);
    $update->bindParam('pic_ext', $picture_ext);
    $update->bindParam('id', $id);
    $update->execute();
    return $update->rowCount() != 0;
}
function getLimitedProducts($offset = 7)
{
    global $db;
    $sql = "SELECT * FROM products LIMIT 7, $offset";
    $produit = $db->prepare($sql);
    $produit->execute();
    return $produit->fetchAll();
}
function getRowProduct()
{
    global $db;
    $sql = "SELECT * FROM products";
    $produit = $db->prepare($sql);
    $produit->execute();
    return $produit->rowCount();
}
function getLimitedProductsp1()
{
    global $db;
    $sql = "SELECT * FROM products LIMIT 7";
    $produit = $db->prepare($sql);
    $produit->execute();
    return $produit->fetchAll();
}
function filterProductsp1($name, $price, $cat_id, $order)
{
    global $db;
    $sql = "SELECT * FROM products INNER JOIN categories ON products.category_id=categories.parent_id WHERE name LIKE '%:name%' OR price=:price OR categories.parent_id=:cat_id AND category_id=:cat_id ORDER BY :order LIMIT 7";
    $query = $db->prepare($sql);
    $query->bindParam('name', $name);
    $query->bindParam('price', $price);
    $query->bindParam('cat_id', $cat_id);
    $query->bindParam('order', $order);
    $query->execute();
    return $query->fetchAll();
}
function filterProductsPagine($name, $price, $cat_id, $order, $offset)
{
    global $db;
    $sql = "SELECT * FROM products INNER JOIN categories ON products.category_id=categories.parent_id WHERE name LIKE '%:name%' OR price=:price OR categories.parent_id=:cat_id AND category_id=:cat_id ORDER BY :order LIMIT 7, $offset";
    $query = $db->prepare($sql);
    $query->bindParam('name', $name);
    $query->bindParam('price', $price);
    $query->bindParam('cat_id', $cat_id);
    $query->bindParam('order', $order);
    $query->execute();
    return $query->fetchAll();
}
function filterProducts($name, $price, $cat_id, $order)
{
    global $db;
    $sql = "SELECT * FROM products INNER JOIN categories ON products.category_id=categories.parent_id WHERE name LIKE '%:name%' OR price=:price OR categories.parent_id=:cat_id AND category_id=:cat_id ORDER BY :order";
    $query = $db->prepare($sql);
    $query->bindParam('name', $name);
    $query->bindParam('price', $price);
    $query->bindParam('cat_id', $cat_id);
    $query->bindParam('order', $order);
    $query->execute();
    return $query->fetchAll();
}
