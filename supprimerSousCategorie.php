
<?php
 include'connectdb.php';
 if (isset($_GET['supprimerSousCategorie'])) {
  $subcat_delete_id=$_GET['supprimerSousCategorie'];
  $delete_subcat=$db->prepare("DELETE FROM sous_categorie WHERE IdScat='$subcat_delete_id'");
    if($delete_subcat->execute()){
      echo "<script>alert('La sous-catégorie a été bien supprimée!')</script>";
      echo "<script>window.open('adminHome.php?voirSousCategories','_self')
           </script>";}
    else{
      echo "<script>alert('Veuillez réessayer!La sous-catégorie n'a pas été supprimée!')</script>";}
  }?>


