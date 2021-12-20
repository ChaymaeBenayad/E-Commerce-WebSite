
<?php
 include'connectdb.php';
  if (isset($_GET['supprimerCategorie'])) {
  	$cat_delete_id=$_GET['supprimerCategorie'];
  	$delete_cat=$db->prepare("DELETE FROM categorie WHERE IdCat='$cat_delete_id'");
      if($delete_cat->execute()){
        echo "<script>alert('La catégorie a été bien supprimée!')</script>";
        echo "<script>window.open('adminHome.php?voirCategories','_self')</script>";}
      else{
        echo "<script>alert('Veuillez réessayer!La catégorie 
             n'a pas été supprimée!')</script>";}
    }?>


    