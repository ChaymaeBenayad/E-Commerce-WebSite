
<?php
 include'connectdb.php';
  if (isset($_GET['supprimerProduit'])) {
  	$prod_delete_id=$_GET['supprimerProduit'];
  	$delete_prod=$db->prepare("DELETE FROM produit WHERE IdProd='$prod_delete_id'");
      if($delete_prod->execute()){
        echo "<script>alert('Le produit a été bien supprimé!')</script>";
        echo "<script>window.open('adminHome.php?voirProduits','_self')</script>";}
      else{
        echo "<script>alert('Veuillez réessayer!Le produit n'a pas été supprimé!')</script>";}
  } ?>



