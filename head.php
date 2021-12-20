
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Catamaran&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="adminHome.css">
  <script src="https://kit.fontawesome.com/fe54135c6b.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    <img class="logo" src="images/logo.png">
    <div>
      <ul class="navig">
	  <?php
		if(isset($_SESSION['name'])){ ?>
		  <li>Bonjour, <?php echo $_SESSION['name']?></li>
		  <li><a href='deconnect.php'><i class='fas fa-user'></i>&nbsp;Se déconnecter</a></li>
	  <?php	}else{ ?>
		  <li><a href='connexion.php'><i class='fas fa-user'></i>&nbsp;Se connecter</a></li>
		    <?php  } ?>
	  </ul>
	</div>
  </header>

