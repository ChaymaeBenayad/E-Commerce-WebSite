<?php

  function materielInfo(){
	include'connectdb.php';
     $fetch_cat = $db->prepare("SELECT * FROM categorie WHERE IdCat='9'");
	 $fetch_cat->setFetchMode(PDO::FETCH_ASSOC);
     $fetch_cat->execute();

     $result=$fetch_cat->fetch();
      echo  "<a href='afficherCategorie.php?cat_id=".$result['IdCat']."'>".$result['nom_categorie']."&nbsp;
         	&nbsp;<i class='fas fa-sort-down'></i></a>";
}
 function vetements(){
	include'connectdb.php';
     $fetch_cat = $db->prepare("SELECT * FROM categorie WHERE IdCat='10'");
	 $fetch_cat->setFetchMode(PDO::FETCH_ASSOC);
     $fetch_cat->execute();

     $result=$fetch_cat->fetch();
     echo  "<a href='afficherCategorie.php?cat_id=".$result['IdCat']."'>".$result['nom_categorie']."&nbsp;
         	&nbsp;<i class='fas fa-sort-down'></i></a>";
}
 function romans(){
	include'connectdb.php';
     $fetch_cat = $db->prepare("SELECT * FROM categorie WHERE IdCat='11'");
	 $fetch_cat->setFetchMode(PDO::FETCH_ASSOC);
     $fetch_cat->execute();

     $result=$fetch_cat->fetch();
    echo"<a href='afficherCategorie.php?cat_id=".$result['IdCat']."'>".$result['nom_categorie']."&nbsp;
         	&nbsp;<i class='fas fa-sort-down'></i></a>";
}

function sous_cat_materielInfo(){
 	include'connectdb.php';
      $fetch_subcat = $db->prepare("SELECT * FROM sous_categorie WHERE IdCat='9'");
	  $fetch_subcat->setFetchMode(PDO::FETCH_ASSOC);
	  $fetch_subcat->execute();
      while ($result=$fetch_subcat->fetch()):
      echo  "<li><a href='afficherSousCategorie.php?subcat_id=".$result['IdScat']."'>
                 ".$result['nom_scategorie']."</a></li>";
      endwhile;
}
function sous_cat_vetements(){
 	include'connectdb.php';
      $fetch_subcat = $db->prepare("SELECT * FROM sous_categorie WHERE IdCat='10'");
	  $fetch_subcat->setFetchMode(PDO::FETCH_ASSOC);
	  $fetch_subcat->execute();
      while ($result=$fetch_subcat->fetch()):
      echo  "<li><a href='afficherSousCategorie.php?subcat_id=".$result['IdScat']."'>
             ".$result['nom_scategorie']."</a></li>";
      endwhile;
}
function sous_cat_romans(){
 	include'connectdb.php';
      $fetch_subcat = $db->prepare("SELECT * FROM sous_categorie WHERE IdCat='11'");
	  $fetch_subcat->setFetchMode(PDO::FETCH_ASSOC);
	  $fetch_subcat->execute();
      while ($result=$fetch_subcat->fetch()):
      echo  "<li><a href='afficherSousCategorie.php?subcat_id=".$result['IdScat']."'>
                ".$result['nom_scategorie']."</a></li>";
      endwhile;
}

      function produits_categories(){
	   include'connectdb.php';
	   if(isset($_GET['cat_id'])){
		 $cat_id=$_GET['cat_id'];	
	     $fetch_cat = $db->prepare("SELECT * FROM categorie WHERE IdCat='$cat_id'");
		 $fetch_cat->setFetchMode(PDO::FETCH_ASSOC);
	     $fetch_cat->execute();
	     $result=$fetch_cat->fetch();
	      echo  "<div class='title'><h2 class='small-underline'>".$result['nom_categorie']."</h2></div>";
	     $fetch_prod = $db->prepare("SELECT * FROM produit WHERE IdCat='$cat_id'");
		 $fetch_prod->setFetchMode(PDO::FETCH_ASSOC);
	     $fetch_prod->execute();
	     echo "<ul class='prod_cat'>";
	     while($resultat=$fetch_prod->fetch()):
	     	echo "<li>
	     	            <form method='POST' enctype='multipart/form-data'>
	     	            <h4 class='head'>".$resultat['nom_prod']."</h4>
	     	            <img src='images_produits/".$resultat['img_prod']."'/>
	     	            <h4>".$resultat['prix_prod']."</h4><br>
	     	            <button class='btn'><a href='detailsProduit.php?prod_id=".$resultat['IdProd']."'>
	     	                  Voir produit</a></button>&nbsp;&nbsp;&nbsp;&nbsp;
	     	              <input type='hidden' name='prod_id' value='".$resultat['IdProd']."'/>
	     	              <button class='btn' name='add_cart'>Ajouter à Mon Panier</button>
	     	            </form>  
	     	      </li>";
	    endwhile;
	    echo "</ul>";
        }	         	          
      }

