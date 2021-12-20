
<?php
include'connectdb.php';
if (isset($_GET['modifierProduit'])) {
  $prod_id=$_GET['modifierProduit'];
  $fetch_prod_name=$db->prepare("SELECT * FROM produit WHERE IdProd='$prod_id'");
  $fetch_prod_name->setFetchMode(PDO:: FETCH_ASSOC);
  $fetch_prod_name->execute();
  $res=$fetch_prod_name->fetch();
  $cat_id=$res['IdCat'];
  $subcat_id=$res['IdScat'];

  $fetch_cat = $db->prepare("SELECT * FROM categorie WHERE IdCat='$cat_id'");
  $fetch_cat->setFetchMode(PDO::FETCH_ASSOC);
  $fetch_cat->execute();
  $result=$fetch_cat->fetch();

  $fetch_subcat = $db->prepare("SELECT * FROM sous_categorie WHERE IdScat='$subcat_id'");
  $fetch_subcat->setFetchMode(PDO::FETCH_ASSOC);
  $fetch_subcat->execute();
  $resultat=$fetch_subcat->fetch();

  echo "<h3 class='title2'>Modifier un produit</h3>
  <form method='POST' enctype='multipart/form-data'>
  	<label class='txt'>Sélectionnez une catégorie :</label>
  	<select name='cat_name'>
    <option value='".$result['IdCat']."'>".$result['nom_categorie']."</option>";
      $fetch_cat = $db->prepare("SELECT * FROM categorie");
      $fetch_cat->setFetchMode(PDO::FETCH_ASSOC);
      $fetch_cat->execute();
      while ($result=$fetch_cat->fetch()):
      echo"<option value='".$result['IdCat']."'>".$result['nom_categorie']."</option>";
      endwhile;
    echo "</select><br><br>

  	<label class='txt'>Sélectionnez une sous-catégorie :</label>
  	<select name='subcat_name'>
    <option value='".$resultat['IdScat']."'>".$resultat['nom_scategorie']."</option>";
      $fetch_subcat = $db->prepare("SELECT * FROM sous_categorie");
      $fetch_subcat->setFetchMode(PDO::FETCH_ASSOC);
      $fetch_subcat->execute();
      while ($result=$fetch_subcat->fetch()):
      echo"<option value='".$result['IdScat']."'>".$result['nom_scategorie']."</option>";
      endwhile;
  	echo "</select><br><br>
  	<label class='txt'>Nom du produit :</label>
  	<input type='text' value='".$res['nom_prod']."' name='prod_name' ><br><br>
  	<label class='txt'>Prix du produit :</label>
  	<input type='text' name='prod_price' value='".$res['prix_prod']."' ><br><br>
  	<label class='txt'>Mot-clé du produit :</label>
  	<input type='text' name='prod_key' value='".$res['motcle_prod']."' ><br><br>
  	<label class='txt'>Image du produit :</label>
  	<input type='file' name='prod_img'><br><br>
    <img class='update_img' src='images_produits/".$res['img_prod']."' 
      style='width:160px;height:120px;float:center;'/><br/><br/>
  	<button class='btn' name='update_prod'>Modifier</button>
  </form>";	

  if(isset($_POST['update_prod'])){
    $cat_name=$_POST['cat_name'];
    $subcat_name=$_POST['subcat_name'];
    $prod_name=$_POST['prod_name'];
    $prod_price=$_POST['prod_price'];
    $prod_key=$_POST['prod_key'];
      if($_FILES['prod_img']['name']==""){}
      else{
        $prod_img=$_FILES['prod_img']['name'];
        $prod_img_tmp=$_FILES['prod_img']['tmp_name'];
        move_uploaded_file($prod_img_tmp,"images_produits/$prod_img");
        $update_img=$db->prepare("UPDATE produit SET prod_img='$prod_img' WHERE IdProd='$prod_id'");
        $update_img->execute();
        }
    $update_prod=$db->prepare("UPDATE produit SET nom_prod='$prod_name',IdCat='$cat_name',
    IdScat='$subcat_name',prix_prod='$prod_price',motcle_prod='$prod_key' WHERE IdProd='$prod_id'");
      if($update_prod->execute()){
        echo "<script>alert('Le produit a été bien modifié!')</script>";
        echo "<script>window.open('adminHome.php?voirProduits','_self')</script>";}
      else{
        echo "<script>alert('Veuillez réessayer!Le produit n'a pas été modifié!')</script>";}
    }
}?>