<?php


function checkIfEmailExist($email)
{
    global $db;
    $check_email = ("SELECT * FROM users WHERE email=?");
    $recherch = $db->prepare($check_email);
    $recherch->execute([$email]);
    return $recherch->rowCount() != 0;
}
function checkIfUserExist($user)
{
    global $db;
    $check_user = ("SELECT * FROM users WHERE username=?");
    $recherch = $db->prepare($check_user);
    $recherch->execute([$user]);
    return $recherch->rowCount() != 0;
}

function createUser($username, $password, $email, $admin = 0)
{
    global $db;
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password, email, admin) VALUES (?, ?, ?, ?)";
    $statement = $db->prepare($sql);
    $statement->execute([$username, $hash, $email, $admin]);
}

function getUsers()
{
    global $db;
    $sql = "SELECT * FROM users";
    $users = $db->prepare($sql);
    $users->execute();
    return $users->fetchAll();
}

function updateUser($username, $email, $admin, $id)
{
    global $db;
    $sql = "UPDATE users SET username=:username, email=:email, admin=:admin WHERE id=:id";
    $update = $db->prepare($sql);
    $update->bindParam('username', $username);
    $update->bindParam('email', $email);
    $update->bindParam('admin', $admin);
    $update->bindParam('id', $id);
    $update->execute();
    return $update->rowCount() != 0;
}

function DelUser($id)
{
    global $db;
    $sql = "DELETE FROM users WHERE id=?";
    $delete = $db->prepare($sql);
    $delete->execute([$id]);
}
