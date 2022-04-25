<?php
require_once('../lib/infos.php');
require_once('../lib/produits.php');
require_once('../lib/session.php');
if (!isCurrentUserAdmin()) {
    header("Location: /index.php");
}

DelProduct($_GET['id']);
header("Location: ../produits.php?message=Product%20id%20number%20{$_GET['id']}%20 deleted");
