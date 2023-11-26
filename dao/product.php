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


    // public function listpath(){
    //     $db = new connect();
    //     $query ='SELECT products.*, images.path
    //     FROM products
    //     JOIN images ON products.id = images.product_id
    //     LIMIT 3';
    //     $result = $db->pdo_query($query);
    //     return $result;
    // }
}

?>