<?php
$host 		= "localhost";
$dbname 	= "u150759037_2026";
$root 		= "root";
$password 	= "";

try {
	$db = new PDO(
		"mysql:host=$host;dbname=$dbname;charset=utf8",
		"$root",
		"$password",
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
	);
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$db->exec("SET CHARACTER SET utf8");
	$keysession = "5b1f77decd4452ce539ebd405826c4cc61c32858";
} catch (Exception $e) {
?>
	<div style="text-align: center; margin-top: 100px; font-size: 15pt; color: #f00; font-family: 'Arial';">
		Désolé ! Erreur de connexion.<br>
		La base des données est inaccessible.
	</div>
<?php
	die();
}
?>