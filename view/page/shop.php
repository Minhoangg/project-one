<?php
$category_id = (!isset($_GET['category_id'])) ? 0 : $_GET['category_id'];
$cata = new caterories();
$pd = new products();
$dsdm = $cata->caterories_select_all_desc();
$dssp = $pd->get_dssp($category_id, 8);
$html_dssp = $pd->showproduct($dssp);
$html_dsdm = $cata->showcate($dsdm);


?>
<!-- Product -->z
<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <?= $html_dsdm ?>
            </div>
        </div>
        <div class="row isotope-grid">
            <!-- Block2 -->
            <?= $html_dssp ?>
        </div>
        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
            </a>
        </div>
    </div>
</div>