<?php
require_once('../lib/infos.php');
require_once('../lib/categories.php');
require_once('../lib/session.php');
if (!isCurrentUserAdmin()) {
    header("Location: /index.php");
}

$cat_name = $_POST['name'];
$parent_id = $_POST['parent_id'];


if (checkIfCat_name($cat_name)) {
    header("Location: ../AddCat.php?error=Name%20already%20taken");
} else {
    createCategories($cat_name, $parent_id);
    header("Location: ../categories.php?message=New%20Category%20Add%20Successfully");
}
