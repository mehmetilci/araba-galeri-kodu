<?php
try { 
	$db = new PDO("mysql:host=localhost;dbname=arabalar2", "root", ""); 
} 
	catch ( PDOException $e ){ 
	print $e->getMessage(); 
}
if(isset($_POST["ekleme"]))
{
	$query = $db->prepare("INSERT INTO otomobil_fiyatlari SET
	marka = :marka,
	model = :model,
	donanim = :donanim,
	motor = :motor,
	yakit = :yakit,
	vites = :vites,
	fiyat = :fiyat
	");
	$update = $query->execute(array(
		 "marka" => $_POST["marka"],
		 "model" => $_POST["model"],
		 "donanim" => $_POST["donanim"],
		 "motor" => $_POST["motor"],
		 "yakit" => $_POST["yakit"],  
		 "vites" => $_POST["vites"],
		 "fiyat" => $_POST["fiyat"],
		
	));
	if ( $update ){
		 header("Location: index.php?durum=eklemebasarili");
	}
}



?> 
<html>
<head>
<title>ekleme</title>
</head>
<body>
<form action="ekleme.php" method="POST">
<label>Marka</label><br>
<input type="text" name="marka" value=""><br>
<label>Model</label><br>
<input type="text" name="model" value=""><br>
<label>Donanım</label><br>
<textarea name="donanim" rows="5"></textarea><br>
<label>Motor</label><br>
<input type="text" name="motor" value=""><br>
<label>Yakıt</label><br>
<select name="yakit">
	<option value=""></option>
	<option value="Benzin">Benzin</option>
	<option value="Dizel">Dizel</option>
	<option value="Hibrit">Hibrit</option>
</select><br>
<label>Vites</label><br>
<input type="text" name="vites" value=""><br>
<label>Fiyat</label><br>
<input type="text" name="fiyat" value=""><br>
<input type="submit" name="ekleme" value="EKLEMEYİ Kaydet">
</form>
</body>
</html>