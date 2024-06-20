<?php
try { 
	$db = new PDO("mysql:host=localhost;dbname=arabalar2", "root", ""); 
} 
	catch ( PDOException $e ){ 
	print $e->getMessage(); 
} 
?> 
<?php

if($_GET["durum"]=="silbasarili")
  {
	echo "Silme İşlemi Başarılı";
}
if($_GET["durum"]=="silbasarisiz")
{
	echo "Silme İşlemi Başarısız";
}

if($_GET["durum"]=="duzenlemebasarili")
{
	echo "Düzenleme İşlemi Başarılı";
}
if($_GET["durum"]=="duzenlemebasarisiz")
{
	echo "Düzenleme İşlemi Başarısız";
}
if($_GET["durum"]=="eklemebasarili")
{
	echo "EKLEME İşlemi Başarılı";
}

$_GET["durum"]="id";
?>
<body>
	<a href="ekleme.php">arac ekleme</a>
</body>

<table border="1">
	<tr>
		<td>Marka</td>
		<td>Model</td>
		<td>donanim</td>
		<td>motor</td>
		<td>yakit</td>
		<td>vites</td>
		<td>fiyat</td>
		<td>web sitesi</td>
		<td>KONTROL</td>
	
	</tr>

<?php
$query = $db->query("SELECT * FROM otomobil_fiyatlari", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
		 print "<tr>";
          print "<td>".$row['marka']."</td>";
          print "<td>".$row['model']."</td>";
          print "<td>".$row['donanim']."</td>";
          print "<td>".$row['motor']."</td>";
          print "<td>".$row['yakit']."</td>";
          print "<td>".$row['vites']."</td>";
          print "<td>".$row['fiyat']."</td>";
		  print "<td>".$row['websitesi']."</td>";
		  ?>
          <td><a href="duzenle.php?id=<?php echo $row['id']; ?>">DÜZENLE</a> | <a href="sil.php?id=<?php echo $row['id']; ?>">SİL</a></td>
		<?php 
		print "</tr>";
     }
}
?>
