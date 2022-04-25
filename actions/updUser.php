<?php
require_once('../lib/infos.php');
require_once('../lib/users.php');
require_once('../lib/session.php');
if (!isCurrentUserAdmin()) {
    header("Location: /index.php");
}

$username = $_POST['username'];
$email = $_POST['email'];
$admin = intval($_POST['admin']);
$id = intval($_GET['id']);

if (empty($username)) {
    header("Location: ../updUser.php?error=Invalid%20product%20username&username={$username}&email={$email}&admin={$admin}&id={$id}");
} elseif (empty($email)) {
    header("Location: ../updUser.php?error=Invalid%20email&username={$username}&email={$email}&admin={$admin}&id={$id}");
} else {
    $rc = updateUser($username, $email, $admin, $id);
    if ($rc) {
        header("Location: ../users.php?message=User%20{$username}%20successfully%20updated");
    } else {
        header("Location: ../users.php?error=User%20{$name}%20not%20updated");
    }
}
