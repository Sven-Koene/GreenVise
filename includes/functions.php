<?php
function redirect($vraagnr){
	header("Location: /greenvise/vragen/".$vraagnr.".php");
}

function save($vraag, $gevel, $dak, $vloer, $spouw){
	$_SESSION['vraag'] = $vraag;
	$_SESSION['gevel'] += $gevel;
	$_SESSION['dak'] += $dak;
	$_SESSION['spouw'] += $spouw;
	$_SESSION['vloer'] += $vloer;
}