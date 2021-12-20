<?php

session_start();
if(isset($_SESSION['name'])){
	header('location:adminHome.php');
}

include'connectdb.php';

if(isset($_POST['login'])){
	 $name = $_POST['name'];
	 $password = $_POST['password'];
	 $pw = md5($password);
	 $erreur     = "";

	 //s'assurer que tous les champs sont bien remplis
	if(empty($name) || empty($pw)){
	   $erreur = '<div class="text-danger">Veuillez remplir tous les champs!</div>';
	}
	else{
		  if(strlen($pw)>=6){
				  // Sélection des infos du client à l'aide d'une requête préparée
		  	//voir si l'utilisateur existe dans la bd
				  $req = $db->prepare("SELECT * FROM admin");
				  $req->execute([$name,$password]);
				  $count = $req->rowCount();
				  //si $count>0 ça veut dire que a bd contient un record à propos cet utilisateur
				  if($count > 0){
				  	$_SESSION['name'] = $name;
				  	header('location:adminHome.php');
				  	exit();
				  }else{
				 	$erreur = '<div class="text-danger">L\'e-mail ou le mot de passe sont incorrects</div>';
			      }  	  	    
			}else{
				  $erreur = '<div class="text-danger">Mot de passe doit contenir 6 caractères au minimum!</div>';
				 }
    }
}
?>