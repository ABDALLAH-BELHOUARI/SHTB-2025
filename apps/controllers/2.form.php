<?php

$Jours = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
$Mois = ["", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
$M_Mois = ["", "Jan", "Fév", "Mar", "Avr", "Mai", "Juin", "Juil", "Aoû", "Sep", "Oct", "Nov", "Déc"];

$Statuts = ["", "Superviseur", "Administrateur", "Ustad", "Étudiant", "Externe"];
$Sit_Familiale = ["", "Célibataire", "Divorcé(e)", "Marié(e)", "Veuf(ve)"];

$Cursus = ["", "Sciences Islamiques", "Langue Arabe", "Coran"];
$Cursy = ["", "S.I", "L.A", "CO."];
$Cursus_Mode = ["", "Présentiel", "E-learning", "Combinés"];
$Cursus_Colors = ["", "#8ceb94", "#8cbaeb", "#ebb88c"];
$Cursus_Icons = ["", "gavel", "font_download", "import_contacts"];

$Modes = ["", "Présentiel", "E-learning", "Hybride", "Non défini"];
$Modes_Colors = ["#fff", "#ded1e5", "#ffedc7", "#d3ffe2", "#ff0"];

$Genres = ["", "Femmes", "Hommes", "Mixte"];
$Genres_Colors = ["", "#fed4f6", "#cfedff", "#ffffff"];

$Paiement = ["", "Carte Bancaire", "Chèque", "Espèces", "Caution", "Virement", "Autre", "Exonération"];
$error = [];

$Types = [
	"",
	["Inscriptions", "Inscriptions", 'sub_id'],
	["Modules", "Modules", 'modu_id'],
	["Évènements", "Evenements", 'evt_id']
];

$Types_Vers = ["", "Cotisation", "Prestation", "Donation"];
$Types_Vers_Colors = ["#777", "#64f634", "#ff9b47", "#7edbf0"];

function setFlash($titre, $message, $statut = 'success')
{
	$_SESSION['flash']['titre'] = $titre;
	$_SESSION['flash']['message'] = $message;
	$_SESSION['flash']['statut'] = $statut;
}

function flash()
{
	if (isset($_SESSION['flash'])) {
		extract($_SESSION['flash']);
		unset($_SESSION['flash']);
		return "<div class='slideInDown alert alert-" . $statut . " pointer' onclick='this.style.display=`none`'>
			<h4>" . $titre . "</h4>
			" . $message . "
			</div>";
	}
}

if (!isset($_SESSION['csrf'])) {
	$_SESSION['csrf'] = md5(time() + rand());
}
function csrf()
{
	return 'csrf=' . $_SESSION['csrf'];
}

function checkCsrf()
{
	if (!isset($_GET['csrf']) || $_GET['csrf'] != $_SESSION['csrf']) {
		session_destroy();
		die("Erreur de jeton CSRF");
	}
}

function dateNow()
{
	$objTimeZone = new DateTimeZone("Europe/Madrid");
	$objDateTime = new DateTime();
	$objDateTime->setTimezone($objTimeZone);

	if (!empty($strDateTime)) {
		$fltUnixTime = (is_string($strDateTime)) ? strtotime($strDateTime) : $strDateTime;
		if (method_exists($objDateTime, "setTimestamp")) {
			$objDateTime->setTimestamp($fltUnixTime);
		} else {
			$arrDate = getdate($fltUnixTime);
			$objDateTime->setDate($arrDate["year"], $arrDate["mon"], $arrDate["mday"]);
			$objDateTime->setTime($arrDate["hours"], $arrDate["minutes"], $arrDate["seconds"]);
		}
	}
	return $objDateTime->format("Y-m-d H:i:s");
}

function Convert_Datetime($date, $ajout = true)
{
	if ($date) {
		$dat = explode("-", substr($date, 0, 10));
		$return = $dat[2] . "/" . $dat[1] . "/" . $dat[0];
		if (strlen($date) > 10 && $ajout) {
			$return .= " à " . str_replace(":", "h", substr($date, 11, 5));
		}
		return $return;
	}
	return false;
}
function Date_Complete($ladate, $ajout = true)
{
	$date = substr($ladate, 0, 10);
	$a = $GLOBALS["Jours"][date('w', strtotime($date))];
	$b = date('d', strtotime($date));
	$c = $GLOBALS["Mois"][date('n', strtotime($date))];
	$d = date('Y', strtotime($date));
	$r = ucwords($a . " " . $b . " " . $c . " " . $d);
	if (strlen($ladate) > 10 && $ajout) {
		$heure = substr($ladate, 11);
		$r .= " à " . str_replace(":", "h", substr($heure, 0, 5));
	}
	return $r;
}
function ControlAccess($levels)
{
	if (!in_array($_SESSION['Logged']['level'], $levels)) {
		header("Location:?slug=no_access");
		die();
	}
}
