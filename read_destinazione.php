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

$destinazioni = DestinazioniQuery::create()
	->find();
?>

<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<!-- Colonna centrale-SX -->
		<div class="col-xs-12 col-sm-9">
			<div class="well">
				<h2 class="text-danger">Elenco Destinazioni</h2>
				<h3 class="text-danger">Dati relativi alla destinazione dello streamer</h3>


				<table class="table table-condensed">

					<thead>
					<tr>
						<th>Nome</th>
						<th>Server Address</th>
						<th>Key Server</th>
						<th>Elimina</th>
					</tr>
					</thead>
					<tbody>

					<?php
					foreach ($destinazioni as $destinazione) {
					?>
				<tr>
					<td><?=$destinazione->getNome()?></td>
					<td><?=$destinazione->getStreamServer()?></td>
					<td><?=$destinazione->getKeyServer()?></td>
					<td><a href="del_destinazione.php?id_destinazione=<?=$destinazione->getIddestinazione()?>" class="btn btn-danger">Elimina</a></td>

				</tr>
					<?php
					}
					?>

				</table>

					<br>

			</div>
		</div>
	</div>
</div>

