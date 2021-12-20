<div class="rightside">
  <h3 class="title2">Ajouter une nouvelle sous-catégorie</h3>
  <form method="POST">
   <label class="txt">Sélectionnez une catégorie&nbsp;&nbsp;:</label>
   <select name="cat" >
  	<?php
  		include'connectdb.php';
  		$fetch_cat = $db->prepare("SELECT * FROM categorie");
  		$fetch_cat->setFetchMode(PDO::FETCH_ASSOC);
  		$fetch_cat->execute();
        while ($result=$fetch_cat->fetch()):
  		  echo"<option class='form' value='".$result['IdCat']."'>".$result['nom_categorie']."</option>";
  		  endwhile;
  	?>
   </select>
   <br><br> 	
   <label class="txt">Nom de la sous-catégorie :</label>
   <input  type="text" name="subcat" required><br><br><br>
   <button class="btn" name="add_subcat">Ajouter</button>
  </form>	
</div>
<?php
include'connectdb.php';
if (isset($_POST['add_subcat'])) {
	$cat_id=$_POST['cat'];
	$subcat_name=$_POST['subcat'];
  $add_subcat = $db->prepare("INSERT INTO sous_categorie(nom_scategorie,IdCat) VALUES (?,?)");						  
	    if($add_subcat->execute([$subcat_name,$cat_id])){
	    	echo "<script>alert('La nouvelle sous-catégorie a été bien ajoutée!')</script>"; }
	    else{
	    	echo "<script>alert('Veuillez réessayer!La nouvelle sous-catégorie n'a pas été ajoutée!')</script>"; }
}?>
</body>
</html>

