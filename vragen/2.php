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
					<button type="submit" name="1945-1955" value="row-home" class="vraag-2"><span>1945-1955</span></button>
					<button type="submit" name="1956-1965" value="row-home" class="vraag-2"><span>1956-1965</span></button>
					<button type="submit" name="1966-1975" value="house-2" class="vraag-2"><span>1966-1975</span></button>
					<button type="submit" name="1976-1985<" value="house" class="vraag-2"><span>1976-1985</span></button>
					<button type="submit" name="1986-1995" value="house" class="vraag-2"><span>1986-1995</span></button>
					<button type="submit" name="1996-2005" value="house" class="vraag-2"><span>1996-2005</span></button>
					<button type="submit" name="2006-heden" value="house" class="vraag-2"><span>2006-heden</span></button>
				</div>
			</form>
			<?php


			if(isset($_POST['1945'])){
				save(2,0,0,0,10);
				redirect(3);
			}

			if(isset($_POST['1945-1955'])){
				save(2,0,0,0,10);
				redirect(3);
			}

			if(isset($_POST['1956-1965'])){
				save(2,0,0,0,10);
				redirect(3);
			}

			if(isset($_POST['1966-1975'])){
				save(2,0,0,0,10);
				redirect(3);
			}

			if(isset($_POST['1976-1985'])){
				save(0,0,0,0,0);
				redirect(3);
			}

			if(isset($_POST['1986-1995'])){
				save(0,0,0,0,0);
				redirect(3);
			}

			if(isset($_POST['1996-2005'])){
				save(0,0,0,0,0);
				redirect(3);
			}

			if(isset($_POST['2006-heden'])){
				save(0,0,0,0,0);
				redirect(3);
			}

			print_r($_SESSION);
			
			?>

		</p>
	</div>
<?php
require_once("../includes/footer.php");
?>
