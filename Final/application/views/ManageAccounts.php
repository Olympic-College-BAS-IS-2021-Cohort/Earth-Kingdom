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
	width: 100%;
	
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
			  <li class="tabs-title is-active"><a href="#create" aria-selected="true">Create Account (verification)</a></li>
			  <li class="tabs-title"><a href="#delete">Delete Account</a></li>
			</ul>

			<div class="tabs-content" data-tabs-content="AdminTabs">
			  <div class="tabs-panel is-active" id="create">
					<form class="grid-x" action="<?php echo site_url('Admin/accountCreation');?>" method="POST">
						
						<label>Username:</label>
						<input type="text" name="username" required>
						<label>User Email:</label>
						<input type="text" name="email" required>

						
						<div class="cell">
							<label style="width: 100%;">What kind of user is this?</label>
							<input type="radio" name="group" value="Admin_group">
							<label for="Admin_group">Admin</label>
							<input type="radio" name="group" value="default_group">
							<label for="default_group">Default</label>
						</div>
						
						<button class="secondary button">Create User Account</button>
					</form>
			  </div>
			  <div class="tabs-panel" id="delete">

					<form class="grid-x" action="<?php echo site_url('Admin/accountDeletion');?>" method="POST">
			
						<label>Username:</label>
						<input type="text" name="username" required>
						
						<button class="secondary button" onclick="return confirm('Are you sure?')">Delete User Account</button>
								
					</form>
					
						<?php 
						foreach ($info as $accountInfo): 
						?>
						
							<table class="account">
								<tr>
								<td>Used ID</td><td><?php echo $accountInfo['id'];?></td>
								</tr>
								<tr>
								<td>Email</td><td><?php echo $accountInfo['email'];?></td>
								</tr>
								<td>Username</td><td><?php echo $accountInfo['username'];?></td>
								<tr>
								<td>Banned Status</td><td><?php echo $accountInfo['banned'];?></td>
								</tr>


							</table>
					
						<?php 
						endforeach; 
						?>
			  </div>
			</div>					
				
			</div>
		<div class="medium-3"></div>
	</div>
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

