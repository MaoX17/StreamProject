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
$titolo_pagina = $cfg->getValue('titolo_applicazione');
$fmpeg_command = $cfg->getValue('ffmpeg_command');
$folder_dest_video = $cfg->getValue('folder_dest_video');

$videos = VideosQuery::create()
	->find();


?>

<div class="container">
	<div class="row row-offcanvas row-offcanvas-right">
		<!-- Colonna centrale-SX -->
		<div class="col-xs-12 col-sm-9">
			<div class="well">
				<h2 class="text-danger">Inserimento Video</h2>
				<h3 class="text-danger">Inserimento dati relativi al video</h3>


				<table class="table table-condensed">

					<thead>
					<tr>
						<th>Nome</th>
<!--						<th>Link di accesso</th> -->
						<th>Dimensione (opz.)</th>
						<th>Convertito</th>
					</tr>
					</thead>
					<tbody>

					<?php
					foreach ($videos as $video) {


					?>
				<tr>
					<td><?=$video->getNome()?></td>
<!--					<td><?=$video->getLinkVideo()?></td> -->
					<td><?=number_format(($video->getSizeVideo() / 1024), 2, ',', '.')." KB";?></td>
					<td>

						<?php
						if ($video->getConvertito()=='s') {
							echo '<span class="glyphicon glyphicon-ok"></span>';
						}
						elseif ($video->getConvertito()=='n') {
							echo '<span class="glyphicon glyphicon-remove"><a class="btn-xs btn-danger" href="converti_video.php?id_video='.$video->getIdvideo().'">Converti</a> </span>';
						}
						elseif ($video->getConvertito()=='t') {
							echo '<span class="glyphicon glyphicon-refresh">';
							$content = @file_get_contents($folder_dest_video.'/out.txt');

							if($content){
								//get duration of source
								preg_match("/Duration: (.*?), start:/", $content, $matches);

								$rawDuration = $matches[1];

								//rawDuration is in 00:00:00.00 format. This converts it to seconds.
								$ar = array_reverse(explode(":", $rawDuration));
								$duration = floatval($ar[0]);
								if (!empty($ar[1])) $duration += intval($ar[1]) * 60;
								if (!empty($ar[2])) $duration += intval($ar[2]) * 60 * 60;

								//get the time in the file that is already encoded
								preg_match_all("/time=(.*?) bitrate/", $content, $matches);

								$rawTime = array_pop($matches);

								//this is needed if there is more than one match
								if (is_array($rawTime)){$rawTime = array_pop($rawTime);}

								//rawTime is in 00:00:00.00 format. This converts it to seconds.
								$ar = array_reverse(explode(":", $rawTime));
								$time = floatval($ar[0]);
								if (!empty($ar[1])) $time += intval($ar[1]) * 60;
								if (!empty($ar[2])) $time += intval($ar[2]) * 60 * 60;

								//calculate the progress
								$progress = round(($time/$duration) * 100);

								//echo " Duration: " . $duration . "<br>";
								//echo " Current Time: " . $time . "<br>";
								echo '<a href="ins_video.php" class="btn-xs btn-success">Progress: ' . $progress . '%</a>';

								//se raggiungo il 100% aggiorno il db
								if ($progress == 100) {
									$video->setConvertito('s');
									$video->setLinkVideo($video->getLinkVideo().'.flv');
									$video->save();
								}

							}

							echo '</span>';
						}
						?>
					</td>

					<td>
						<a href="del_video.php?id_video=<?=$video->getIdvideo()?>" class="btn btn-danger">Elimina</a>
					</td>
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

