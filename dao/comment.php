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
    function binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl){
        $db = new connect();
        $sql = "INSERT INTO comments(user_id, product_id, content, created_at) VALUES (?,?,?,?)";
        $db->pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl);
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
    function showbl($dsbl)
    {
        $html_dsbl= '';
        foreach ($dsbl as $bl) {

            $html_dsbl .= '<div class="table  table-hover ">
        
       <tr> <td >'.$bl['hoten'].'</td>
          <td>'.$bl['ngay_bl'].'</td><br></tr>
        <tr> <img class="how-itemcart1" src="../uploaded/user/' .$bl['hinh']. '" alt="">
          <td>Nội Dung: '.$bl['noidung'].'</td>
        </tr>
       
      
  
    </div>';
        }
        return $html_dsbl;

    }
    function getAllComment($ma_hh)
    {
        $db = new connect();
        $sql = "SELECT users.thumbnail
     as hinh, users.name as hoten,
      comments.content as noidung,
       comments.created_at as ngay_bl 
       FROM users 
       JOIN comments
        ON users.id = comments.user_id 
        JOIN products ON 
        products.id = comments.product_id 
        WHERE products.id = $ma_hh";
        return $db->pdo_query($sql, $ma_hh);
    }
}
