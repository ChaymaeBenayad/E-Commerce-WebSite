
<div class="rightside">
	<h3 class="title1">Voir tous les produits</h3>
  	<table cellspacing="0" border="1">
      <tr>
        <th>N° Série</th>
        <th>Nom Produit</th>
        <th>Prix Produit</th>
        <th>Image Produit</th>
        <th>Mot-Clé Produit</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>  
  <?php
    include'connectdb.php';
    $fetch_prod = $db->prepare("SELECT * FROM produit ORDER BY IdCat");
    $fetch_prod->setFetchMode(PDO::FETCH_ASSOC);
    $fetch_prod->execute();
    $i=1;
      while ($result=$fetch_prod->fetch()):
       echo"<tr>
        <td>".$i++."</td>
        <td style='width:700px;'>".$result['nom_prod']."</td>
        <td style='width:400px;'>".$result['prix_prod']."</td>
        <td><img src='images_produits/".$result['img_prod']."'></td>
        <td>".$result['motcle_prod']."</td>
        <td><a href='adminHome?modifierProduit=".$result['IdProd']."'>
        <i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td>
        <td><a href='adminHome?supprimerProduit=".$result['IdProd']."'>
        <i class='fa fa-trash' aria-hidden='true'></i></a></td>
       </tr>";
      endwhile;
 ?>
    </table>
</div>
 

