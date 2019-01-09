<?php
require_once("includes/header.php");
?>
<body class="register_page">
<?php
	require_once("includes/menu.php");
?>

<div class="container">
	<h2>Registratie pagina</h2>
	<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dui sem, tristique sit amet ex sit amet, suscipit condimentum eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean sit amet laoreet nisl, sit amet cursus eros. Nulla facilisi. Nam varius quam eu dapibus tristique. Nullam sit amet efficitur metus, eget rhoncus urna. Sed aliquet, magna vel vestibulum porttitor, mi erat ultrices metus, sit amet tincidunt libero erat non purus. Nullam eu justo vehicula, pretium justo ut, molestie sem. Nunc iaculis turpis nisi, fermentum finibus purus finibus et. Pellentesque eget dignissim mauris, at scelerisque nunc. Nulla sed posuere sapien. Sed quis facilisis mauris. Pellentesque ipsum libero, imperdiet non nisi ac, scelerisque faucibus nulla. Duis at mi non libero placerat ornare.
	</p>
	<form method="post">
	  <div class="form-group">
	    <label for="name" class="label-white">Naam: *</label>
	    <input type="text" name="naam" placeholder="Vul hier uw naam in" id="name"  class="form-control">
	  </div>
	  <div class="form-group">
	    <label for="postcode">Postcode: *</label>
	    <input type="text" name="postcode" placeholder="Vul hier uw postcode in"  id="postcode"  class="form-control">
	  </div>
	  <div class="form-group">
	    <label for="nummer">Huisnummer: *</label>
	    <input type="number" name="huisnummer" placeholder="Vul hier uw huisnummer in"   id="nummer"  class="form-control">
	  </div>
	  <div class="form-group">
	    <label for="toevoeging">Toevoeging:</label>
	    <input type="text" name="huisnummertoevoeging" placeholder="Vul hier uw toevoeging in" id="toevoeging"  class="form-control">
	  </div>
	  <div class="form-group">
	    <label for="plaatsnaam">Plaatsnaam: *</label>
	    <input type="text" name="plaatsnaam" placeholder="Vul hier uw plaatsnaam in" id="plaatsnaam"  class="form-control">
	  </div>
	  <div class="form-group">
	    <label for="email">Email: *</label>
	    <input type="email" name="email" placeholder="Vul hier uw emailadres in" id="email"  class="form-control">
	  </div>
	  <div class="form-group">
	    <label for="wachtwoord1">Wachtwoord: *</label>
	    <input type="password" name="password" placeholder="Vul hier uw wachtwoord in" id="wachtwoord1"  class="form-control">
	  </div>
	  <div class="form-group">
	    <label for="wachtwoord2">Herhaal het wachtwoord: *</label>
	    <input type="password" name="secondpassword" placeholder="Vul hier nogmaals uw wachtwoord in" id="wachtwoord2"  class="form-control">
	  </div>
	  <input type="submit" value="Registreer" name="submit" class="btn btn-primary">
	</form>
<?php
if(isset($_POST['submit'])){
	require_once('DBConnection.php');
	$save = true;
	$error = [];
	// Beveilig tegen XSS
	$naam = htmlentities($_POST['naam']);
	$postcode = htmlentities($_POST['postcode']);
	$huisnummer = htmlentities($_POST['huisnummer']);
	$toevoeging = htmlentities($_POST['huisnummertoevoeging']);
	$plaatsnaam = htmlentities($_POST['plaatsnaam']);
	$email = htmlentities($_POST['email']);
	$wachtwoord1 = htmlentities($_POST['password']);
	$wachtwoord2 = htmlentities($_POST['secondpassword']);
	
	// Beveilig tegen SQL injectie
	$naam = mysqli_real_escape_string($db,$naam);
	$postcode = mysqli_real_escape_string($db,$postcode);
	$huisnummer = mysqli_real_escape_string($db,$huisnummer);
	$toevoeging = mysqli_real_escape_string($db,$toevoeging);
	$plaatsnaam = mysqli_real_escape_string($db,$plaatsnaam);
	$email = mysqli_real_escape_string($db,$email);
	$wachtwoord1 = mysqli_real_escape_string($db,$wachtwoord1);
	$wachtwoord2 = mysqli_real_escape_string($db,$wachtwoord2);

	if(!($wachtwoord1 === $wachtwoord2)){
		array_push($error, "Je wachtwoorden komen niet overeen!");
		$save = false;
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		array_push($error, "Je email heeft niet het formaat van example@example.nl"); 
  		$save = false;
	}

	if(empty($naam)){
		array_push($error, "Je naam is een verplicht veld"); 
		$save = false;
	}

	if(empty($postcode)){
		array_push($error, "Je postcode is een verplicht veld"); 
		$save = false;
	}

	if(empty($huisnummer)){
		array_push($error, "Je huisnummer is een verplicht veld");
		$save = false; 
	}

	if(empty($plaatsnaam)){
		array_push($error, "Je plaatsnaam is een verplicht veld");
		$save = false; 
	}

	if(strlen($postcode)<=5){
		array_push($error, "Je postcode is te kort");
		$save = false;
	}

	if(strlen($postcode)>=8){
		array_push($error, "Je postcode is te lang");
		$save = false;
	}

	if(strlen($wachtwoord1)<=6){
		array_push($error, "Je wachtwoord is te kort. Je moet minimaal 7 tekens gebruiken");
		$save = false;
	}

	
	if($save == true){
		$wachtwoord1 = password_hash($wachtwoord2, PASSWORD_DEFAULT);
		$query = "INSERT INTO `users` (`usersId`, `email`, `wachtwoord`, `postcode`, `huisnummer`, `toevoeging_huisnummer`, `plaatsnaam`, `naam`) VALUES (NULL, '$email', '$wachtwoord1', '$postcode', '$huisnummer', '$toevoeging', '$plaatsnaam', '$naam')";
		mysqli_query($db, $query);
	}

	if($save == false){
		foreach($error as $fault){
			?>
				<div class="alert alert-danger" role="alert">
				 <?=$fault;?>
				</div>
			<?php
		}
	}

	if($save == true){
		?>
		<div class="alert alert-success" role="alert">
  			Je registratie is succesvol voltooid!
		</div>
		<?php
	}
}
?>
</div>
<?php
require_once("includes/footer.php");
?>