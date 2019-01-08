<?php
require_once("../includes/header-onedeep.php");
?>
<body class="questions">
<?php
	require_once("../includes/menu-onedeep.php");
?>
	<div class="container">
		<h2>Mijn huis is gebouwd in</h2>
		<p>
			Toelichting: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dui sem, tristique sit amet ex sit amet, suscipit condimentum eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean sit amet laoreet nisl, sit amet cursus eros. Nulla facilisi. 

			<form method="post" class="question-btns">
				<div style="text-align:center;">
					<button type="submit" name="1945" value="flat" class="vraag-2"><span>Voor 1945</span></button>
					<button type="submit" name="1945-1970" value="row-home" class="vraag-2"><span>1945-1970</span></button>
					<button type="submit" name="1971-1985" value="house-2" class="vraag-2"><span>1971-1985</span></button>
					<button type="submit" name="1986-2000<" value="house" class="vraag-2"><span>1986-2000</span></button>
					<button type="submit" name="2001-heden" value="house" class="vraag-2"><span>2001-heden</span></button>
				</div>
			</form>
			<?php


			if(isset($_POST['1945'])){
				save(2,0,0,0,5);
				redirect(2);
			}

			if(isset($_POST['1945-1970'])){
				save(2,0,0,0,5);
				redirect(2);
			}

			if(isset($_POST['1971-1985'])){
				save(2,0,0,0,5);
				redirect(2);
			}

			if(isset($_POST['1985-2000'])){
				save(0,0,0,0,0);
				redirect(2);
			}

			if(isset($_POST['2000-heden'])){
				save(0,0,0,0,0);
				redirect(2);
			}

			print_r($_SESSION);
			
			?>

		</p>
	</div>
<?php
require_once("../includes/footer.php");
?>
