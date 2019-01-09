<?php
require_once("../includes/header-onedeep.php");
?>
<body class="questions">
<?php
	require_once("../includes/menu-onedeep.php");
?>
	<div class="container">
		<h2>Uit hoeveel woonlagen bestaat uw huis></h2>
		<p>
			Toelichting: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dui sem, tristique sit amet ex sit amet, suscipit condimentum eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean sit amet laoreet nisl, sit amet cursus eros. Nulla facilisi. 

			<form method="post" class="question-btns">
				<div style="text-align:center;">
					<button type="submit" name="1" value="flat" class="vraag-2"><span>1 woonlaag</span></button>
					<button type="submit" name="2" value="row-home" class="vraag-2"><span>2 woonlagen</span></button>
					<button type="submit" name="3" value="row-home" class="vraag-2"><span>3 woonlagen</span></button>
					<button type="submit" name="4" value="house-2" class="vraag-2"><span>4 of meer woonlagen</span></button>
				</div>
			</form>
			<?php


			if(isset($_POST['1'])){
				save(7,5,5,5,0);
				redirect(8);
			}

			if(isset($_POST['2'])){
				save(7,10,5,5,0);
				redirect(8);
			}

			if(isset($_POST['3'])){
				save(7,15,0,0,0);
				redirect(8);
			}
			
			if(isset($_POST['4'])){
				save(7,15,0,0,0);
				redirect(8);
			}
			?>

		</p>
	</div>
<?php
require_once("../includes/footer.php");
?>
