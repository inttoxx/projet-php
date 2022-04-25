<?php
require_once('../lib/infos.php');
require_once('../lib/users.php');
require_once('../lib/session.php');
if (!isCurrentUserAdmin()) {
    header("Location: /index.php");
}

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$admin = intval($_POST['admin']);

if (checkIfEmailExist($email)) {
    header("Location: ../AddUsers.php?error=Email%20already%20taken");
} else if (checkIfUserExist($username)) {
    header("Location: ../AddUsers.php?error=Username%20already%20taken");
} else if (empty($_POST['password'])) {
    header("Location: ../AddUsers.php?error=Password%20needed");
} else {
    createUser($username, $password, $email, $admin);
    header("Location: ../users.php?message=New%20User%20Add%20Successfully");
}
