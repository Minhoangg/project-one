<?php
class orders
{


    function viewcart($del)
    {
        $html_viewcart = '';
        $i = 0;
        if ($del == 1) {
            $xspth = '<th>Thao tác</th>';
        } else {
            $xspth = '';
        }
        $html_viewcart .= '
            <thead class="table_head">
            <tr>
            <th class="p-3">STT</th>
            <th>Hình</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            ' . $xspth . '
        </tr>                

    </thead>';
        foreach ($_SESSION['giohang'] as $sp) {
            // extract($sp);
            $tongtien = $sp[3] * $sp[4];
//            $linkdel = "index.php?pg=cart&del=". $i;

            if ($del == 1) {

                $xsptd = '<td><a href="index.php?pages=cart&del=' . $i . '"><input class="btn btn-danger" type ="button" value ="xóa"></a></td>';
            } else {
                $xsptd = '';
            }
            $html_viewcart .= '
       
         <tr>
                        <td class ="p-3">' .$i . '</td>
                        <td><img class="how-itemcart1" src="../../../uploaded/upload/'.$sp[2].'" ></td>
                        <td>' . $sp[0] . '</td>
                        <td>' . $sp[3] . '</td>
                        <td>' . $sp[4] . '</td>
                        <td>' . $tongtien . '</td>
                        ' . $xsptd . '
                      
      </tr>
        ';
            $i++;

        }

        return $html_viewcart;
    }
    //cập nhật order
    public  function  update_order($status,$id){
        $db = new connect();
        $query = "UPDATE orders SET  status =? WHERE id =? ";
        $db->pdo_execute($query,$status,$id);

    }




    function insert_bill($user_id,$ten_nguoi_nhan, $diachi_nguoinhan, $email_nguoinhan, $dienthoai_nguoinhan, $ngaydh, $tongdh, $pttt)
    {   $db = new connect();
       $sql = "INSERT INTO orders(user_id,customer_name, shipping_address, customer_email, customer_phone, updated_at, Total,payment_methods) VALUES (?,?,?,?,?,?,?,?)";
        return $db->pdo_execute_return_lastID($sql,$user_id, $ten_nguoi_nhan, $diachi_nguoinhan, $email_nguoinhan, $dienthoai_nguoinhan, $ngaydh, $tongdh, $pttt);
    }

    function insert_cart($ma_hh, $hinh, $hoten, $don_gia, $so_luong, $total, $idbill)
    {
        $sql = "INSERT INTO gio_hang(ma_hh, hinh, hoten, don_gia, so_luong, total,idbill) VALUES (?,?,?,?,?,?,?)";
        pdo_execute($sql, $ma_hh, $hinh, $hoten, $don_gia, $so_luong, $total, $idbill);
    }

    /**
     *Lấy 1 hàng từ bill theo mà idbill
     */
    function order_select_by_id($id)
    {   $db = new connect();
        $sql = "SELECT * FROM orders WHERE id=?";
        return $db->pdo_query_one($sql, $id);
    }

    function order_select_all()
    {   $db = new connect();
        $sql = "SELECT * FROM orders order by id desc";
        return $db->pdo_query($sql);
    }
    function order_product_select($id_order)
    {   $db = new connect();
        $sql = "SELECT orders_detail.order_id, orders_detail.price,orders_detail.qty,products.product_name,products.product_thumbnail,products.id 
        FROM orders_detail
        JOIN products ON orders_detail.Product_id = products.id 
        WHERE orders_detail.order_id = $id_order";
        return $db->pdo_query($sql);
    }
    public function selectorder($id_order)
    {
        $db = new connect();
        $select = "SELECT products.id,products.product_name,products.product_thumbnail,products.price,
        COUNT(orders_detail.qty) AS 'soluong'
        FROM orders_detail 
        JOIN products ON orders_detail.product_id= products.id
        WHERE orders_detail.order_id = $id_order
        GROUP BY products.id,products.product_name 
        HAVING soluong >0 ORDER BY `soluong` DESC  ";
        $result = $db->pdo_query($select);
        return $result;
    }
    public function tongDonHang($order)
    {
        $tongDonHang = 0;
        foreach ($order as $od) {
            $tongtien = $od['3'] * $od['4'];
            $tongDonHang += $tongtien;
        }

        return $tongDonHang;
    }


}