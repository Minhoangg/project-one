<?

$id = $_GET['id'];
$delete = new Products();

$delete->delete($id);
header('location: index.php?pages=product&action=list');
?>