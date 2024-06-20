<?php
try { 
	$db = new PDO("mysql:host=localhost;dbname=arabalar2", "root", ""); 
} 
	catch ( PDOException $e ){ 
	print $e->getMessage(); 
}
    if(isset($_POST["duzenle"]))
{
	$query = $db->prepare("UPDATE otomobil_fiyatlari SET
	marka = :marka,
	model = :model,
	donanim = :donanim,
	motor = :motor,
	yakit = :yakit,
	vites = :vites,
	fiyat = :fiyat
	WHERE id = :id");
	$update = $query->execute(array(    
		 "marka" => $_POST["marka"],
		 "model" => $_POST["model"],
		 "donanim" => $_POST["donanim"],
		 "motor" => $_POST["motor"],
		 "yakit" => $_POST["yakit"],
		 "vites" => $_POST["vites"],
		 "fiyat" => $_POST["fiyat"],
		 "id" => $_GET["id"]
	));
	if ( $update ){
		 header("Location: index.php?durum=duzenlemebasarili");
	}
}

$id = $_GET['id']; 
$query = $db->query("SELECT * FROM otomobil_fiyatlari WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);


?> 
<html>
<head>
<title>Düzenle</title>
</head>
<body>
<form action="duzenle.php?id=<?php echo $_GET["id"]; ?>" method="POST">
<label>Marka</label><br>
<input type="text" name="marka" value="<?php echo $query["marka"]; ?>"><br>
<label>Model</label><br>
<input type="text" name="model" value="<?php echo $query["model"]; ?>"><br>
<label>Donanım</label><br>c 
<textarea name="donanim" rows="5"><?php echo $query["donanim"]; ?></textarea><br>
<label>Motor</label><br>
<input type="text" name="motor" value="<?php echo $query["motor"]; ?>"><br>
<label>Yakıt</label><br>
<select name="yakit">
	<option value="<?php echo $query["yakit"]; ?>"><?php echo $query["yakit"]; ?></option>
	<option value="Benzin">Benzin</option>
	<option value="Dizel">Dizel</option>
	<option value="Hibrit">Hibrit</option>
</select><br>
<label>Vites</label><br>
<input type="text" name="vites" value="<?php echo $query["vites"]; ?>"><br>
<label>Fiyat</label><br> 
<input type="text" name="fiyat" value="<?php echo $query["fiyat"]; ?>"><br>
<input type="submit" name="duzenle" value="Düzenlemeyi Kaydet">
</form>
</body>
</html>