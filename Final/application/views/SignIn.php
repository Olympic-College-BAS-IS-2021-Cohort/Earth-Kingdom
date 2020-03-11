<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
body {
	background-color: rgb(117,175,150);

	background-size: 100%;
	background-repeat: no-repeat;
}

#accountForm {
	margin: 2% 0 2% 0;
	height: 100%;
	background-color: white;
	padding: 2%;
	box-shadow:  0px 5px 10px black;
	
}
.account {
	color: black;
	margin: 5% 0 5% 0;
	width: 30%;
	
}
.info {
	text-align: right;
}
a:link, a:visited {
	color: black;
}
@media only screen and (max-width: 1023px) {
	#accountForm {
		margin: 2% 5% 2% 5%;
	}
	
}


</style>


					
					
	<div class="grid-x">
		<div class="medium-3"></div>
			<div class="large-6" id="accountForm">


					

			
			
			<ul class="tabs" data-tabs id="AdminTabs">
			  <li class="tabs-title is-active"><a href="#create" aria-selected="true">Sign In</a></li>
			  <li class="tabs-title"><a href="#delete">Reset Password</a></li>
			</ul>

			<div class="tabs-content" data-tabs-content="AdminTabs">
			 <div class="tabs-panel is-active" id="create">
					<form class="grid-x" action="<?php echo site_url('home/sessionCreate');?>" method="POST">
							<label>Username:</label>
							<input type="text" name="username">
							<label>Password:</label>
							<input type="password" name="password">
							<button class="secondary button">Log In</button>
						</form>
			 </div>
			 
			 <div class="tabs-panel" id="delete">
				<form class="grid-x" action="<?php echo site_url('home/resetPassword');?>" method="POST">
						<label>Username:</label>
						<input type="text" name="username" required>
						<label>Verification Code:</label>
						<input type="text" name="code">
						<label>Password:</label>
						<input type="password" name="password" id="password" required>
						<label>Confirm Password:</label>
						<input type="password" oninput="confirmPassword(this)" required>
						<button class="secondary button">Reset Password</button>
						
						<script language='javascript' type='text/javascript'>
							function confirmPassword(input) {
								if (input.value != document.getElementById('password').value) {
									input.setCustomValidity('Password Must be Matching.');
								} else {
									// input is valid -- reset the error Message
									input.setCustomValidity('');
								}
							}
						</script>
						
					</form>
					
			</div>
					
				
			</div>
								
				
			</div>
		<div class="medium-3"></div>
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

