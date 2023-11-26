<?php
class user {

    function getUser()
    {
        $db = new connect();
        $select = "select * from users";
        return $db->pdo_query($select);
    }

    public function checkUser($phone_number, $password)
    {
        $db = new connect();
        $sql = "SELECT * FROM users WHERE phone_number = ? LIMIT 1";
        $user = $db->pdo_query_one($sql, $phone_number);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return null;
        }
    }
    function khach_hang_insert($name,$email,$password_hash,$thumbnail, $role,$phone_number,$address){
        $db = new connect();
        $query = "INSERT INTO users(name,email,password,thumbnail, role,phone_number,address) VALUES (?, ?, ?, ?, ?,?,?)";
        $db->pdo_execute($query,$name,$email,$password_hash,$thumbnail, $role,$phone_number,$address);
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
    public function selectByphone($phone_number)
    {
        $db = new connect();
        $select = "select * from users where phone_number='$phone_number'";
        $result = $db->pdo_query_one($select, $phone_number);
        if ($result) {
            return $result;
        } else {
            return null;
        }
    }
    public function selectByEmail($email)
    {
        $db = new connect();
        $select = "select * from users where email='$email'";
        $result = $db->pdo_query_one($select, $email);
        if ($result) {
            return $result;
        } else {
            return null;
        }
    }


    function deleteUser($iduser)
    {
        $db = new connect();
        $query = "delete from users where id = '$iduser'";
        $db->pdo_execute($query);
    }

    function updateUser($id,$name, $email,  $thumbnaill,$role,$phone, $address)
    {
        $db = new connect();
        $query = "UPDATE `users` SET `name`='$name',`email`='$email',`thumbnail`='$thumbnaill',`role`='$role',`phone_number`='$phone',`address`='$address' WHERE id=$id";
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