<?php
session_start();

require("src/connection.php");
 
	if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])){
 
		// VARIABLE
 
		$pseudo       = $_POST['pseudo'];
		$email        = $_POST['email'];
		$password     = $_POST['password'];
		$pass_confirm = $_POST['password_confirm'];
 
		// TEST SI PASSWORD = PASSWORD CONFIRM
 
		if($password != $pass_confirm){
				header('Location: inscription.php?error=1&pass=1');
					exit();
 
		}
 
		// TEST SI EMAIL UTILISE
		$req = $db->prepare("SELECT count(*) as numberEmail FROM users WHERE email = ?");
		$req->execute(array($email));
 
		while($email_verification = $req->fetch()){
			if($email_verification['numberEmail'] != 0) {
				header('location: inscription.php?error=1&email=1');
				exit();
 			}
		}
 
		// HASH
 		$secret = sha1($email).time();
		$secret = sha1($secret).time().time();
 
		// CRYPTAGE DU PASSWORD
 		$password = "aq1".sha1($password."1254")."25";
 
		// ENVOI DE LA REQUETE
 		$req = $db->prepare("INSERT INTO users(pseudo, email, password, secret) VALUES(?,?,?,?)");
		$value = $req->execute(array($pseudo, $email, $password, $secret));
			
		header('location: inscription.php?success=1');

		exit();
 
 	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ExecPlacement</title>
	<link rel="icon" type="image/png" href="/logo.png">
	<link rel="stylesheet" type="text/css" href="design/default.css">
	<link rel="icon" type="image/pngn" href="img/logosolo.svg">
	<link rel="shortcut icon" href="assets/logosolo.svg" >
</head>
 
<body>
	<header>
		<h1>Inscription</h1>
	</header>

	<div class="container">

		<?php
		if(!isset($_SESSION['connect'])){ ?>

		<p id="info">Bienvenue sur ExecPlacement, pour en voir plus, inscrivez-vous. Sinon, <a href="connection.php">Connectez-vous.</a></p>

		<?php
		 
			if(isset($_GET['error'])){
		 
				if(isset($_GET['pass'])){
					echo '<p id="error">Les mots de passe ne correspondent pas.</p>';
				}
				else if(isset($_GET['email'])){
					echo '<p id="error">Cette adresse email est déjà utilisée.</p>';
				}
			}
			else if(isset($_GET['success'])){
				echo '<p id="success">Inscription prise correctement en compte.</p>';
			}
		 
		?>
	 
	 	<div id="form">
			<form method="POST" action="inscription.php">
				<table>
					<tr class="spaceUnder">
						<td>Pseudo</td>
						<td><input type="text" name="pseudo" placeholder="Ex : Jissé Andrés Taillemah" required></td>
					</tr>
					<tr class="spaceUnder">
						<td>Email</td>
						<td><input type="email" name="email" placeholder="Ex : example@google.com" required></td>
					</tr>
					<tr class="spaceUnder">
						<td>Mot de passe</td>
						<td><input type="password" name="password" placeholder="Ex : ********" required ></td>
					</tr>
					<tr class="spaceUnder">
						<td>Retaper mot de passe</td>
						<td><input type="password" name="password_confirm" placeholder="Ex : ********" required></td>
					</tr>
				</table>
				<div id="button">
					<button type='submit'>Inscription</button>
				</div>
			</form>
		</div>

		<?php } else { ?>
		
		<p class="spaceUnder" id="info">
			Bonjour <?= $_SESSION['pseudo'] ?><br><br>
			<a id="deco" class="spaceUnder" href="disconnection.php">Déconnexion</a>
		</p>

		<?php } ?>

	</div>

	

  <script src="js/app.js"></script>
</body>
</html>