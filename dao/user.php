<?php
class user {

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
    function khach_hang_insert($name,$email,$password_hash,$thumbnail,$confirm_password, $role,$phone_number,$address){
        $db = new connect();
        $query = "INSERT INTO users(name,email,password,thumbnail,confirm_password, role,phone_number,address) VALUES ( ?, ?, ?, ?, ?, ?,?,?)";
        $db->pdo_execute($query,$name,$email,$password_hash,$thumbnail,$confirm_password, $role,$phone_number,$address);
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

    public function updatePass($pass_new_hash, $id_user)
    {
        $db = new connect();
        $query = "UPDATE users SET  password = '$pass_new_hash' WHERE id = '$id_user'";
        $db->pdo_execute($query);
    }

    public function selectByID($iduser)
    {
        $db = new connect();
        $select = "select * from users where id='$iduser'";
        $result = $db->pdo_query_one($select);
        return $result;
    }

    function deleteUser($id)
    {
        $db = new connect();
        $query = "delete from users where id = '$id'";
        $db->pdo_execute($query);
    }

    function updateUser($id,$name, $email, $password, $thumbnaill,$confirm_password,$role,$phone, $address)
    {
        $db = new connect();
        $query = "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$password',`thumbnail`='$thumbnaill',`confirm_password`='$confirm_password',`role`='$role',`phone_number`='$phone',`address`='$address' WHERE id=$id";
        $db->pdo_execute($query);
    }

    function insertUser($name, $email, $password,$thumbnail,$confirm_password,$role, $phone, $address)
    {
        $db = new connect();
        $query = "INSERT INTO users(name,email,password,phone_number,address,role,thumbnail) VALUES ($name, $email, $password,$thumbnail,$confirm_password,$role,$phone,$address)";
        $db->pdo_execute($query);
    }

    public function update_user($name, $email_user, $adress_user, $number_user, $thumbnail, $id_user)
    {
        $db = new connect();
        $query = "UPDATE users SET name = '$name', email = '$email_user', address = '$adress_user',thumbnail='$thumbnail', phone_number = '$number_user' WHERE id = '$id_user'";
        $db->pdo_execute($query);
    }
}
?>