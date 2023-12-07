<?

class Products
{
    var $category_id = null;
    var $product_name = null;
    var $product_special = null;
    var $product_desbribe = null;
    var $price = null;
    var $price_sale = null;
    var $product_thumbnail = null;
    var $created_a = null;
    var $product_views = null;

    public function insertProducts($category_id, $product_name, $product_describe, $price_sale, $product_thumbnail, $price, $created_at, $product_special)
    {
        $db = new connect();
        $query = 'INSERT INTO products (category_id, product_name, product_desbribe, price_sale, product_thumbnail, price, created_at, product_special) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';

        // Make sure the order of parameters matches the order in the SQL query
        $db->pdo_execute($query, $category_id, $product_name, $product_describe, $price_sale, $product_thumbnail, $price, $created_at, $product_special);
    }

    public function getList()
    {
        $db = new connect();
        $query = 'SELECT  category.id,  products.name, products.special, products.price, products.desbribe, product.view, created.at
        FROM products 
        JOIN products
        ON categories.id = products.cat_id';
        $result = $db->pdo_query($query);
        return $result;
    }

    public function selectProductAll()
    {
        $db = new connect();
        $query = 'SELECT * from products order by id desc';
        $result = $db->pdo_query($query);
        return $result;
    }

    public function getImgIdProduct($product_id)
    {
        $db = new connect();
        $query = 'SELECT path
        FROM images
        WHERE images.product_id =' . $product_id;
        $result = $db->pdo_query($query);
        return $result;
    }

    public function getById($ProductId)
    {
        $db = new connect();
        $query = 'SELECT * from products where id =' . $ProductId;
        $result = $db->pdo_query_one($query);
        return $result;
    }

    public function updatepro($cate_id, $product_name, $product_special, $price, $price_sale, $product_desbribe, $product_thumbnail, $update_at, $created_at, $id)
    {
        $db = new connect();
        $query = "UPDATE products SET category_id  =?,  product_name =?, product_special=?, price =?, price_sale =?, product_desbribe=?, product_thumbnail=?, update_at=?, created_at=? WHERE id=?";
        $result = $db->pdo_execute($query, $cate_id, $product_name, $product_special, $price, $price_sale, $product_desbribe, $product_thumbnail, $update_at, $created_at, $id);

    }

    function products_select_by_id($id)
    {
        $db = new connect();
        $sql = "SELECT * FROM products WHERE id=?";
        return $db->pdo_query_one($sql, $id);
    }

    public function updateimg($path, $id)
    {
        $db = new connect();
        $query = "UPDATE  images SET path = '$path' where id =$id";
        $result = $db->pdo_execute($query);
        return $result;
    }


    public function delete($id)
    {
        $db = new connect();
        $query = "DELETE FROM products WHERE id=?";
        if (is_array($id)) {
            foreach ($id as $ma) {
                $db->pdo_execute($query, $ma);
            }
        } else {
            $db->pdo_execute($query, $id);
        }
    }

    // public function add($name, $price, $qty, $cat_id, $description)
    // {
    //     $db = new connect();
    //     $query = "INSERT INTO products(name, price, qty, cat_id, description ) values('$name', '$price', '$qty', '$cat_id', '$description')";
    //     $result = $db->pdo_execute($query);
    //     $this->idpro = $db->getInsertLastId();
    //     return $result;
    // }
    public function addimage($product_id, $path)
    {
        $db = new connect();
        $query = "INSERT INTO images (product_id, path) values ($product_id, '$path')";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function getInfoPro($idpro, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM products WHERE id = $idpro";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    public function getInfoCate($idcate, $colum)
    {
        $db = new connect();
        $sql = "SELECT * FROM categories WHERE id = $idcate";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$colum];
        }
    }

    public function getInfoCate2($idcate, $colum)
    {
        $db = new connect();
        $sql = "SELECT * FROM categories, products  WHERE categories.id = products.cat_id AND products.id = $idcate";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$colum];
        }
    }


//     public function listpath(){
//         $db = new connect();
//         $query ='SELECT products.*, images.path
//         FROM products
//         JOIN images ON products.id = images.product_id
//         LIMIT 3';
//         $result = $db->pdo_query($query);
//         return $result;
//     }
    function showproduct($dssp)
    {
        $html_dssp = '';
        foreach ($dssp as $sp) {

            extract($sp);
            $price = number_format( $price,0,',','.');
//            if ($dac_biet == 1) {
//                $db = '<div class="best"></div>';
//            } else {
//                $db = '';
//            }
            $html_dssp .='
                <div  class =" p-b-35 isotope-item">
				<div class="block2">
                   <div class="block2-pic hov-img0">
                         <div style="height:300px;">
							<img class="h-100" src="../../../uploaded/upload/'.$product_thumbnail.'" alt="IMG-PRODUCT">
							<a href="index.php?pages=product_detail&id='.$id.'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 ">
								Chi tiết
							</a>
						   </div>
                    	<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									'.$product_name.'
								</a>
								<span class="stext-105 cl3">
									'.$price.  '<sup>đ</sub>  
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="../content/contentCilent/images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="../content/contentCilent/images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
</div>
</div>';
        }
        return $html_dssp;
    }
    function get_products_new($limit)
    {   $db = new connect();
        $sql = "SELECT * FROM products order by id DESC LIMIT " . $limit;
        return $db->pdo_query($sql);
    }
    function get_products_hot($limit)
    {   $db = new connect();
        $sql = "SELECT * FROM products where product_special=1  order by id DESC LIMIT " . $limit;
        return $db->pdo_query($sql);
    }
    function get_dssp($category_id, $limit)
    {   $db = new connect();
        $sql = "SELECT * FROM products where 1";
        if ($category_id > 0) {
            $sql .= " AND category_id =". $category_id;
        }
        $sql .= " order by id desc limit ". $limit;

        return $db->pdo_query($sql);
    }
    function get_product_new($limit)
    {   $db = new connect();
        $sql = "SELECT * FROM products order by id DESC LIMIT " . $limit;
        return $db->pdo_query($sql);
    }
    function getdssplq($ma_loai, $ma_hh, $limit)
    {   $db = new connect();
        $sql = "SELECT * FROM products where category_id=? and id<>? order by category_id desc limit " . $limit;
        return $db->pdo_query($sql, $ma_loai, $ma_hh);

    }
}

?>