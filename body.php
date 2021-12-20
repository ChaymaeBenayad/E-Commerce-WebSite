
   
	 <nav id="main-nav">
	 	<ul>
	 	 <li><a href="home.php">Accueil</a></li>	
         <li><?php echo materielInfo(); ?>
            <ul class="submenu">
	 	   	  <?php echo sous_cat_materielInfo(); ?>	  
	 	   </ul>
	 	 </li>
         <li><?php echo vetements(); ?>
            <ul class="submenu">
	 	   	   <?php echo sous_cat_vetements(); ?>
	 	    </ul>
	 	 </li>   
         <li><?php echo romans(); ?>
            <ul class="submenu">
		 	  <?php echo sous_cat_romans(); ?> 
	 	    </ul>
	 	 </li>
	 	</ul>
	 </nav>	

	 <div class="parallax-window" data-parallax="scroll" data-z-index="-100" data-image-src="shopping.jpg">
       <p>Commencez<br>Votre Shopping<br>Maintenant!</p>
     </div>	

<?php include'footer.php' ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/parallax.min.js"></script>
 </body>
 </html>   
