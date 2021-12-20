    <?php 
    session_start();
    include'functionsUser.php'; 
    include'header.php';
    include'menu.php';
 
        if(isset($_GET['prod_id'])){
                 echo details_produit();  
        }    
    include'footer.php'; 
    echo ajouter_panier(); 
    ?>   
</body>
</html>