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

    public function checkEmail($email)
    {
        $db = new connect();
        $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
        $user = $db->pdo_query_one($sql, $email);
        if ($user) {
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
    function insert_user_google($name,$email,$imageSaveData){
        $db = new connect();
        $query = "INSERT INTO users(name,email,password,thumbnail, role,phone_number,address) VALUES (?, ?, 0, ?, 0,0,0)";
        $db->pdo_execute($query,$name,$email,$imageSaveData);
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

    function updatePassByEmail($pass_new_hash, $email)
    {
        $db = new connect();
        $query = "update users set password = '$pass_new_hash'  where  email ='$email'";
        $db->pdo_execute($query);
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
    public function selectByUser($phone_number, $password)
{
    $db = new connect();
    $select = "SELECT * FROM users WHERE phone_number = $phone_number AND password = $password";

    $login = $db->pdo_query_one($select, $phone_number, $password);
    if ($login) {
        return $login;
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

    function updateUser($id, $name, $email, $thumbnaill,$role,$phone, $address)
    {
        $db = new connect();
        $query = "UPDATE `users` SET `name`='$name',`email`='$email',`thumbnail`='$thumbnaill',`role`='$role',`phone_number`='$phone',`address`='$address' WHERE id=$id";
        $db->pdo_execute($query);
    }
    function updateUserinorder($id,$name, $email, $phone, $address)
    {
        $db = new connect();
        $query = "UPDATE `users` SET `name`='$name',`email`='$email',`phone_number`='$phone',`address`='$address' WHERE id=$id";
        $db->pdo_execute($query);
    }

    public function update_user($name, $email_user, $adress_user, $number_user, $thumbnail, $id_user)
    {
        $db = new connect();
        $query = "UPDATE users SET name = '$name', email = '$email_user', address = '$adress_user',thumbnail='$thumbnail', phone_number = '$number_user' WHERE id = '$id_user'";
        $db->pdo_execute($query);
    }
   public function insert_user($name,$email,$password,$thumbnail,$phone_number){
        $db = new connect();
        $query = "INSERT INTO users(name,email,password) VALUES ('$name','$email','$password','$phone_number')";
       $result= $db->pdo_execute($query);
        return $result;
    }
    public function check($username,$email,$phone){
        $db = new connect();
        $query = "SELECT * from users WHERE name='$username' or email='$email' or phone_number='$phone';";
       $result= $db->pdo_query($query);
        return $result;
    }
   
}
?>