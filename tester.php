   
   <?php 
    session_start();
    include'head.php';
    ?>
    <div class="leftside">
      <h3>Gestion</h3>
      <ul>
      	<li><a href="adminHome.php?accueil"><i class="fa fa-home" aria-hidden="true"></i>
        &nbsp;&nbsp;Accueil</a></li>
        <li><a href="home.php"><i class="fa fa-globe" aria-hidden="true"></i>
        &nbsp;&nbsp;Mon Site E-commerce</a></li>
      	<li><a href="adminHome.php?categories"><i class="fa fa-plus" aria-hidden="true"></i>
        &nbsp;&nbsp;Catégories</a></li>
        <li><a href="adminHome.php?voirCategories"><i class="fa fa-th-large" aria-hidden="true"></i>
        &nbsp;&nbsp;Voir toutes les catégories</a></li>
      	<li><a href="adminHome.php?sousCategories"><i class="fa fa-plus" aria-hidden="true">
        &nbsp;&nbsp;</i>Sous-Catégories</a></li>
        <li><a href="adminHome.php?voirSousCategories"><i class="fa fa-th-large" aria-hidden="true"></i>
        &nbsp;&nbsp;Voir toutes les sous-catégories</a></li>
      	<li><a href="adminHome.php?produits"><i class="fa fa-plus" aria-hidden="true"></i>
        &nbsp;&nbsp;Nouveau produit</a></li>
      	<li><a href="adminHome.php?voirProduits"><i class="fa fa-th-large" aria-hidden="true"></i>
        &nbsp;&nbsp;Voir tous les produits</a></li>
      </ul>
    </div>
    
     <?php
      if (isset($_GET['accueil'])) {
        include'accueil.php';} 
      if (isset($_GET['categories'])) {
        include'categories.php';}
      if (isset($_GET['voirCategories'])) {
        include'voirCategories.php';}?>
    <?php if (!isset($_GET['accueil'])) {
          if (!isset($_GET['categories'])) {
          if (!isset($_GET['voirCategories'])) { ?>
    <div class="rightside">
    <?php 
       if(isset($_GET['modifierCategorie'])){
          include'modifierCategorie.php';}
       if(isset($_GET['supprimerCategorie'])){
          include'supprimerCategorie.php';} ?>
    </div>
    <?php } } } ?>
	</body>
	</html>





