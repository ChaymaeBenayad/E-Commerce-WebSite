
<div class="rightside">
 <h3 class="title1">Voir toutes les sous-catégories</h3>
  <table cellspacing="0">
   <tr>
    <th>N° Série</th>
    <th>Nom Sous-Catégorie</th>
    <th>Modifier</th>
    <th>Supprimer</th>
   </tr>  
<?php
  include'connectdb.php';
  $fetch_subcat = $db->prepare("SELECT * FROM sous_categorie ORDER BY IdCat");
  $fetch_subcat->setFetchMode(PDO::FETCH_ASSOC);
  $fetch_subcat->execute();
  $i=1;
    while ($result=$fetch_subcat->fetch()):
      echo"<tr>
        <td>".$i++."</td>
        <td>".$result['nom_scategorie']."</td>
        <td><a href='adminHome.php?modifierSousCategorie=".$result['IdScat']."'>
        <i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td>
        <td><a href='adminHome.php?supprimerSousCategorie=".$result['IdScat']."'>
        <i class='fa fa-trash' aria-hidden='true'></i></a></td>
      </tr>";
    endwhile;
?>
  </table>
</body>
</html>


