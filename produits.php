
<div class="rightside">
	<h3 class="title2">Ajouter un nouveau produit</h3>
  <form method="POST" enctype="multipart/form-data">
   <label class="txt">Sélectionnez une catégorie :</label>
   <select name="cat">
  	<?php
  	 include'connectdb.php';
  	 $fetch_cat = $db->prepare("SELECT * FROM categorie");
  	 $fetch_cat->setFetchMode(PDO::FETCH_ASSOC);
  	 $fetch_cat->execute();
      while ($result=$fetch_cat->fetch()):
  		echo"<option value='".$result['IdCat']."'>".$result['nom_categorie']."</option>";
  		endwhile;
  	?>
   </select>
   <br><br>
   <label class="txt">Sélectionnez une sous-catégorie :</label>
   <select name="subcat">
  	<?php
  	 include'connectdb.php';
  	 $fetch_subcat = $db->prepare("SELECT * FROM sous_categorie");
  	 $fetch_subcat->setFetchMode(PDO::FETCH_ASSOC);
  	 $fetch_subcat->execute();
      while ($result=$fetch_subcat->fetch()):
  		echo"<option value='".$result['IdScat']."'>".$result['nom_scategorie']."</option>";
  		endwhile;
  	?>
   </select><br><br>

   <label class="txt">Nom du produit :</label>
   <input type="text" name="prod_name" required><br><br>
   <label class="txt">Prix du produit :</label>
   <input type="text" name="prod_price" required><br><br>
   <label class="txt">Mot-clé du produit :</label>
   <input type="text" name="prod_key" required><br><br>
   <label class="txt">Image du produit :</label>
   <input type="file" name="prod_img" required><br><br>
   <button class="btn" name="add_prod">Ajouter</button>
  </form>	
</div> 
<?php
include'connectdb.php';
if (isset($_POST['add_prod'])) {
	$cat_id=$_POST['cat'];
	$subcat_id=$_POST['subcat'];
	$prod_name=$_POST['prod_name'];
	$prod_price=$_POST['prod_price'];
	$prod_keyword=$_POST['prod_key'];
	$prod_img=$_FILES['prod_img']['name'];
	$prod_img_tmp=$_FILES['prod_img']['tmp_name'];
	move_uploaded_file($prod_img_tmp,"images_produits/$prod_img");
  $add_prod = $db->prepare("INSERT INTO produit(IdCat,IdScat,nom_prod,prix_prod,motcle_prod,img_prod) VALUES (?,?,?,?,?,?)");		  
	 if($add_prod->execute([$cat_id,$subcat_id,$prod_name,$prod_price,$prod_keyword,$prod_img])){
	   echo "<script>alert('Le nouveau produit a été bien ajouté!')</script>";}
	 else{
	   echo "<script>alert('Veuillez réessayer!Le nouveau produit n'a pas été ajouté!')</script>";}
}?>

