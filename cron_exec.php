<?php
/**
 * Created by Maurizio Proietti
 * User: maurizio.proietti@gmail.com
 */
?>

<?php
$percorso_relativo = "/var/www/html/stream-project/";
require ($percorso_relativo."include.inc.php");
// setup the autoloading
require_once ($percorso_relativo.'vendor/autoload.php');
//require_once 'vendor/autoload.php';
// setup Propel
require_once ($percorso_relativo.'propel/config.php');

require_once ('class/ConfigSingleton.php');
$cfg = SingletonConfiguration::getInstance ();

//$user_db = $cfg->getValue('UserDB');
$titolo_pagina = $cfg->getValue('titolo_applicazione');
$folder_dest = $cfg->getValue('folder_dest_video');
$link_folder_video = $cfg->getValue('link_folder_video');
$fmpeg_command = $cfg->getValue('ffmpeg_command');

//var_dump($_POST);

$oggi = new DateTime();
var_dump($oggi);

$pianificazioni = CronsQuery::create()
	->filterByNextDate($oggi->format('Y-m-d'))
	->filterByNextTime(array('min' => $oggi->modify('-15 minutes')->format('H:i') , 'max' => $oggi->modify('+15 minutes')->format('H:i')))
	->filterByInviato('n')
	->find();

foreach ($pianificazioni as $pianificazione) {

	var_dump($pianificazione);
//	echo "<br>";
//	echo "<br>";
//	echo "<br>";
	echo "Eseguo: ".$pianificazione->getComando();

	//exec($pianificazione->getComando().' 2>&1', $output);
	exec($pianificazione->getComando().' 2>&1');
	$pianificazione->setInviato('s');
	$pianificazione->save();

}

