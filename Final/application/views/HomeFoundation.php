<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	
		<div class="grid-x" id="hero">
			<div class="large-12">
				<h2 id="heroGreeting">Welcome</h2>
			</div>
			<div class="medium-12" id="search">
				<label style="color:white;">Search:</label>
				<form action="<?php echo site_url('Home/search');?>" method="GET">
					<input type="text" id="searchQuery" name="query">
				</form>

			</div>
			
		</div>
		
		<div class="grid-x" id="break">
		</div>
		