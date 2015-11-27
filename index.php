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
$folder_dest = $cfg->getValue('folder_dest_video');
$link_folder_video = $cfg->getValue('link_folder_video');
$fmpeg_command = $cfg->getValue('ffmpeg_command');

include($percorso_relativo."grafica/head_bootstrap.php");
include($percorso_relativo."grafica/body_head_bootstrap.php");

?>

<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <!-- Colonna centrale-SX -->
        <div class="col-xs-12 col-sm-9">

            <div class="jumbotron">

				<h2>Stream Project</h2>
				<p class="small">Benvenuto in Stream Project </p>
			</div>

			<div class="col-xs-6 col-sm-4">
				<b class="text-center">
					Operazioni Possibili:
				</b>
			</div>
				<div class="col-xs-6 col-sm-4 ">
					<a href="ins_destinazione.php" class="btn btn-success" role="button">Nuova Destinazione</a><br><br>
					<a href="ins_video.php" class="btn btn-success" role="button">Nuovo video</a><br><br>
					<a href="ins_cron.php" class="btn btn-success" role="button">Nuova Pianificazione</a><br><br>
				</div>


		</div><!-- Colonna centrale-SX -->
	</div><!--/row-->
</div><!--/.container-->


<?
include($percorso_relativo."grafica/body_foot_bootstrap.php");
?>