function produits_sous_categories(){
	include'connectdb.php';
	if(isset($_GET['subcat_id'])){
		 $subcat_id=$_GET['subcat_id'];	
	     $fetch_subcat = $db->prepare("SELECT * FROM sous_categorie WHERE IdScat='$subcat_id'");
		 $fetch_subcat->setFetchMode(PDO::FETCH_ASSOC);
	     $fetch_subcat->execute();
	     $result=$fetch_subcat->fetch();
	      echo  "<div class='title'><h2 class='small-underline'>".$result['nom_scategorie']."</h2></div>";
           
	     $fetch_prod = $db->prepare("SELECT * FROM produit WHERE IdsCat='$subcat_id'");
		 $fetch_prod->setFetchMode(PDO::FETCH_ASSOC);
	     $fetch_prod->execute();
	     echo "<ul class='prod_cat'>";
	     while($resultat=$fetch_prod->fetch()):
	     	
	     	echo "<li>
	     	          <form method='POST'>
	     	            <h4 class='head'>".$resultat['nom_prod']."</h4>
	     	            <img src='images_produits/".$resultat['img_prod']."'/>
	     	            <h4>".$resultat['prix_prod']."</h4><br>
	     	              <button class='btn'><a href='detailsProduit.php?prod_id=".$resultat['IdProd']."'>
	     	              Voir produit</a></button>&nbsp;&nbsp;&nbsp;&nbsp;
	     	              <input type='hidden' name='prod_id' value='".$resultat['IdProd']."'/>
	     	              <button class='btn' name='add_cart'>Ajouter à Mon Panier</button>
	     	          </form>
	     	      </li>";
	    endwhile;
	    echo "</ul>";
   }	      
 }

 function details_produit(){

 	include'connectdb.php';
	if(isset($_GET['prod_id'])){
    $prod_id=$_GET['prod_id'];
    $fetch_prod = $db->prepare("SELECT * FROM produit WHERE IdProd='$prod_id'");
    $fetch_prod->setFetchMode(PDO::FETCH_ASSOC);
	$fetch_prod->execute();
	$resultat=$fetch_prod->fetch();
	$cat_id=$resultat['IdCat'];

    echo"<section class=section1>
	 <h3 class='head'>".$resultat['nom_prod']."</h3>
	 <div class='cont'>
		<div class='img_prod'><img class'imgs' src='images_produits/".$resultat['img_prod']."'/></div>
		<div class='division'>
		<h4>Prix : ".$resultat['prix_prod']."</h4><br><br><br>
		<form method='POST'>
		 <input type='hidden' name='prod_id' value='".$resultat['IdProd']."'/>
		 <button name='add_cart' class='btn'>Ajouter à Mon Panier</button></div>
		 </form>
	 </div>
	 </section>
	 <section class='section2'>
	 <div class='title'><h2 class='small-underline'>Produits Similaires</h2></div>";
     $fetch_related_prod = $db->prepare("SELECT * FROM produit WHERE IdProd!=$prod_id AND IdCat='$cat_id' LIMIT 0,3");
     $fetch_related_prod->setFetchMode(PDO::FETCH_ASSOC);
	 $fetch_related_prod->execute();
	 echo"<div class'conteneur'>
	 <ul class='related_prod_cat'>";
	 while ($result=$fetch_related_prod->fetch()):
	 	echo "<li>
	 	       <a href='detailsProduit.php?prod_id=".$result['IdProd']."'> 
	 	        <img src='images_produits/".$result['img_prod']."'/>
	 	        <p>".$result['nom_prod']."</p>
	 	        <p>".$result['prix_prod']."</p>
	 	       </a>
	 	      </li>";
     endwhile;
	 echo"</ul>
	 </div>
	 </section>";
    
}

 }
 function rechercher(){
  include'connectdb.php';
	if(isset($_GET['search_query'])){
    $search_query=$_GET['search_query'];
    $search = $db->prepare("SELECT * FROM produit WHERE nom_prod LIKE'%$search_query%' OR motcle_prod LIKE'%$search_query%' ");
    $search->setFetchMode(PDO::FETCH_ASSOC);
	$search->execute();

	  if($search->rowcount()==0){
		echo "<h2>Aucun résultat pour '".$search_query."'.</h2><br><br>
		<p>- Vérifiez que vous n'avez pas fait de faute de frappe</p><br>
		<p>- Essayez avec un autre mot clé ou synonyme</p><br>
		<p>- Essayez d'effectuer une recherche plus générale</p><br><br><br>
		<button class='btn'><a href='home.php'>Retour à l'Accueil</a></button>";
	  }
      else{
	    $count=$search->rowcount();
	    if($count==1){
	    echo "<h3>".$count." Seul Résultat pour '".$search_query."'.</h3><br><br>";
	    }
	    else{
	    	echo "<h3>".$count." Résultats pour '".$search_query."'.</h3><br><br>";
	    }
		echo"<ul class='prod_cat'>";
		 while($resultat=$search->fetch()):
		  echo "<li>
		   <form method='POST'>
		    <h4 class='head'>".$resultat['nom_prod']."</h4>
		    <img src='images_produits/".$resultat['img_prod']."'/><br>
		    <button class='btn'><a href='detailsProduit.php?prod_id=".$resultat['IdProd']."'>Voir produit</a></button>&nbsp;&nbsp;&nbsp;&nbsp;
		    <input type='hidden' name='prod_id' value='".$resultat['IdProd']."'/>
		    <button class='btn' name='add_cart'>Ajouter à Mon Panier</button>
		   </form>
		  </li>";
		 endwhile;
		echo "</ul>";
	  }
    }

  } 

 function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
}

