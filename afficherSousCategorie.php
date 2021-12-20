   <?php 
     session_start();
     include'functionsUser.php';
     include'header.php';
     include'menu.php'; 

        if(isset($_GET['subcat_id'])){
             echo"<div class='container'>";
            echo produits_sous_categories(); 
            echo "</div>"; 
          } 
          include'footer.php'; 
          echo ajouter_panier();
    ?>    
     
</body>
</html>