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