function ajouter_panier(){
  include'connectdb.php';
	if(isset($_POST['add_cart'])){
    $prod_id=$_POST['prod_id'];
    $ip=getIp();
    $check_cart=$db->prepare("SELECT * FROM panier WHERE IdProd='$prod_id' AND IpAdd='$ip'");
    $check_cart->execute();
    $count=$check_cart->rowcount();
    if($count==1){
    	echo"<script>alert('Ce produit a été déjà ajouté au panier!')</script";
    }
    else{
	    $add_cart=$db->prepare("INSERT INTO panier(IdProd,quantite,IpAdd) Values(?,?,?)");
	  if($add_cart->execute([$prod_id,'1',$ip])){
	         echo"<script>alert('Ce produit a été bien ajouté au panier!')</script";}
	  else{
	   echo"<script>alert('Veuillez réessayer!Ce produit n'a pas été ajouté au panier!')</script";}
    }
  }
} 

function compter_produits(){
  
 include'connectdb.php';
    $ip=getIp();
    $get_cart_items=$db->prepare("SELECT * FROM panier WHERE IpAdd='$ip'");
    $get_cart_items->execute();

    $count=$get_cart_items->rowcount();
    echo "<span class='number'>
          ".$count."
          </span>";
}

  function afficher_panier(){
  	include'connectdb.php';
    $ip=getIp();
    $get_cart_items=$db->prepare("SELECT * FROM panier WHERE IpAdd='$ip'");
    $get_cart_items->setFetchMode(PDO::FETCH_ASSOC);
    $get_cart_items->execute();
    $empty_cart=$get_cart_items->rowcount();
    $net_total=0;
    if($empty_cart==0){
    	echo "<div class='panVide'>
    	      <i class='fas fa-shopping-cart'></i>
    	     <h2>Votre panier est vide!<h2>
    	     <button class='btn'><a href='home.php'>Commencez Vos Achats<a></button>
    	     </div>";
    }
    else{
    	echo"<table>
                    <tr>
                        <th>Article</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire</th>
                        <th>Sous-Total</th>
                        <th>Supprimer</th>
                    </tr>";      
      if(isset($_POST['save'])){
        $quantite=$_POST['quantity'];
        foreach ($quantite as $key => $value) {
        $update_quantity=$db->prepare("UPDATE panier Set quantite='$value' WHERE IdPan='$key' ");
         if($update_quantity->execute()){
           echo "<script>window.open('panier.php','_self')</script>";
         }

       }
    }

	    while($result=$get_cart_items->fetch()):
	    $prod_id=$result['IdProd'];
	    $fetch_prod = $db->prepare("SELECT * FROM produit WHERE IdProd='$prod_id'");
	    $fetch_prod->setFetchMode(PDO::FETCH_ASSOC);
		$fetch_prod->execute();
		$resultat=$fetch_prod->fetch();
		echo "<tr>
		   <td>".$resultat['nom_prod']."<br><img src='images_produits/".$resultat['img_prod']."'/></td>
		   <td><input class='quantity' type='text' name='quantity[".$result['IdPan']."]' value='".$result['quantite']."'/>
		      <input class='save' type='submit' name='save' value='Enregistrer'/</td>
		   <td>".$resultat['prix_prod']."</td>
		   <td>";
		   $prix_prod=$resultat['prix_prod'];
		   $int = (int) filter_var($prix_prod, FILTER_SANITIZE_NUMBER_INT);
		   $quantity=$result['quantite'];
		   $sub_total=$int*$quantity;
		   echo" ".$sub_total." DH";
		   $net_total+=$sub_total;
		   echo"</td>
		   <td><a href='supprimer_produit_panier?delete_id=".$resultat['IdProd']."'><i class='fas fa-trash'></i></a></td>
		   </tr>";
		endwhile;
		   echo "<tr class='total'>
			   <td></td>
			   <td></td>
			   <td></td>
			   <td></td>
			   <td>Total:&nbsp;&nbsp;<span class='sum'>".$net_total." DH<span></td>
		   </tr>
		   <tr class='boutons'>
			   <td></td>
			   <td></td>
			   <td></td> 
			   <td><button class='BTN'><a href='home.php'>Poursuivre Vos Achats</button></a></td>
		       <td><button class='BTN'><a href='validerCommande.php'>Finaliser Votre Commande</button></a></td>
		   </tr>
		 </table>";
	}	      
  }

  function supprimer_produit_panier(){
   include'connectdb.php';
   if (isset($_GET['delete_id'])) {
  	$prod_id=$_GET['delete_id'];
  	$delete=$db->prepare("DELETE FROM panier WHERE IdProd='$prod_id'");
          	if($delete->execute()){
          		echo "<script>alert('Le produit a été bien supprimé du panier!')</script>";
          		echo "<script>window.open('panier.php','_self')</script>";
          	}
          	else{
          	 echo "<script>alert('Veuillez réessayer!Le produit n'a pas été supprimé du panier!')</script>";
          	}
    }      	
  }	

