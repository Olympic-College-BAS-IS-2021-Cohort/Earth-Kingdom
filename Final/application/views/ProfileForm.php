<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script>
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		
</script>

<style>
body {
	background-color: rgb(117,175,150);
	background-size: 100%;
	background-repeat: no-repeat;
	color: black;
}

#profile {
	margin: 2% 0 2% 0;
	height: 100%;
	background-color: white;
	padding: 2%;
	box-shadow:  0px 5px 10px black;
	
}
label {
	color: black !important;
	font-weight: bold;
	margin-top: 5%;
}
.maxContentPost {
	text-align: right;
}
@media only screen and (max-width: 1023px) {
	#profile {
		margin: 2% 5% 2% 5%;
	}
	
}


</style>
						


	<div class="grid-x">
		<div class="medium-3"></div>
			<div class="large-6" id="profile">

				<form action="<?php echo site_url('Home/updateProfile');?>" method="POST" enctype="multipart/form-data" id="profileForm">
					
					<label>Personal Image (jpg and png only!)</label>
					<div class="grid-x" id="formImage">
						<div class="medium-6"><img src="<?php echo base_url();?>assets/images/personal/<?php echo $bioInfo[0]['image'];?>" class="bioImage"></div>
						<div class="medium-6"><img id="preview" class="bioImage" src="#" alt="Image Preview" /></div>
					</div>
					<input type='file' onchange="readURL(this)" name="userfile" accept="image/png,image/jpg,image/jpeg" />
					

					<label>Username (to change your username, please contact the Administrator)</label>
					<input type="text" name="username" value="<?php echo set_value('username', $bioInfo[0]['username']);?>" disabled />

					<label>Name</label>
					<input type="text" name="name" value="<?php echo set_value('name', $bioInfo[0]['name']);?>" />
					
					<label>Summary (320 character limit)</label>
					<input type="text" name="summary" maxlength="320" value="<?php echo set_value('summary', $bioInfo[0]['summary']);?>" />		
					
					<label>Bio (1000 character limit)</label>
					<textarea name="bio" rows="3" class="richField"><?php echo set_value('bio', $bioInfo[0]['bio']);?></textarea>
					  
					<label>Email (your email is hidden from public view)</label>
					<input type="text" name="email" value="<?php echo set_value('email', $bioInfo[0]['email']);?>" />
					
					<label>Social Links</label>
					<textarea name="socialLinks" class="richField"><?php echo set_value('socialLinks', $bioInfo[0]['socialLinks']);?></textarea>

					<label>Experience (1000 character limit)</label>
					<textarea name="experience" class="richField"><?php echo set_value('experience', $bioInfo[0]['experience']);?></textarea>

					<label>Skills (1000 character limit)</label>
					<textarea name="skills" class="richField"><?php echo set_value('skills', $bioInfo[0]['skills']);?></textarea>
					
					<label>Certification (1000 character limit)</label>
					<textarea name="certification" class="richField"><?php echo set_value('certification', $bioInfo[0]['certification']);?></textarea>
					
					<button class="secondary button">Update Profile</button>
				</form>
				

				
			</div>
		<div class="medium-3"></div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="<?php echo base_url().'assets/foundation/js/custom.modernizr.js';?>"></script>

	<script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.4.3/dist/js/foundation.min.js" integrity="sha256-mRYlCu5EG+ouD07WxLF8v4ZAZYCA6WrmdIXyn1Bv9Vk= sha384-KzKofw4qqetd3kvuQ5AdapWPqV1ZI+CnfyfEwZQgPk8poOLWaabfgJOfmW7uI+AV sha512-0gHfaMkY+Do568TgjJC2iMAV0dQlY4NqbeZ4pr9lVUTXQzKu8qceyd6wg/3Uql9qA2+3X5NHv3IMb05wb387rA==" crossorigin="anonymous"></script>	
	
	<script src="<?php echo base_url();?>assets/summernote/summernote-lite.js"></script>
	<link href="<?php echo base_url();?>assets/summernote/summernote-lite.css" rel="stylesheet" />
	
	
	 <script>
      $('.richField').summernote({
        placeholder: '',
        toolbar: [
          ['font', ['bold', 'italic', 'underline', 'clear']],
		  ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['help']]
        ],
		callbacks: {
                    onKeydown: function (e) { 
                        var t = e.currentTarget.innerText; 
                        if (t.trim().length >= 1000) {
                            //delete keys, arrow keys, copy, cut, select all
                            if (e.keyCode != 8 && !(e.keyCode >=37 && e.keyCode <=40) && e.keyCode != 46 && !(e.keyCode == 88 && e.ctrlKey) && !(e.keyCode == 67 && e.ctrlKey) && !(e.keyCode == 65 && e.ctrlKey))
                            e.preventDefault(); 
                        } 
                    },
                    onKeyup: function (e) {
                        var t = e.currentTarget.innerText;
                        $('.maxContentPost').text(1000 - t.trim().length);
                    },
                    onPaste: function (e) {
                        var t = e.currentTarget.innerText;
                        var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                        e.preventDefault();
                        var maxPaste = bufferText.length;
                        if(t.length + bufferText.length > 1000){
                            maxPaste = 1000 - t.length;
                        }
                        if(maxPaste > 0){
                            document.execCommand('insertText', false, bufferText.substring(0, maxPaste));
                        }
                        $('.maxContentPost').text(1000 - t.length);
                    }
                }
      });
    </script>
	
	<script>
	$(document).foundation();
	</script>
	
	</div>
</body>
</html>