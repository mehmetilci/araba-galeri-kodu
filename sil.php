<?php
try { 
	$db = new PDO("mysql:host=localhost;dbname=arabalar2", "root", ""); 
} 
	catch ( PDOException $e ){ 
	print $e->getMessage(); 
} 
?> 
<?PHP
$query = $db->prepare("DELETE FROM otomobil_fiyatlari WHERE id = :id");
$delete = $query->execute(array(
   'id' => $_GET['id'] 
));
if($delete)
{
	header("Location: index.php?durum=silbasarili");
}
else
{
	header("Location: index.php?durum=silbasarisiz");
}
?>
