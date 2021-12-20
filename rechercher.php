     <?php 
     session_start();
     include'functionsUser.php'; 
     include'header.php'; 
     include'menu.php';

        if(isset($_GET['search'])){
             echo"<div class='container'>";
            echo rechercher(); 
            echo "</div>"; 
        }    

      include'footer.php';
      echo ajouter_panier();
    ?> 
</body>
</html>