<?php
require_once("../includes/header-onedeep.php");
?>
<body class="questions">
<?php
	require_once("../includes/menu-onedeep.php");
?>
	<div class="container">
		<h2>Ik woon in een</h2>
		<p>
			Toelichting: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dui sem, tristique sit amet ex sit amet, suscipit condimentum eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean sit amet laoreet nisl, sit amet cursus eros. Nulla facilisi. 

			<form method="post" class="question-btns">
				<div style="text-align:center;">
					<button type="submit" name="flat" value="flat"><img src="../images/flat.png"/><br><span>Flat</span></button>
					<button type="submit" name="row-home" value="row-home"><img src="../images/rijtjeshouse.png"/><br><span>Rijtjeshuis</span></button>
					<button type="submit" name="2-home" value="house-2"><img src="../images/2-homes.png"/><br><span>Twee-onder-een-kap huis</span></button>
					<button type="submit" name="home" value="house"><img src="../images/home.png"/><br><span>Vrijstaand</span></button>
				</div>
			</form>
			<?php
			$_SESSION['vraag'] = 0;
			$_SESSION['gevel'] = 0;
			$_SESSION['dak'] = 0;
			$_SESSION['spouw'] = 0;
			$_SESSION['vloer'] = 0;

			$_SESSION['flat'] = false;


			if(isset($_POST['flat'])){
				$_SESSION['flat'] = true;
				save(1,-15,5,10,10);
				redirect(2);
			}

			if(isset($_POST['row-home'])){
				save(1,5,5,10,10);
				redirect(2);
			}

			if(isset($_POST['2-home'])){
				save(1,5,5,10,10);
				redirect(2);
			}

			if(isset($_POST['home'])){
				save(1,10,10,10,10);
				redirect(2);
			}
			
			?>

		</p>
	</div>
<?php
require_once("../includes/footer.php");
?>
