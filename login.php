<?php
require_once("includes/header.php");
?>
<body class="login_page">
<?php
	require_once("includes/menu.php");
?>

<div class="container">
	<h2>Login</h2>
	<form method="post">
	  <div class="form-group">
	    <label for="name" class="label-white">Emailadres: *</label>
	    <input type="text" name="username" placeholder="Vul hier uw emailadres in" id="name"  class="form-control">
	  </div>
	  <div class="form-group">
	    <label for="wachtwoord">Wachtwoord: *</label>
	    <input type="password" name="password" placeholder="Vul hier uw wachtwoord in"  id="wachtwoord"  class="form-control">
	  </div>
	  <input type="submit" value="Login" name="submit" class="btn btn-primary">
	</form>
	<?php

if(isset($_POST['submit'])){
		require_once('DBConnection.php');
		
		$Username = $_POST['username'];
		$Password = $_POST['password'];

		//Upercase to lowercase (For samsung)
		$Username = mb_strtolower($Username,'UTF-8');

		//Alle SQL injecties worden hier tegen gehouden
		$Username = mysqli_real_escape_string($db, $Username);
		$Password = mysqli_real_escape_string($db, $Password);

		//Alle scripts eruit filteren
		$Username = htmlentities($Username);
		$Password = htmlentities($Password);

		//Query maken en ophalen
		$query = "SELECT usersId, email, wachtwoord, naam FROM users";
		$queryresult = mysqli_query($db, $query);
		
		//Uitlezen en controleren.
		$Result;

		$succesvolleInlog = false;
		//password_verify($Password, $Result['Password'])
		while ($Result = mysqli_fetch_assoc($queryresult)) {
			if (($Result['email'] === $Username) && (password_verify($Password, $Result['wachtwoord']))){
				    				
				//Invullen Session variabelen
				$_SESSION['login']['ID'] = $Result['usersId'];
				$_SESSION['login']['naam'] = $Result['naam'];
				$_SESSION['login']['email'] = $Result['email'];

				$succesvolleInlog = true;

				header("Location: account/index.php");
				echo "gelukt";
			
			}
		}
		if($succesvolleInlog == false)	{
			echo "<div class=\"alert alert-danger\" role=\"alert\">Uw emailadres of wachtwoord is onjuist! Probeer het opnieuw.</div>";
		}

	}
	?>
</div>
<?php
require_once("includes/footer.php");
?>