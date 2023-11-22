<?php
$id = $_GET['id'];
$cta = new caterories();
$cta->caterories_delete($id);
header('location:http://qa.com/admin/index.php?pages=category&action=list');





