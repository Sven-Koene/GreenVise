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

function berekenUitkomst(){

	if($_SESSION['flat'] == true){
		$uitkomst = [];
		$hoeveeluitkomsten = 0;
		if($_SESSION['vloer_isolatie'] == true){
			$_SESSION['vloer'] = -1000;
		}

		if($_SESSION['spouw_isolatie'] == true){
			$_SESSION['spouw'] = -1000;
		}

		if($_SESSION['dak_isolatie'] == true){
			$_SESSION['dak'] = -1000;
		}

		if(($_SESSION['dak_isolatie'] == true) && ($_SESSION['spouw_isolatie'] == true) && ($_SESSION['vloer_isolatie'] == true)){
			$hoeveeluitkomsten = 0;
		}
		elseif(($_SESSION['dak_isolatie'] == false) && ($_SESSION['spouw_isolatie'] == false) && ($_SESSION['vloer_isolatie'] == true)){
			$hoeveeluitkomsten = 2;
			if($_SESSION['dak'] > $_SESSION['spouw']){
				array_push($uitkomst, "dak");
				array_push($uitkomst, "spouw");
			}else{
				array_push($uitkomst, "spouw");
				array_push($uitkomst, "dak");
			}
		}
		elseif(($_SESSION['dak_isolatie'] == false) && ($_SESSION['spouw_isolatie'] == true) && ($_SESSION['vloer_isolatie'] == false)){
			$hoeveeluitkomsten = 2;
			if($_SESSION['dak'] > $_SESSION['vloer']){
				array_push($uitkomst, "dak");
				array_push($uitkomst, "vloer");
			}else{
				array_push($uitkomst, "vloer");
				array_push($uitkomst, "dak");
			}
		}
		elseif(($_SESSION['dak_isolatie'] == true) && ($_SESSION['spouw_isolatie'] == false) && ($_SESSION['vloer_isolatie'] == false)){
			$hoeveeluitkomsten = 2;
			if($_SESSION['vloer'] > $_SESSION['spouw']){
				array_push($uitkomst, "vloer");
				array_push($uitkomst, "spouw");
			}else{
				array_push($uitkomst, "spouw");
				array_push($uitkomst, "vloer");
			}
		}
		elseif($_SESSION['spouw_isolatie'] == false){
			$hoeveeluitkomsten = 1;
			array_push($uitkomst, "spouw");
		}
		elseif($_SESSION['dak_isolatie'] == false){
			$hoeveeluitkomsten = 1;
			array_push($uitkomst, "dak");
		}
		elseif($_SESSION['vloer_isolatie'] == false){
			$hoeveeluitkomsten = 1;
			array_push($uitkomst, "vloer");
		}
	} 

	else{
		$uitkomst = [];
		$hoeveeluitkomsten = 0;
		
		if($_SESSION['vloer_isolatie'] == false){
			$_SESSION['vloer'] = -1000;
		}

		if($_SESSION['spouw_isolatie'] == false){
			$_SESSION['spouw'] = -1000;
		}

		if($_SESSION['dak_isolatie'] == false){
			$_SESSION['dak'] = -1000;
		}

		if($_SESSION['gevel_isolatie'] == false){
			$_SESSION['gevel'] = -1000;
		}

		if(($_SESSION['dak_isolatie'] == true) && ($_SESSION['spouw_isolatie'] == true) && ($_SESSION['vloer_isolatie'] == true)  && ($_SESSION['gevel_isolatie'] == true)){
			$hoeveeluitkomsten = 0;
		}
		elseif(($_SESSION['dak_isolatie'] == false) && ($_SESSION['spouw_isolatie'] == false) && ($_SESSION['vloer_isolatie'] == false)  && ($_SESSION['gevel_isolatie'] == true)){
			$hoeveeluitkomsten = 3;
			if(($_SESSION['spouw'] >= $_SESSION['vloer']) && ($_SESSION['spouw'] >= $_SESSION['dak'])){
				array_push($uitkomst, "spouw");
				if($_SESSION['vloer'] >= $_SESSION['dak']){
					array_push($uitkomst, "vloer");
					array_push($uitkomst, "dak");
				}
				else{
					array_push($uitkomst, "dak");
					array_push($uitkomst, "vloer");
				}
			}
			elseif(($_SESSION['dak'] >= $_SESSION['vloer']) && ($_SESSION['dak'] >= $_SESSION['spouw'])){
				array_push($uitkomst, "dak");
				if($_SESSION['vloer'] >= $_SESSION['spouw']){
					array_push($uitkomst, "vloer");
					array_push($uitkomst, "spouw");
				}
				else{
					array_push($uitkomst, "spouw");
					array_push($uitkomst, "vloer");
				}
			}
			elseif(($_SESSION['vloer'] >= $_SESSION['dak']) && ($_SESSION['vloer'] >= $_SESSION['spouw'])){
				array_push($uitkomst, "vloer");
				if($_SESSION['dak'] >= $_SESSION['spouw']){
					array_push($uitkomst, "dak");
					array_push($uitkomst, "spouw");
				}
				else{
					array_push($uitkomst, "spouw");
					array_push($uitkomst, "dak");
				}
			}

		}
		elseif(($_SESSION['dak_isolatie'] == false) && ($_SESSION['spouw_isolatie'] == false) && ($_SESSION['vloer_isolatie'] == true)  && ($_SESSION['gevel_isolatie'] == false)){
			$hoeveeluitkomsten = 3;
			if(($_SESSION['spouw'] >= $_SESSION['gevel']) && ($_SESSION['spouw'] >= $_SESSION['dak'])){
				array_push($uitkomst, "spouw");
				if($_SESSION['gevel'] >= $_SESSION['dak']){
					array_push($uitkomst, "gevel");
				}
				else{
					array_push($uitkomst, "dak");
				}
			}
			elseif(($_SESSION['dak'] >= $_SESSION['gevel']) && ($_SESSION['dak'] >= $_SESSION['spouw'])){
				array_push($uitkomst, "dak");
				if($_SESSION['gevel'] >= $_SESSION['spouw']){
					array_push($uitkomst, "gevel");
					array_push($uitkomst, "spouw");
				}
				else{
					array_push($uitkomst, "spouw");
					array_push($uitkomst, "gevel");
				}
			}
			elseif(($_SESSION['gevel'] >= $_SESSION['dak']) && ($_SESSION['gevel'] >= $_SESSION['spouw'])){
				array_push($uitkomst, "gevel");
				if($_SESSION['dak'] >= $_SESSION['spouw']){
					array_push($uitkomst, "dak");
					array_push($uitkomst, "spouw");
				}
				else{
					array_push($uitkomst, "spouw");
					array_push($uitkomst, "dak");
				}
			}
		}
		elseif(($_SESSION['dak_isolatie'] == false) && ($_SESSION['spouw_isolatie'] == true) && ($_SESSION['vloer_isolatie'] == false)  && ($_SESSION['gevel_isolatie'] == false)){
			$hoeveeluitkomsten = 3;
			if(($_SESSION['vloer'] >= $_SESSION['gevel']) && ($_SESSION['vloer'] >= $_SESSION['dak'])){
				array_push($uitkomst, "vloer");
				if($_SESSION['gevel'] >= $_SESSION['dak']){
					array_push($uitkomst, "gevel");
				}
				else{
					array_push($uitkomst, "dak");
				}
			}
			elseif(($_SESSION['dak'] >= $_SESSION['vloer']) && ($_SESSION['dak'] >= $_SESSION['gevel'])){
				array_push($uitkomst, "dak");
				if($_SESSION['vloer'] >= $_SESSION['gevel']){
					array_push($uitkomst, "vloer");
					array_push($uitkomst, "gevel");
				}
				else{
					array_push($uitkomst, "gevel");
					array_push($uitkomst, "vloer");
				}
			}
			elseif(($_SESSION['vloer'] >= $_SESSION['dak']) && ($_SESSION['vloer'] >= $_SESSION['gevel'])){
				array_push($uitkomst, "vloer");
				if($_SESSION['dak'] >= $_SESSION['gevel']){
					array_push($uitkomst, "dak");
					array_push($uitkomst, "gevel");
				}
				else{
					array_push($uitkomst, "gevel");
					array_push($uitkomst, "dak");
				}
			}

		}
		elseif(($_SESSION['dak_isolatie'] == true) && ($_SESSION['spouw_isolatie'] == false) && ($_SESSION['vloer_isolatie'] == false)  && ($_SESSION['gevel_isolatie'] == false)){
			$hoeveeluitkomsten = 3;
			if(($_SESSION['spouw'] >= $_SESSION['gevel']) && ($_SESSION['spouw'] >= $_SESSION['vloer'])){
				array_push($uitkomst, "spouw");
				if($_SESSION['gevel'] >= $_SESSION['vloer']){
					array_push($uitkomst, "gevel");
				}
				else{
					array_push($uitkomst, "vloer");
				}
			}
			elseif(($_SESSION['gevel'] >= $_SESSION['vloer']) && ($_SESSION['gevel'] >= $_SESSION['spouw'])){
					array_push($uitkomst, "gevel");
					if($_SESSION['vloer'] >= $_SESSION['spouw']){
						array_push($uitkomst, "vloer");
						array_push($uitkomst, "spouw");
					}
					else{
						array_push($uitkomst, "spouw");
						array_push($uitkomst, "vloer");
					}
				}
				elseif(($_SESSION['vloer'] >= $_SESSION['gevel']) && ($_SESSION['vloer'] >= $_SESSION['spouw'])){
					array_push($uitkomst, "vloer");
					if($_SESSION['gevel'] >= $_SESSION['spouw']){
						array_push($uitkomst, "gevel");
						array_push($uitkomst, "spouw");
					}
					else{
						array_push($uitkomst, "spouw");
						array_push($uitkomst, "gevel");
					}
				}
		}
		//
		elseif(($_SESSION['dak_isolatie'] == false) && ($_SESSION['spouw_isolatie'] == false)){
			$hoeveeluitkomsten = 2;
			if($_SESSION['spouw'] >= $_SESSION['dak']){
				array_push($uitkomst, "spouw");
				array_push($uitkomst, "dak");
			}
			else{
				array_push($uitkomst, "dak");
				array_push($uitkomst, "spouw");

			}
		}
		elseif(($_SESSION['gevel_isolatie'] == false) && ($_SESSION['spouw_isolatie'] == false)){
			$hoeveeluitkomsten = 2;
			if($_SESSION['spouw'] >= $_SESSION['gevel']){
				array_push($uitkomst, "spouw");
				array_push($uitkomst, "gevel");
			}
			else{
				array_push($uitkomst, "gevel");
				array_push($uitkomst, "spouw");

			}
		}
		elseif(($_SESSION['vloer_isolatie'] == false) && ($_SESSION['spouw_isolatie'] == false)){
			$hoeveeluitkomsten = 2;
			if($_SESSION['spouw'] >= $_SESSION['vloer']){
				array_push($uitkomst, "spouw");
				array_push($uitkomst, "vloer");
			}
			else{
				array_push($uitkomst, "vloer");
				array_push($uitkomst, "spouw");

			}
		}
		elseif(($_SESSION['dak_isolatie'] == false) && ($_SESSION['gevel_isolatie'] == false)){
			$hoeveeluitkomsten = 2;
			if($_SESSION['dak'] >= $_SESSION['gevel']){
				array_push($uitkomst, "dak");
				array_push($uitkomst, "gevel");
			}
			else{
				array_push($uitkomst, "gevel");
				array_push($uitkomst, "dak");

			}
		}
		elseif(($_SESSION['dak_isolatie'] == false) && ($_SESSION['vloer_isolatie'] == false)){
			$hoeveeluitkomsten = 2;
			if($_SESSION['dak'] >= $_SESSION['vloer']){
				array_push($uitkomst, "dak");
				array_push($uitkomst, "vloer");
			}
			else{
				array_push($uitkomst, "vloer");
				array_push($uitkomst, "dak");

			}
		}
		elseif(($_SESSION['gevel_isolatie'] == false) && ($_SESSION['vloer_isolatie'] == false)){
			$hoeveeluitkomsten = 2;
			if($_SESSION['gevel'] >= $_SESSION['vloer']){
				array_push($uitkomst, "gevel");
				array_push($uitkomst, "vloer");
			}
			else{
				array_push($uitkomst, "vloer");
				array_push($uitkomst, "gevel");

			}
		}
		elseif($_SESSION['gevel_isolatie'] == false){
			$hoeveeluitkomsten = 1;
			array_push($uitkomst, "gevel");
		}
		elseif($_SESSION['spouw_isolatie'] == false){
			$hoeveeluitkomsten = 1;
			array_push($uitkomst, "spouw");
		}
		elseif($_SESSION['dak_isolatie'] == false){
			$hoeveeluitkomsten = 1;
			array_push($uitkomst, "dak");
		}
		elseif($_SESSION['vloer_isolatie'] == false){
			$hoeveeluitkomsten = 1;
			array_push($uitkomst, "vloer");
		}

	}
		
	$_SESSION['result']['answers'] = $uitkomst;
	$_SESSION['result']['hoeveelheid'] = $hoeveeluitkomsten;
}