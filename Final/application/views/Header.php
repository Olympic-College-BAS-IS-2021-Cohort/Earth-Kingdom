<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<link rel="shortcut icon" href="<?php echo base_url();?>/assets/images/earthLogo.png" />
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.4.3/dist/css/foundation.min.css" integrity="sha256-GSio8qamaXapM8Fq9JYdGNTvk/dgs+cMLgPeevOYEx0= sha384-wAweiGTn38CY2DSwAaEffed6iMeflc0FMiuptanbN4J+ib+342gKGpvYRWubPd/+ sha512-QHEb6jOC8SaGTmYmGU19u2FhIfeG+t/hSacIWPpDzOp5yygnthL3JwnilM7LM1dOAbJv62R+/FICfsrKUqv4Gg==" crossorigin="anonymous">
	
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet"> 
	
	<link href="<?php echo base_url();?>/assets/css/style.css" rel="stylesheet" />
	

<title>
Earth Kingdom Group Page
</title>


<style>
#hero {
	background-image: url(<?php print base_url(); ?>assets/images/mountain.png);
}
@media only screen and (max-width: 420px) {
	#hero {
		background-size: 110%;
	}
	
}
</style>
</head>

<body>

	<div class="grid-container full">		
		<div class="grid-x" id="header">
			<h4 class="medium-6" id="title">
			<a id="logo" href="<?php echo base_url()?>">Earth Kingdom</a>
			</h4>
			
			<div class="medium-6" id="signIn">
			
			<?php
			
			if(!isset($_SESSION['user'])) {
				echo "<h4><a href='".site_url('Home/SignIn')."'>Log In</a></h4>";
			} else {
				$this->load->view('LogOut');
			}
			
			?>
					
				
			</div>
		</div>
