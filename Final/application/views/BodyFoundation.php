<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<main class="grid-x align-center" id="main">
	
		<?php 
		foreach ($bioInfo as $personal_info): 
		?>

		
			<section class="medium-3 bio">
		
				<h2><a href="<?php echo site_url('Home/ProfileView/').$personal_info['username'];?>"><?php echo $personal_info['name']; ?></a></h2>
				<img src="<?php echo base_url();?>assets/images/personal/<?php echo $personal_info['image'];?>" class="bioImage">
				<div class="profileItem"><?php echo $personal_info['summary'];?></div>
				<div class="profileItem"><?php echo $personal_info['skills'];?></div>
	
			</section>
		<?php 
		endforeach; 
		?>

		
	</main>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="<?php echo base_url().'assets/foundation/js/custom.modernizr.js';?>"></script>

	<script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.4.3/dist/js/foundation.min.js" integrity="sha256-mRYlCu5EG+ouD07WxLF8v4ZAZYCA6WrmdIXyn1Bv9Vk= sha384-KzKofw4qqetd3kvuQ5AdapWPqV1ZI+CnfyfEwZQgPk8poOLWaabfgJOfmW7uI+AV sha512-0gHfaMkY+Do568TgjJC2iMAV0dQlY4NqbeZ4pr9lVUTXQzKu8qceyd6wg/3Uql9qA2+3X5NHv3IMb05wb387rA==" crossorigin="anonymous"></script>

	
	<script>
	$(document).foundation();
	</script>
	
	</div>
</body>
</html>