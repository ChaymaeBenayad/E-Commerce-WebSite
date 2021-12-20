
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Catamaran&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://kit.fontawesome.com/fe54135c6b.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    <img class="logo" src="images/logo.png">
    <div class="search-box">
    <form method="GET" action="rechercher.php" enctype="multipart/form-data">
     <input class="search-text" type="text" name="search_query" placeholder="Rechercher...">
     <button class="search-btn" name="search"><i class="fas fa-search"></i></button>
    </form>
    </div>
    <div>
	  <ul class="navig">
	  	<?php if(isset($_SESSION['email'])){ ?>
		  <li><i class='fas fa-user'></i>&nbsp;<?php echo $_SESSION['email']?></li>
		  <li><a href='panier.php'><i class='fas fa-shopping-cart'></i>&nbsp;Mon panier</a></li>
		  <li><a href='deconnexion.php'><i class='fas fa-user'></i>&nbsp;Se déconnecter</a></li>
		<?php }else{ ?>
		  <li><a href='inscriptionform.php'><i class='fas fa-pencil-alt'></i>&nbsp;S'inscrire</a></li>
		  <li><a href='connexionform.php'><i class='fas fa-user'></i>&nbsp;Se connecter</a></li>
		  <li><a href='panier.php'><i class='fas fa-shopping-cart'></i>&nbsp;Mon panier</a></li>
		<?php  } ?>
	   </ul>
	</div>
  </header>

  
