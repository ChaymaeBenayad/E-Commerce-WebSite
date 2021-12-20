<?php
  include'connectdb.php';
  if (isset($_POST['submit'])) {
    $lastName  = $_POST['lastname'];
	$firstName = $_POST['firstname'];
	$email     = $_POST['mail'];
	$password1 = $_POST['password'];
	$password2 = $_POST['confirmpw'];
	$error     = "";	
		//s'assurer que les champs sont bien remplis
	if(empty($lastName) || empty($firstName) || empty($email) 
	   || empty($password1) || empty($password2)){
	  $error = '<div class="text-danger">Veuillez remplir tous les champs!</div>';}
	else{
	  if(preg_match("/^[a-zA-Z]+$/", $lastName)){
	   if(preg_match("/^[a-zA-Z]+$/", $firstName)){
		if(filter_var($email,FILTER_VALIDATE_EMAIL)){
		 if(strlen($password1)>=6 && strlen($password2)>=6){
		  if($password1 == $password2){
		    $checkEmail = $db->prepare("SELECT email FROM client WHERE email=?");
			$checkEmail->execute([$email]);
			if($checkEmail->rowCount()>0){
				$error = '<div class="text-danger">Désolé, cet e-mail est déjà utilisé.
				          Veuillez essayer avec une autre adresse e-mail!</div>';}
		    else{// Insertion des infos du client à l'aide d'une requête préparée
              $req = $db->prepare("INSERT INTO client(nom,prenom,email,mdp) VALUES (?,?,?,?)");
			  $mdp = md5($password1);//crypter le mot de passe avant de le stocker dans la base de données pour la sécurité
			  $req->execute([$lastName,$firstName,$email,$mdp]);
			  header('location:connexionform.php');	
			  exit();}
		   }else{
			  $error = '<div class="text-danger">Les deux mots de passe
			              ne correspondent pas!</div>';	}
	      }else{
			$error = '<div class="text-danger">Mot de passe doit contenir
			            6 caractères au minimum!</div>';}
		}else{
		    $error = '<div class="text-danger">Adresse e-mail incorrecte!</div>';}
	   }else{
		   $error = '<div class="text-danger">Le prénom doit être
		               une chaîne de caractères!</div>';}	
	  }else{
		 $error = '<div class="text-danger">Le nom doit être une chaîne de caractères!</div>';}
    }
} ?>
