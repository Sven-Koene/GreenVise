<!DOCTYPE html>
<html>
<head>
	<title>Registreer je voor onze dienst - GreenVise</title>
</head>
<body>
	<form method="post">
		<input type="text" name="naam" placeholder="Vul hier uw naam in">
		<input type="text" name="postcode" placeholder="Vul hier uw postcode in">
		<input type="number" name="huisnummer" placeholder="Vul hier uw huisnummer in">
		<input type="text" name="huisnummertoevoeging" placeholder="Vul hier uw toevoeging in">
		<input type="text" name="plaatsnaam" placeholder="Vul hier uw plaatsnaam in">
		<input type="email" name="email" placeholder="Vul hier uw emailadres in">
		<input type="password" name="password" placeholder="Vul hier uw wachtwoord in">
		<input type="password" name="secondpassword" placeholder="Vul hier nogmaals uw wachtwoord in">
		<input type="submit" value="Registreer" name="submit">
	</form>

</body>
</html>
<?php
if(isset($_POST['submit'])){
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

	if($wachtwoord1 === $wachtwoord2){
		$error = push("Je wachtwoorden komen niet overeen!");
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		$error = push("Je email heeft niet het formaat van example@example.nl"); 
	}

	if(empty($naam)){
		$error = push("Je naam is een verplicht veld"); 
	}

	if(empty($postcode)){
		$error = push("Je postcode is een verplicht veld"); 
	}

	if(empty($huisnummer)){
		$error = push("Je huisnummer is een verplicht veld"); 
	}

	if(empty($plaatsnaam)){
		$error = push("Je plaatsnaam is een verplicht veld"); 
	}

	if(strlen($postcode)<=5){
		$error = push("Je postcode is te kort");
	}

	if(strlen($postcode)>=8){
		$error = push("Je postcode is te lang");
	}

	if(strlen($password1)<=6){
		$error = push("Je wachtwoord is te kort. Je moet minimaal 7 tekens gebruiken");
	}

	$query = INSERT INTO `login` ( `Name`, `Password`, `Organisation`, `Street`, `Postcode`, `Place`, `Country`, `Email`, `Phone`, `Rank`) VALUES ('$name', '$PasswordAdd', '$OrganisationAdd', '$StreetAdd', '$PostcodeAdd', '$PlaceAdd', '$CountryAdd', '$EmailAdd', '$PhoneNumberAdd', '$RankAdd')
}
?>