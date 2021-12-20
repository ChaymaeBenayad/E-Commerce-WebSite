
<div class="rightside">
  <h3 class="title2">Ajouter une nouvelle catégorie</h3>
  <form method="POST">
  	<label class="txt">Nom de la catégorie :</label>
  	<input  type="text" name="cat" required><br><br><br>
  	<button class="btn" name="add_cat">Ajouter</button>
  </form>	
</div>
<?php
include'connectdb.php';
if (isset($_POST['add_cat'])) {
	$cat_name=$_POST['cat'];
    	$add_cat = $db->prepare("INSERT INTO categorie(nom_categorie) VALUES (?)");						  
	    if($add_cat->execute([$cat_name])){
	    	echo "<script>alert('La nouvelle catégorie a été bien ajoutée!')</script>";}
	    else{
	    	echo "<script>alert('Veuillez réessayer!La nouvelle catégorie n'a pas été ajoutée!')</script>";}
}?>
</body>
</html>



