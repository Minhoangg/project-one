<?php
class user {

    function getUser()
    {
        $db = new connect();
        $select = "select * from users";
        return $db->pdo_query($select);
    }
    public function checkUser($username,$password)
    {
        $db = new connect();
        $select="select * from users where UserName='$username' and Password='$password'";
        $result = $db->pdo_query_one($select);
        if($result!=null)
            return true;
        else
            return false;
    }
    function khach_hang_insert($name,$email,$password_hash,$thumbnail,$confirm_password, $role,$phone_number,$address){
        $db = new connect();
        $query = "INSERT INTO users(name,email,password,thumbnail,confirm_password, role,phone_number,address) VALUES ( ?, ?, ?, ?, ?, ?,?,?)";
        $db->pdo_execute($query,$name,$email,$password_hash,$thumbnail,$confirm_password, $role,$phone_number,$address);
    }

    public function userid($username,$password)
    {
        $db = new connect();
        $select="select UserID from users where UserName='$username' and Password='$password'";
        $result = $db->pdo_query_one($select);
        return $result;
    }

    public function getInfoById($id)
    {
        $db = new connect();
        $select = "select * from users where id='$id'";
        $result = $db->pdo_query_one($select);
        //   $quest = $result->fetch();
        return $result;
    }

    function insertUser($name, $email, $password,$thumbnail,$confirm_password,$role, $phone, $address)
    {
        $db = new connect();
        $query = "INSERT INTO users(name,email,password,phone_number,address,role,thumbnail) VALUES ($name, $email, $password,$thumbnail,$confirm_password,$role,$phone,$address)";
        $db->pdo_execute($query);
     }

    function updateUser($id,$name, $email, $password, $thumbnaill,$confirm_password,$role,$phone, $address)
    {
        $db = new connect();
        $query = "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$password',`thumbnail`='$thumbnaill',`confirm_password`='$confirm_password',`role`='$role',`phone_number`='$phone',`address`='$address' WHERE id=$id";
        $db->pdo_execute($query);
    }

    function deleteUser($id)
    {
        $db = new connect();
        $query = "delete from users where id = '$id'";
        $db->pdo_execute($query);
    }
    public function selectByID($iduser)
    {
        $db = new connect();
        $select = "select * from users where id='$iduser'";
        $result = $db->pdo_query_one($select);
        return $result;
    }
}

?>