
<?php include'traitement.php'; ?> 
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
   <h1>INSCRIPTION</h1>
   <form method="POST" action="inscriptionform.php">
	<?php if(isset($error)): echo $error; endif; ?><br>
	<input class="form-control" type="text" name="lastname" placeholder="Nom" 
	   value="<?php if(isset($lastName)): echo $lastName; endif;?>" ><br>
    <input type="text" name="firstname" placeholder="Prénom" 
       value="<?php if(isset($firstName)): echo $firstName; endif;?>" ><br>		
	<input type="text" name="mail" placeholder="Adresse e-mail" 
	   value="<?php if(isset($email)):echo $email; endif;?>"><br>
	<input type="password" name="password" placeholder="Mot de passe"><br>
    <input type="password" name="confirmpw" placeholder="Confirmer le mot de passe"><br>	     
	<center><button type="submit" name="submit">S'INSCRIRE</button></center>
  </form>
 </div>
</body>
</html>

