
<?php include'procedure.php'; ?> 
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
	   <form method="POST" action="connexion.php">
		 <?php if(isset($erreur)): echo $erreur; endif; ?><br>	
			 <p>Nom Complet</p>
			 <input type="text" name="name" placeholder="Votre Nom Complet"value="<?php if(isset($name)):echo $name; endif;?>"><br>
			 <p>Mot de Passe</p>  
			 <input type="password" name="password" placeholder="Votre Mot de Passe"><br>     
			 <center><button type="submit" name="login">SE CONNECTER</button></center>
			</form>
      </div>
</body>
</html>


