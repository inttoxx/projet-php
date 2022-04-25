<?php
require_once('../lib/infos.php');
require_once('../lib/categories.php');
require_once('../lib/session.php');
if (!isCurrentUserAdmin()) {
    header("Location: /index.php");
}

$name = $_POST['name'];
$parent_id = $_POST['parent_id'];

$id = intval($_GET['id']);

if (empty($name)) {
    header("Location: ../updCat.php?error=Invalid%20Name%20&name={$name}&parent_id={$parent_id}&id={$id}");
} elseif (empty($parent_id)) {
    header("Location: ../updCat.php?error=Invalid%20Parent%20&Id={$name}&parent_id={$parent_id}&id={$id}");
} else {
    $rc = updateCat($name, $parent_id, $id);
    if ($rc) {
        header("Location: ../categories.php?message=Category%20{$name}%20successfully%20updated");
    } else {
        header("Location: ../categories.php?error=User%20{$name}%20not%20updated");
    }
}
