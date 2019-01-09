<?php
require_once("../includes/header-onedeep.php");
?>
<body class="questions">
<?php
	require_once("../includes/menu-onedeep.php");
?>
<?php
	if($_SESSION['flat'] == true){
		save(6,0,0,0,0);
		redirect(7);
	}
?>
	<div class="container">
		<h2>Is de gevel van uw huis al geisoleerd?</h2>
		<p>
			Toelichting: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dui sem, tristique sit amet ex sit amet, suscipit condimentum eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean sit amet laoreet nisl, sit amet cursus eros. Nulla facilisi. 

			<form method="post" class="question-btns">
				<div style="text-align:center;">
					<button type="submit" name="Ja" value="flat"><img src="../images/Yes.png"/><br><span>Ja</span></button>
					<button type="submit" name="Nee" value="row-home"><img src="../images/No.png"/><br><span>Nee</span></button>
				</div>
			</form>
			<?php
			if(isset($_POST['Ja'])){
				$_SESSION['gevel_isolatie'] = true;
				save(6,0,0,0,0);
				redirect(7);
			}

			if(isset($_POST['Nee'])){
				$_SESSION['gevel_isolatie'] = false;
				save(6,20,0,0,0);
				redirect(7);
			}
			?>

		</p>
	</div>
<?php
require_once("../includes/footer.php");
?>
