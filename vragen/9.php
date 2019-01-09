<?php
require_once("../includes/header-onedeep.php");
?>
<body class="questions">
<?php
	require_once("../includes/menu-onedeep.php");
?>
	<div class="container">
		<h2>Word uw woning snel koud?</h2>
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
				save(9,5,5,10,0);
				redirect(10);
			}

			if(isset($_POST['Nee'])){
				save(9,0,0,0,0);
				redirect(10);
			}
			?>

		</p>
	</div>
<?php
require_once("../includes/footer.php");
?>
