<?php
require_once('../lib/infos.php');
if (isset($_SESSION['id_user'])) {
    header("Location: /index.php");
}
$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM users WHERE email= ?";
$statment = $db->prepare($sql);
$statment->execute([$email]);
$user = $statment->fetch();

if ($statment->rowCount() != 0) {
    if (password_verify($pass, $user['password'])) {
        if ($user['admin'] == 1) {
            $_SESSION['id_user'] = $user['id'];
            header("Location: /home.php");
        } else {
            $_SESSION['id_user'] = $user['id'];
            header("Location: /index.php");
        }
    } else {
        header("Location: /signin.php?error=Wrong%20password");
    }
} else {
    header("Location: /signin.php?error=No%20account%20found");
}
