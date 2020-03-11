<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(isset($_SESSION['Message'])) {
	
echo	" <div class='alert'>
		  <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>".$_SESSION['Message']."</div>";
}

?>