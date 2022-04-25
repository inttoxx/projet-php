<?php
function getCurrentUsername()
{
    global $db;
    $sql = "SELECT username FROM users WHERE id=?";
    $user = $db->prepare($sql);
    $user->execute([$_SESSION['id_user']]);
    $result = $user->fetch();
    return $result['username'];
}

function isCurrentUserAdmin()
{
    global $db;
    $sql = "SELECT admin FROM users WHERE id=?";
    $user = $db->prepare($sql);
    $user->execute([$_SESSION['id_user']]);
    $result = $user->fetch();
    return $result['admin'] == 1;
}
