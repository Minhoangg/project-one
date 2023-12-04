<?php
class caterories{

    function caterories_insert($name)
    {
        $db = new connect();
        $query = "INSERT INTO caterories(name) VALUES(?)";
        $db->pdo_execute($query,$name);
    }
    /**
     * Cập nhật tên loại
     */
    function caterories_update($name,$id)
    {   $db = new connect();
        $query = "UPDATE caterories SET name=? WHERE id=?";
        $db->pdo_execute($query, $name, $id);
    }


    /**
     * Xóa loại
     *
     */
    function caterories_delete($id)
    {   $db = new connect();
        $query = "DELETE FROM caterories WHERE id=?";
        if (is_array($id)) {
            foreach ($id as $ma) {
                $db->pdo_execute($query, $ma);
            }
        } else {
            $db->pdo_execute($query, $id);
        }
    }
    /**
     * Truy vấn tất cả các loại
     * @return array mảng loại truy vấn được
     * @throws PDOException lỗi truy vấn
     */
    function caterories_select_all()
    {   $db = new connect();
        $sql = "SELECT * FROM caterories";
        return $db->pdo_query($sql);
    }
    function caterories_select_all_desc()
    {   $db = new connect();
        $sql = "SELECT * FROM caterories order by id desc";
        return $db->pdo_query($sql);
    }
    /**
     * Truy vấn một loại theo mã

     */
    function caterories_select_by_id($id)
    {   $db = new connect();
        $sql = "SELECT * FROM caterories WHERE id=?";
        return $db->pdo_query_one($sql, $id);
    }
    /**
     * Kiểm tra sự tồn tại của một loại
     */
    function loai_exist($ma_loai)
    {
        $sql = "SELECT count(*) FROM loai WHERE ma_loai=?";
        return pdo_query_value($sql, $ma_loai) > 0;
    }

    function showcate($dsdm)
    {
        $html_dm = '<a href="index.php?pages=shop"><button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Tất cả sản phẩm
                </button></a>';
        foreach ($dsdm as $dm) {
            extract($dm);
            $link = 'index.php?pages=shop&category_id='. $id;
            $html_dm .= '<a class="mr-4" href = "'. $link . '">' . $name . '</a>';
        }
        return $html_dm;
    }

}

?>