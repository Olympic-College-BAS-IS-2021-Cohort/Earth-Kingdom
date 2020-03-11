<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
.link:hover {
	background-color: gray;
	color: white;
}
</style>
			<h4 data-open="reveal" id="signInText">
			<button class="button secondary" type="button" data-toggle="dropdown"><b>Hello, <?php echo $_SESSION['user'];?>!</b></button>
			<div class="dropdown-pane" id="dropdown" data-dropdown>
			<a href="<?php echo site_url('Home/profileView')?>" class="link">Update Profile</a>
			<br />
			<a href="<?php echo site_url('Home/sessionDestroy');?>" class="link">Log Out</a>
			<br />
			<?php
			if($this->aauth->is_Admin()) {
				echo "<a href=".site_url('Admin/manageAccounts')." class='link'>Manage Accounts</a>";
			}
			?>
			</div>
			</h4>
			