<?php
require_once('../lib/infos.php');
require_once('../lib/users.php');
require_once('../lib/session.php');
if (!isCurrentUserAdmin()) {
    header("Location: /index.php");
}

delUser($_GET['id']);
header("Location: ../users.php?message=Member%20{$_GET['id']}%20 deleted");
