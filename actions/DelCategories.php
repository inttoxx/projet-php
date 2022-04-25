<?php
require_once('../lib/infos.php');
require_once('../lib/categories.php');
require_once('../lib/session.php');
if (!isCurrentUserAdmin()) {
    header("Location: /index.php");
}

DelCategories($_GET['id']);
header("Location: ../categories.php?message=Category%20Id %20{$_GET['id']}%20 deleted");
