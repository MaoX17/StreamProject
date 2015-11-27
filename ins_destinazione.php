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

include($percorso_relativo."grafica/head_bootstrap.php");
include($percorso_relativo."grafica/body_head_bootstrap.php");

include($percorso_relativo."read_destinazione.php");

?>

<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<!-- Colonna centrale-SX -->
		<div class="col-xs-12 col-sm-9">
			<div class="well">
				<h2 class="text-danger">Inserimento Destinazioni</h2>
				<h3 class="text-danger">Inserire i dati relativi alla destinazione dello streamer</h3>

				<form role="form" name='frmDest' id='frmDest' action="ins_destinazione2.php" method="post" enctype="multipart/form-data">

					<div class="form-group">
						<label for="server_address">Nome che identifica la destinazione</label>
						<input type="text" class="form-control" name="nome" id="nome" required placeholder="Example: youtube-canale-1">
					</div>
					<div class="form-group">
						<label for="server_address">URL Server Stream</label>
						<input type="url" class="form-control" name="server_address" id="server_address" required placeholder="Example: rtmp://a.rtmp.youtube.com/live2">
					</div>
					<div class="form-group">
						<label for="key_server">KEY Server Stream</label>
						<input type="text" class="form-control" name="key_server" id="key_server" required placeholder="Example: pippo.pluto-12332">
					</div>
					<div class="form-group">
						<label for="params">Optional Parameters</label>
						<input type="text" class="form-control" name="params" id="params">
					</div>


					<br>
					<button type="submit" class="btn btn-default">Salva</button>

				</form>


			</div>
		</div>
	</div>
</div>

<?
include($percorso_relativo."grafica/body_foot_bootstrap.php");
?>
