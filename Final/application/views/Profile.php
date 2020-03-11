<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(empty($bioInfo))
{
	$this->session->set_flashdata('message', "User not found");
	redirect('Home/index');
}
?>
<style>
body {
	background-color: rgb(16,100,94);
	background-image: url(<?php print base_url(); ?>assets/images/wallpaper.png);
	background-repeat: no-repeat;
	background-size: cover;


}
.profileImage {
	width: 250px;
	height: 250px;

}
#bio {
	padding: 5%;
	background-color: rgba(47, 79, 79,.5);
	
}
#hero {

	background-color: unset;
	background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,0));

}
#heroGreeting {
	padding: 5% 5% 5% 10%;
	
}
@media only screen and (max-width: 1370px) {
	.profileImage {
		width: 200px;
		height: 200px;

	}
	#heroGreeting {
		padding-bottom: 0;
	}
}
@media only screen and (max-width: 1023px) {
	body {
		background-size: 100%;
		background-repeat: no-repeat;
	}
	.profileImage {
		width: 150px;
		height: 150px;
	}
	#bio {
		background-color: unset;
	}
}
</style>


		<div class="grid-x" id="hero">
			<div class="large-4" id="heroGreeting">
				<img src="<?php echo base_url();?>assets/images/personal/<?php echo $bioInfo[0]['image'];?>" class="profileImage">
			</div>
			<div class="large-8" id="bio">
				<h1 id="name"><?php echo $bioInfo[0]['name'];?></h1>
				<br />
				
					<button class="secondary button" data-open="emailMe" id="signInText">Email Me!</button>
						<div class="reveal" id="emailMe" data-reveal>
							<form class="grid-x" action="<?php echo site_url('Home/emailUser/').$bioInfo[0]['username'];?>" method="POST">
								<label>Your Name:</label>
								<input type="text" name="name" required> 
								<label>Your Email:</label>
								<input type="email" name="email" required>
								<label>Subject:</label>
								<input type="text" name="subject" required>
								<label>Message:</label>
								<textarea name="message" required></textarea>
								<button class="secondary button">Send Email</button>
								</form>
						  <button class="close-button" data-close aria-label="Close modal" type="button">
							<span aria-hidden="true">&times;</span>
						  </button>
						</div>
				<p><?php echo $bioInfo[0]['socialLinks'];?></p>
				<?php
				if(!empty($bioInfo[0]['bio'])) {
					echo "<h4>Bio</h4>
					<p>".$bioInfo[0]['bio']."</p>";
				}
				if(!empty($bioInfo[0]['experience'])) {
					echo "<h4>Experience</h4>
					<p>".$bioInfo[0]['experience']."</p>";
				}
				if(!empty($bioInfo[0]['certification'])) {
					echo "<h4>Certifications</h4>
					<p>".$bioInfo[0]['certification']."</p>";
				
				}
				if(!empty($bioInfo[0]['skills'])) {
					echo "<h4>Skills</h4>
					<p>".$bioInfo[0]['skills']."</p>";
				
				}
				?>



			
		</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="<?php echo base_url().'assets/foundation/js/custom.modernizr.js';?>"></script>

	<script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.4.3/dist/js/foundation.min.js" integrity="sha256-mRYlCu5EG+ouD07WxLF8v4ZAZYCA6WrmdIXyn1Bv9Vk= sha384-KzKofw4qqetd3kvuQ5AdapWPqV1ZI+CnfyfEwZQgPk8poOLWaabfgJOfmW7uI+AV sha512-0gHfaMkY+Do568TgjJC2iMAV0dQlY4NqbeZ4pr9lVUTXQzKu8qceyd6wg/3Uql9qA2+3X5NHv3IMb05wb387rA==" crossorigin="anonymous"></script>
	<script>
	$(document).foundation();
	</script>
	
	</div>

</body>
</html>