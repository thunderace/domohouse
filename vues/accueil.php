<?php ob_start(); ?>

		<div class="row clearfix">
		
<?php
	$i = 0;
	foreach ($devicesFinal as $device) {
?>

			<div class="column cell">
			
<?php
		$deviceInfo = deviceType($device);
		if ($deviceInfo['format'] == "unknown") {
?>

				<img class="unknown" src="img/notrecognized.png">
				
<?php
		}
		elseif ($deviceInfo['format'] == "scene") { 
?>

				<img class="scene" onclick="document.location.href = 'index.php?page=scene&action=<?php echo $deviceInfo['data'][$liste[$i]['type']]['action'] . "&idx=" . $device['idx']; ?>'" src="img/<?php echo $deviceInfo['data'][$liste[$i]['type']]['etat']; ?>.png">

<?php
		}
		elseif ($deviceInfo['format'] == "group") {
?>

				<img class="group" onclick="document.location.href = 'index.php?page=group&action=<?php echo $deviceInfo['data'][$liste[$i]['type']]['action'] . "&data=" . $device['Status'] . "&idx=" . $device['idx']; ?>'" src="img/<?php echo $deviceInfo['data'][$liste[$i]['type']]['etat']; ?>.png">

<?php
		}
		elseif ($deviceInfo['format'] == "switches") {
?>

				<img class="switches" onclick="document.location.href = 'index.php?page=switch&action=<?php echo $deviceInfo['data']['switch']['action'] . "&data=" . $device['Status'] . "&idx=" . $device['idx']; ?>'" src="img/<?php echo $deviceInfo['data']['switch']['etat']; ?>.png">
				
<?php
		}
		elseif ($deviceInfo['format'] == 'sensors') {
?>

				<div class="sensors <?php echo $deviceInfo['data'][$liste[$i]['type']]['etat']; ?>"><?php echo $deviceInfo['data'][$liste[$i]['type']]['value']; ?></div>

<?php
		}
		$i++;
?>

				<div class="nom"><p><?php echo $device['Name']; ?></p></div>
			</div>
			
<?php
	}
?>

		</div>

<?php $contenu = ob_get_clean() ?>

<?php require 'vues/gabarit.php' ?>