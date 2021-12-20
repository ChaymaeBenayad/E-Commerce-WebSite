	<?php
		  	session_start();
		  	if(isset($_SESSION['email'])){ 
                 header("location:pdf.php");
		  		}
		  		else{ ?>
		       <?php include'functionsUser.php'; ?>
               <?php include'header.php'; ?>
	           <?php include'menu.php' ?>			
		  <div class="section3">
		  <div class="valid">
		  	<?php include'traitement.php'; ?> 
            <div class="register">
		  	<h1>INSCRIPTION</h1>
			<form method="POST" action="#">
			   <?php if(isset($error)): echo $error; endif; ?><br>
			  <input type="text" name="lastname" placeholder="Nom" 
			  value="<?php if(isset($lastName)): echo $lastName; endif;?>" class="form-control"><br>
			  <input type="text" name="firstname" placeholder="Prénom" value="<?php if(isset($firstName)): 
			      echo $firstName; endif;?>" ><br>		
			  <input type="text" name="mail" placeholder="Adresse e-mail" value="<?php if(isset($email)):
			      echo $email; endif;?>"><br>
			  <input type="password" name="password" placeholder="Mot de passe"><br>
			  <input type="password" name="confirmpw" placeholder="Confirmer le mot de passe"><br>	     
			 <center><button type="submit" name="submit">S'INSCRIRE</button></center>
			</form>
           </div>
		  	<?php include'process.php'; ?>
		  	<div class="login">
		  	<h1>CONNEXION</h1>
			<form method="POST" action="#">
			   <?php if(isset($erreur)): echo $erreur; endif; ?><br>	
			   <p>E-mail</p>
			  <input type="text" name="email" placeholder="Votre Adresse E-mail"><br>
			    <p>Mot de Passe</p>  
			  <input type="password" name="password" placeholder="Votre Mot de Passe"><br>     
			 <center><button type="submit" name="login">SE CONNECTER</button></center>
			</form>
		  </div>
         </div>
         </div>	
		    <?php  } ?>
		

    <?php include'footer.php' ?>
</body>
</html>