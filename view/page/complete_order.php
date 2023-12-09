<?php

$od = new  orders();
$id_new = $od->select_order_id_new();

?>
<div class="containerfull">
    <div class="bgbanner"></div>
</div>

<section class="containerfull">
    <div class="container">

        <h2 class="text-success">Cảm Ơn Quý Khách Đã Tin tưởng <br>
        </h2>
        <?php foreach ($id_new  as $id):?>
        <h2 class="text-success">Mã Đơn Hàng của quý Khách Là <?=$id['new_id']?><br>
            <?php endforeach;?>
        </h2>
    </div>
</section>