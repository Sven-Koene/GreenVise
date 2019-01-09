<?php
require_once("../includes/header-onedeep.php");
?>
<body class="questions">
<?php
	require_once("../includes/menu-onedeep.php");
?>
	<div class="container">
		<h2>Uit hoeveel personen bestaat uw huishouden></h2>
		<p>
			Toelichting: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dui sem, tristique sit amet ex sit amet, suscipit condimentum eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean sit amet laoreet nisl, sit amet cursus eros. Nulla facilisi. 

			<form method="post" class="question-btns">
				<div style="text-align:center;">
					<button type="submit" name="1" value="flat" class="vraag-2"><span> 1 </span></button>
					<button type="submit" name="2" value="row-home" class="vraag-2"><span> 2 </span></button>
					<button type="submit" name="3" value="row-home" class="vraag-2"><span> 3 </span></button>
					<button type="submit" name="4" value="house-2" class="vraag-2"><span> 4 </span></button>
					<button type="submit" name="5" value="house-2" class="vraag-2"><span> >5</span></button>
				</div>
			</form>
			<?php


			if(isset($_POST['1'])){
				save(8,0,0,0,5);
				redirect(9);
			}

			if(isset($_POST['2'])){
				save(8,2.5,2.5,0,5);
				redirect(9);
			}

			if(isset($_POST['3'])){
				save(8,5,5,0,5);
				redirect(9);
			}
			
			if(isset($_POST['4'])){
				save(8,10,10,0,5);
				redirect(9);
			}
			if(isset($_POST['5'])){
				save(8,15,15,0,5);
				redirect(9);
			}
			?>

		</p>
	</div>
<?php
require_once("../includes/footer.php");
?>
