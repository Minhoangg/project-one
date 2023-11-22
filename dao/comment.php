<?php

class comment
{

    var $id = null;

    var $product_id = null;

    var $count = null;

    var $view  = null;


    function delete($id)
    {
        $db = new connect();
        $query = "DELETE  FROM comments WHERE id='$id'";
        $result = $db->pdo_execute($query);
        return $result;
    }

    function insert($product_id, $content, $user_id)
    {
        $db = new connect();
        $query = "INSERT INTO `comment`( `product_id`, `content`, `user_id`)  VALUES ('$product_id','$content','$user_id')";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function selectcmt()
    {
        $db = new connect();
        $select = "SELECT products.id,products.product_name,
        COUNT(comments.content) AS 'soluong',
        MIN(comments.created_at) AS 'cunhat',
        MAX(comments.created_at) AS 'moinhat'
        FROM comments JOIN products ON comments.product_id= products.id
        GROUP BY products.id,products.product_name
        HAVING soluong >0
        ORDER BY soluong DESC";
        $result = $db->pdo_query($select);
        return $result;
    }
    public function selectcmtdetail($productID)
    {
        $db = new connect();
        $select = "SELECT comments.content,comments.created_at,comments.id AS idcmt ,products.id ,users.name
        FROM comments
        JOIN users ON comments.user_id=users.id
        JOIN products ON comments.product_id=products.id
        WHERE products.id='$productID'";
        $result = $db->pdo_query($select);
        return $result;
    }
}
