<?php 
   session_start();
   ?>
<?php
include'functionsUser.php';

function valider_panier(){
    
    include'connectdb.php';
    $output = ''; 
    $ip=getIp();
    $get_cart_items=$db->prepare("SELECT * FROM panier WHERE IpAdd='$ip'");
    $get_cart_items->setFetchMode(PDO::FETCH_ASSOC);
    $get_cart_items->execute();
    $net_total=0;

     while($result=$get_cart_items->fetch()):
        $prod_id=$result['IdProd'];

      $fetch_prod = $db->prepare("SELECT * FROM produit WHERE IdProd='$prod_id'");
      $fetch_prod->setFetchMode(PDO::FETCH_ASSOC);
      $fetch_prod->execute();
      $resultat=$fetch_prod->fetch();

    $output .="<tr>
       <td>".$resultat['nom_prod']."</td>
       <td>".$result['quantite']."</td>
       <td>".$resultat['prix_prod']."</td>
       <td>";
      $prix_prod=$resultat['prix_prod'];
       $int = (int) filter_var($prix_prod, FILTER_SANITIZE_NUMBER_INT);
       $quantity=$result['quantite'];
       $sub_total=$int*$quantity;
       $output .= " ".$sub_total." DH";
       $net_total+=$sub_total;
       $output .= "</td> </tr><br><br>";
    endwhile;
       $output .= "<br><br><tr>
         <td>Total:&nbsp;&nbsp;".$net_total." DH</td>
       </tr><br><br>";
       return $output;
      
  } 
 
if(isset($_POST["generate_pdf"]))  {  
require_once('tcpdf/tcpdf.php');
ob_start(); 
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
$obj_pdf->SetCreator(PDF_CREATOR);  
$obj_pdf->SetTitle("Votre Facture Sous Forme PDF");  
$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$obj_pdf->SetDefaultMonospacedFont('helvetica');  
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
$obj_pdf->setPrintHeader(false);  
$obj_pdf->setPrintFooter(false);  
$obj_pdf->SetAutoPageBreak(TRUE, 10);  
$obj_pdf->SetFont('helvetica', '', 11);  
$obj_pdf->AddPage();  
$content = "";
$content .= " 
<style>
  h2{
    text-align:center;
  }
  table{
  width: 100%;
  text-align: center;
  border:2px solid black;
}
table th{
  background-color: goldenrod;
  line-height: 20px;
  text-align: center;
  font-size: 14px;
} 
table td{
  font-size: 12px;
}
</style> 
<h2>Votre Facture :</h2><br/><br/>
<table>
     <tr>
        <th>Article</th>
        <th>Quantité</th>
        <th>Prix Unitaire</th>
        <th>Sous-Total</th>
    </tr><br><br>";   
$content .= valider_panier();  
$content .=  "</table>";
$obj_pdf->writeHTML($content);
// Clean any content of the output buffer
ob_end_clean();

$obj_pdf->Output('facture.pdf', 'I');  
}

if(isset($_POST['return'])){
  header("location:panier.php");
}
 
?>  
<!DOCTYPE html>  
<html>  
<head>  
<title></title>  
<link rel="stylesheet" type="text/css" href="css/style.css">           
</head>  
<body>  
    <div class="content"> 
      <form method="POST" enctype="multipart/form-data">
      <h2>Votre Facture:</h2> 
       <?php  
         echo validerPanier();  
       ?>      
      <center><input type="submit" name="generate_pdf" class="btn" value="Télécharger Votre Facture Sous Forme PDF" />
         &nbsp;&nbsp;<input type="submit" name="return" class="btn" value="Retour Au Panier" /></center> 
      </form>
    </div> 

</body>
</html>