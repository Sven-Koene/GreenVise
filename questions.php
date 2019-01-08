<?php
require_once("includes/header.php");
?>
<body class="questions">
<?php
	require_once("includes/menu.php");
?>
	<div class="container">
		<h2>Vraag 1</h2>
		<p>
			Toelichting: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dui sem, tristique sit amet ex sit amet, suscipit condimentum eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean sit amet laoreet nisl, sit amet cursus eros. Nulla facilisi. 
			<form method="post" class="question-btns">
				<div style="text-align:center;">
					<button type="submit" name="house" value="house"><i class="fas fa-home"></i></button>
					<button type="submit" name="flat" value="flat"><i class="fas fa-building"></i></button>
				</div>
			</form>
			<?php
			if(isset($_POST['test'])){
				echo "bestaat";
			}
			
			?>

		</p>
	</div>
<?php
require_once("includes/footer.php");
?>