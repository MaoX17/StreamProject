<?php
/**
 * Created by Maurizio Proietti
 * User: maurizio.proietti@gmail.com
 */
?>
	<!--
	/**
	 * Created by Maurizio Proietti
	 * User: maurizio.proietti@gmail.com
	 */
	-->

<?php

$percorso_relativo = "./";
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
$fmpeg_command = $cfg->getValue('ffmpeg_command');
$folder_dest_video = $cfg->getValue('folder_dest_video');

$idVideo = $_GET['id_video'];
$video = VideosQuery::create()
	->findPk($idVideo);

//in conversione
$video->setConvertito('t');
$video->save();

///usr/bin/ffmpeg -i PM\ Tarulli\ Rev\ 02.mp4 -vcodec libx264 -preset medium -maxrate 3000k -bufsize 6000k -vf "scale=1280:-1,format=yuv420p" -g 50 -acodec libmp3lame -b:a 128k -ac 2 -ar 44100 PM_Tarulli_Rev_02.mp4.flv
$comando = $fmpeg_command.' -y -i "'.$video->getLinkVideo().'" -vcodec libx264 -preset medium -maxrate 3000k -bufsize 6000k -vf "scale=1280:-1,format=yuv420p" -g 50 -acodec libmp3lame -b:a 128k -ac 2 -ar 44100 "'.$video->getLinkVideo().'.flv"';
//echo $comando;
//echo "<br>";
$comando2 = escapeshellcmd( $comando );
//echo $comando2;
//echo "<br>";
//set_time_limit( 0 );
//exec($comando2.' 2>&1', $output);
//exec($comando2.' 2>&1');
exec($comando2.' 1> '.$folder_dest_video.'/out.txt 2>&1 &');
//wait_until_termination ("ffmpeg", 10);
header('Location: ins_video.php');
?>