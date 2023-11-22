<?php
$id = $_GET['id'];
$cta = new caterories();
$cta->caterories_delete($id);
header('location:index.php?pages=category&action=list');





