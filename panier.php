  <?php 
   session_start();
   include'functionsUser.php';
   include'header.php';
   include'menu.php';
   ?>
     	<div class="cart">
            <form method="POST" enctype="multipart/form-data">
                 <?php  echo afficher_panier();  ?> 
            </form>
       </div> 

    <?php include'footer.php'; ?>
</body>
</html>