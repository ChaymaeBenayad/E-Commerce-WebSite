<?php include'process2.php'; ?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>S'inscrire</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>	
  <div class="login_box">
  	<img src="images/user.png" class="user" />
  			<h1>CONNEXION</h1>
			<form method="POST" action="connexionform.php">
			   <?php if(isset($erreur)): echo $erreur; endif; ?><br>	
			   <p>E-mail</p>
		<input type="text" name="email" placeholder="Votre Adresse E-mail" value="<?php if(isset($email)):echo $email; endif;?>"><br>
			    <p>Mot de Passe</p>  
			  <input type="password" name="password" placeholder="Votre Mot de Passe"><br>     
			 <center><button type="submit" name="login">SE CONNECTER</button></center>
			</form>
      </div>

</body>
</html>
