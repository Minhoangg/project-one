<?php

class thongke{

    function thong_ke_binh_luan(){
        $db = new connect();
        $select = "SELECT products.id, products.product_name,
     COUNT(comments.content) as 'soluong',
      MIN(comments.created_at) as 'củ nhất',
       MAX(comments.created_at) as 'mới nhất'
        FROM comments JOIN products on comments.id = products.id 
        GROUP BY products.id, products.product_name
         HAVING soluong > 0 ORDER by soluong DESC";
        return $db->pdo_query($select);

    }
    function thong_ke_san_pham(){
        $db = new connect();
        $select = "SELECT COUNT(products.category_id) as countct,
        caterories.name as name , MIN(products.price) as minprice, 
        MAX(products.price) as maxprice,
        AVG(products.price) as avgprice
        FROM caterories LEFT JOIN products ON 
        caterories.id = products.category_id 
        GROUP BY caterories.id
        HAVING countct >0 ORDER BY `countct` DESC ";
        return $db->pdo_query($select);
    }
    function getDataChart()
    {   $db = new connect();
        $select = "SELECT COUNT(products.category_id) as countct, 
    caterories.name as name
    FROM caterories 
    LEFT JOIN products 
    ON caterories.id = products.category_id 
    GROUP BY caterories.id";
        return $db->pdo_query($select);
    }


}

?>