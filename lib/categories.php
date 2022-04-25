<?php

function checkIfCat_Parent_id($parent_id)
{
    global $db;
    $check_parent = ("SELECT * FROM categories WHERE parent_id=?");
    $recherch = $db->prepare($check_parent);
    $recherch->execute([$parent_id]);
    return $recherch->rowCount() != 0;
}
function checkIfCat_name($cat_name)
{
    global $db;
    $check_cat_name = ("SELECT * FROM categories WHERE name=?");
    $recherch = $db->prepare($check_cat_name);
    $recherch->execute([$cat_name]);
    return $recherch->rowCount() != 0;
}

function getCategories()
{
    global $db;
    $sql = "SELECT * FROM categories";
    $produit = $db->prepare($sql);
    $produit->execute();
    return $produit->fetchAll();
}

function DelCategories($id)
{
    global $db;
    $sql = "DELETE FROM categories WHERE id=?";
    $delete = $db->prepare($sql);
    $delete->execute([$id]);
}
function createCategories($name, $parent_id)
{
    global $db;
    $sql = "INSERT INTO categories (name, parent_id) VALUES (?, ?)";
    $statement = $db->prepare($sql);
    $statement->execute([$name, $parent_id]);
    return $statement->rowCount() != 0;
}

function updateCat($name, $parent_id, $id)
{
    global $db;
    $sql = "UPDATE categories SET name=:name, parent_id=:parent_id WHERE id=:id";
    $update = $db->prepare($sql);
    $update->bindParam('name', $name);
    $update->bindParam('parent_id', $parent_id);
    $update->bindParam('id', $id);
    $update->execute();
    return $update->rowCount() != 0;
}