function validerPanier(){
  	include'connectdb.php';
    $ip=getIp();
    $get_cart_items=$db->prepare("SELECT * FROM panier WHERE IpAdd='$ip'");
    $get_cart_items->setFetchMode(PDO::FETCH_ASSOC);
    $get_cart_items->execute();
    $net_total=0;
    	echo"<table>
                    <tr>
                        <th>Article</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire</th>
                        <th>Sous-Total</th>
                    </tr>";
             
	    while($result=$get_cart_items->fetch()):
	    	$prod_id=$result['IdProd'];

	    $fetch_prod = $db->prepare("SELECT * FROM produit WHERE IdProd='$prod_id'");
	    $fetch_prod->setFetchMode(PDO::FETCH_ASSOC);
		$fetch_prod->execute();
		
		$resultat=$fetch_prod->fetch();
		echo "<tr>
		   <td>".$resultat['nom_prod']."</td>
		   <td>".$result['quantite']."</td>
		   <td>".$resultat['prix_prod']."</td>
		   <td>";
		   $prix_prod=$resultat['prix_prod'];
		   $int = (int) filter_var($prix_prod, FILTER_SANITIZE_NUMBER_INT);
		   $quantity=$result['quantite'];
		   $sub_total=$int*$quantity;
		   echo" ".$sub_total." DH";
		   $net_total+=$sub_total;
		   echo"</td>
		   </tr>";
		endwhile;
		   echo "<tr class='total'>
			   <td>Total:&nbsp;&nbsp;".$net_total." DH</td>
		   </tr>
		 </table>";
	}	   
	   
  



?>