<?php
/**
 * Created by Maurizio Proietti
 * maurizio.proietti@gmail.com
 * http://blog.maurizio.proietti.name
 */

$percorso_relativo = "./";
include ($percorso_relativo."include.inc.php");

/*
 * Config e chiamo DB *******************************
 */
require_once ('class/ConfigSingleton.php');
$cfg = SingletonConfiguration::getInstance ();

$user_db = $cfg->getValue('UserDB');
$pass_db = $cfg->getValue('PassDB');
$host_db = $cfg->getValue('HostDB');
$name_db = $cfg->getValue('NameDB');

$group_admin = $cfg->getValue('group_admin');
$group_user = $cfg->getValue('group_user');

$db = connetti_db($host_db, $user_db, $pass_db, $name_db);
//********************************************************


$sql = "SELECT * FROM users
						WHERE
						username='".$_POST['username']."' AND
						password = '".$_POST['password']."';";

$rs = $db->query($sql);
$row = $rs->fetch_assoc();

$idLogin = $row['id'];
$group = $row['group'];
//Admin
if ($group == $group_admin){
	$_SESSION['rule']="ADMIN";
	$_SESSION['idLogin'] = $idLogin;
	$_SESSION['email'] = $row['email'];
	$_SESSION['name'] = "Admin";
		header('Location: ./admin_index.php');
}
//Poweruser
elseif ($group == "powerusers") {
	$_SESSION['rule'] = "POWERUSER";
	$_SESSION['idLogin'] = $idLogin;
	$_SESSION['email'] = $row['email'];
	$_SESSION['name'] = $row['name'];
	header('Location: ./poweruser_index.php');

}
//User
elseif ($group == $group_user) {
	$_SESSION['rule'] = "USER";
	$_SESSION['idLogin'] = $idLogin;
	$_SESSION['email'] = $row['email'];
	$_SESSION['name'] = $row['name'];
	header('Location: ./user_index.php');

}
else {
	$titolo_pagina = "S.I.O.S. - Accademia Britannica, Perugia IT292";

	include($percorso_relativo."grafica/head_bootstrap.php");
	include($percorso_relativo."grafica/body_head_bootstrap.php");

	?>
	<div class="container">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9"> <!-- Colonna centrale-SX -->
				<h3><?=$titolo_pagina?></h3>
				<div class="panel-danger">
				<strong>Errore: si prega di controllare i dati di accesso forniti dal centro esami, <br>
					se l’errore persiste contattare l’amministratore: <a href="mailto:admin@accademia-britannica.net">admin@accademia-britannica.net</a></strong> <br><br>
					<a href="login.php" class="btn btn-success" role="button">Torna al Login </a><br>
					<br><br>
				</div>
			</div><!-- /Colonna centrale-SX -->
		</div><!--/row-->
	</div><!--/.container-->

<?
}
?>


<?
include($percorso_relativo."grafica/body_foot_bootstrap.php");
?>