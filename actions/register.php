<?php
require_once('../lib/infos.php');
require_once('../lib/users.php');
if (isset($_SESSION['id_user'])) {
    header("Location: /index.php");
}

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if (checkIfEmailExist($email)) {
    header("Location: ../signup.php?error=Email%20already%20taken");
} else if (checkIfUserExist($username)) {
    header("Location: ../signup.php?error=Username%20already%20taken");
} else if (empty($_POST['password'])) {
    header("Location: ../signup.php?error=Password%20needed");
} else {
    createUser($username, $password, $email);
    header("Location: ../index.php?page=1&message=Account%20created%20!%20Please%20login");
}
