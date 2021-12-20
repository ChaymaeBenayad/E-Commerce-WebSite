
<?php
 include'connectdb.php';
  if (isset($_GET['modifierCategorie'])) {
  	$cat_id=$_GET['modifierCategorie'];
  	$fetch_cat_name=$db->prepare("SELECT * FROM categorie WHERE IdCat='$cat_id'");
  	$fetch_cat_name->setFetchMode(PDO:: FETCH_ASSOC);
  	$fetch_cat_name->execute();
  	$result=$fetch_cat_name->fetch();
  	 echo   "<h3 class='title2'>Modifier une catégorie</h3>
	  <form method='POST'>
	  	<label class='txt'>Nom de la catégorie :</label>
	  	<input  type='text' name='cat_name' 
           value='".$result['nom_categorie']."'><br><br><br>
	  	<button class='btn' name='update_cat'>Modifier</button>
	  </form>";	
	  if(isset($_POST['update_cat'])){
      $cat_name=$_POST['cat_name'];
      $update_cat=$db->prepare("UPDATE categorie SET nom_categorie='$cat_name'
                                   WHERE IdCat='$cat_id'");
      if($update_cat->execute()){
        echo "<script>alert('La catégorie a été bien modifiée!')</script>";
        echo "<script>window.open('adminHome.php?voirCategories','_self')
              </script>";}
        else{
        echo "<script>alert('Veuillez réessayer!La catégorie 
                   n'a pas été modifiée!')</script>";}
	  }
  }?>

