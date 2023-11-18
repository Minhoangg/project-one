<?php

class user
{

    function getUser()
    {
        $db = new connect();
        $select = "select * from users";
        return $db->pdo_query($select);
    }

    public function checkUser($username, $password)
    {
        $db = new connect();
        $sql = "SELECT * FROM users WHERE name = ? LIMIT 1";
        $user = $db->pdo_query_one($sql, $username);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return null;
        }
    }

    public function checkPass($id_user, $pass_old)
    {
        $db = new connect();
        $sql = "SELECT * FROM users WHERE id = ? LIMIT 1";
        $user = $db->pdo_query_one($sql, $id_user);

        if ($user && password_verify($pass_old, $user['password'])) {
            return $user;
        } else {
            return null;
        }
    }


    public function userid($username, $password)
    {
        $db = new connect();
        $select = "select UserID from users where UserName='$username' and Password='$password'";
        $result = $db->pdo_query_one($select);
        return $result;
    }

    public function getInfoById($username)
    {
        $db = new connect();
        $select = "select * from users where Username='$username'";
        $result = $db->pdo_query($select);
        //   $quest = $result->fetch();
        return $result;
    }

    function insertUser($tmpUsername, $tmpPassword, $tmpName, $tmpEmail, $tmpPermisions, $tmpPhone)
    {
        $db = new connect();
        $query = "INSERT INTO users(UserID,Username,Password,FullName,Email ,Permissions, Avatar,Address,Phone) VALUES (NULL,'$tmpUsername','$tmpPassword','$tmpName','$tmpEmail','$tmpPermisions','','',$tmpPhone)";
        $db->pdo_execute($query);
    }

    public function updateUser($name, $email_user, $adress_user, $number_user, $thumbnail, $id_user)
    {
        $db = new connect();
        // Đã sửa lỗi dấu phẩy thừa và thêm câu điều kiện WHERE
        $query = "UPDATE users SET name = '$name', email = '$email_user', address = '$adress_user',thumbnail='$thumbnail', phone_number = '$number_user' WHERE id = '$id_user'";
        $db->pdo_execute($query);
    }

    public function updatePass($pass_new_hash, $id_user)
    {
        $db = new connect();
        $query = "UPDATE users SET  password = '$pass_new_hash' WHERE id = '$id_user'";
        $db->pdo_execute($query);
    }

    function deleteUser($id)
    {
        $db = new connect();
        $query = "delete from users where UserName = '$id'";
        $db->pdo_execute($query);
    }
}

?>