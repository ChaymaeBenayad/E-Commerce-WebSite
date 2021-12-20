<?php

session_start();
if(isset($_SESSION['email'])){
	header('location:home.php');
}

include'connectdb.php';

if(isset($_POST['login'])){
	 $email = $_POST['email'];
	 $password = $_POST['password'];
	 $pw = md5($password);
	 $erreur     = "";

	 //s'assurer que tous les champs sont bien remplis
	if(empty($email) || empty($password)){
	   $erreur = '<div class="text-danger">Veuillez remplir tous les champs!</div>';
	}
	else{
		if(filter_var($email,FILTER_VALIDATE_EMAIL)){
		  if(strlen($pw)>=6){
				  // Sélection des infos du client à l'aide d'une requête préparée
		  	//voir si l'utilisateur existe dans la bd
				  $req = $db->prepare("SELECT * FROM client WHERE email=? AND mdp=?");
				  $req->execute([$email,$pw]);
				  $count = $req->rowCount();
				  //si $count>0 ça veut dire que a bd contient un record à propos cet utilisateur
				  if($count > 0){
				  	$_SESSION['email'] = $email;
				  	header('location:home.php');
				  	exit();
				  }else{
				 	$erreur = '<div class="text-danger">L\'e-mail ou le mot de passe sont incorrects</div>';
			      }  	  	    
			}else{
				  $erreur = '<div class="text-danger">Mot de passe doit contenir 6 caractères au minimum!</div>';
				 }
		}else{
			  $erreur = '<div class="text-danger">Adresse e-mail incorrecte!</div>';
			 }
        }
}
?>