
<div class="rightside">
  <h3 class="title1">Voir toutes les catégories</h3>
	<table cellspacing="0">
	  <tr>
		<th>N° Série</th>
		<th>Nom Catégorie</th>
		<th>Modifier</th>
		<th>Supprimer</th>
	  </tr>  
   <?php
      include'connectdb.php';
    $fetch_cat = $db->prepare("SELECT * FROM categorie ORDER BY IdCat");
    $fetch_cat->setFetchMode(PDO::FETCH_ASSOC);
    $fetch_cat->execute();
    $i=1;
	  while ($result=$fetch_cat->fetch()):
		echo"<tr>
		  	<td>".$i++."</td>
		    <td>".$result['nom_categorie']."</td>
		    <td><a href='adminHome.php?modifierCategorie=".$result['IdCat']."'>
		  	  <i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td>
		  	<td><a href='adminHome.php?supprimerCategorie=".$result['IdCat']."'>
		  	  <i class='fa fa-trash' aria-hidden='true'></i></a></td>
		  	</tr>";
	 endwhile;?>
    </table>
</body>
</html>


