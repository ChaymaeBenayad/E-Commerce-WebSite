<?php
 include'connectdb.php';
  if (isset($_GET['modifierSousCategorie'])) {
  	$subcat_id=$_GET['modifierSousCategorie'];
  	$fetch_subcat_name=$db->prepare("SELECT * FROM sous_categorie WHERE IdScat='$subcat_id'");
  	$fetch_subcat_name->setFetchMode(PDO:: FETCH_ASSOC);
  	$fetch_subcat_name->execute();
  	$result=$fetch_subcat_name->fetch();
  	$cat_id=$result['IdCat'];

    $fetch_cat = $db->prepare("SELECT * FROM categorie WHERE IdCat='$cat_id'");
    $fetch_cat->setFetchMode(PDO::FETCH_ASSOC);
    $fetch_cat->execute();
    $res=$fetch_cat->fetch();
    echo"<h3 class='title2'>Modifier une sous-catégorie</h3>
    <form method='POST'>
      <label class='txt'>Sélectionnez une catégorie&nbsp;&nbsp;:</label>
      <select name='cat_name'>
      <option value='".$res['IdCat']."'>".$res['nom_categorie']."</option>";
           $fetch_cat = $db->prepare("SELECT * FROM categorie");
           $fetch_cat->setFetchMode(PDO::FETCH_ASSOC);
           $fetch_cat->execute();
           while ($res=$fetch_cat->fetch()):
            echo"<option value='".$res['IdCat']."'>".$res['nom_categorie']."</option>";
           endwhile;
      echo"</select>
      <br><br>  
  	  <label class='txt'>Nom de la sous-catégorie :</label>
  	  <input  type='text' name='subcat_name' value='".$result['nom_scategorie']."'>
      <br><br><br>
  	  <button class='btn' name='update_subcat'>Modifier</button>
	  </form>";	
	  if(isset($_POST['update_subcat'])){
      $cat_name=$_POST['cat_name'];
      $subcat_name=$_POST['subcat_name'];
      $update_subcat=$db->prepare("UPDATE sous_categorie SET nom_scategorie='$subcat_name',IdCat='$cat_name' WHERE IdScat='$subcat_id'");
      if($update_subcat->execute()){
        echo "<script>alert('La sous-catégorie a été bien modifiée!')</script>";
        echo "<script>window.open('adminHome.php?voirSousCategories','_self')</script>";}
      else{
        echo "<script>alert('Veuillez réessayer!La sous catégorie n'a pas été modifiée!')</script>";}
	  }
  }?>

