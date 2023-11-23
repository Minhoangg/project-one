<?

$id = $_GET['id'];
$delete = new Products();

$delete->delete($id);
header('location: http://du-an-1/admin/index.php?pages=product&action=list');
?>