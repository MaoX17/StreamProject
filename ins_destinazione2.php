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


$destinazione = DestinazioniQuery::create()
	->filterByStreamServer(($_POST['server_address']))
	->filterByKeyServer($_POST['key_server'])
	->filterByNome($_POST['nome'])
	->findOneOrCreate();
$destinazione->setParametri($_POST['params']);
$destinazione->save();

?>

<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<!-- Colonna centrale-SX -->
		<div class="col-xs-12 col-sm-9">
			<div class="well">
				<h2 class="text-danger">Inserimento Destinazioni</h2>
				<h3 class="text-danger">Inserimento dati relativi alla destinazione dello streamer</h3>


				<table class="table table-condensed">

					<thead>
					<tr>
						<th>Nome</th>
						<th>Server Address</th>
						<th>Key Server</th>
						<th>Parametri</th>
					</tr>
					</thead>
					<tbody>

				<tr>
					<td><?=$destinazione->getNome()?></td>
					<td><?=$destinazione->getStreamServer()?></td>
					<td><?=$destinazione->getKeyServer()?></td>
					<td><?=$destinazione->getParametri()?></td>

				</tr>

				</table>

					<br>
				<a href="ins_destinazione.php" class="btn btn-success">Nuovo inserimento</a>

			</div>
		</div>
	</div>
</div>

<?
include($percorso_relativo."grafica/body_foot_bootstrap.php");
?>




<script type="text/javascript">

	$("#prv_dt_pagamento").datetimepicker({
		format: "yyyy-mm-dd",
		autoclose: true,
		pickerPosition: "bottom-left",
		language: "it",
		minView: 2
	});



</script>
