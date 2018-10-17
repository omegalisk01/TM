		<div class="container">
			<div class="row gap-2">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 bg-secondary">
					<div class="col-md-10 col-md-offset-1">
						<?php
			            	if (isset($_SESSION['message']))
			            	{
			            ?>
							<div class="alert alert-<?php echo $_SESSION['msg_type'];?> alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo $_SESSION['message'];unset($_SESSION['message']);unset($_SESSION['msg_type']);?>
							</div>
			            <?php
			            	}
			            ?>
						<h2 class="bold">ACCOUNT</h2>
						<hr class="footer-line">
						<div class="row">
							<div class="col-md-7">
								<form action="<?php echo base_url('index.php/accounts/editProfile');?>" method="POST">
									<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
									<div class="form-group">
										<label for="username">USERNAME</label>
										<input type="text" class="form-control" name="username" id="username" value="<?php echo $username;?>" maxlength="25" disabled>
										<?php echo form_error('username'); ?>
									</div>
									<div class="form-group">
										<label for="email">EMAIL</label>
										<input type="email" class="form-control"  name="email" id="email" value="<?php echo $email;?>" maxlength="100" disabled>
										<?php echo form_error('email'); ?>
									</div>
									<div class="form-group">
										<label for="nickname">NICKNAME</label>
										<input type="text" class="form-control" name="nickname" id="nickname" value="<?php echo $nickname;?>" maxlength="25" disabled>
										<?php echo form_error('nickname'); ?>
									</div>
									<div class="form-group row">
										<div class="col-md-5">
											<label for="firstname">FIRST NAME</label>
											<input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $first_name;?>" maxlength="50" disabled>
											<?php echo form_error('firstname'); ?>
										</div>
										<div class="col-md-7">
											<label for="lastname">LAST NAME</label>
											<input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $last_name;?>" maxlength="50" disabled>
											<?php echo form_error('lastname'); ?>
										</div>
									</div>
									<div class="form-group">
										<label for="phone">PHONE</label>
										<input type="text" class="form-control" name="phone" id="phone" value="<?php echo $phone?>" maxlength="20" disabled>
										<?php echo form_error('phone'); ?>
									</div>
									<div class="form-group">
										<button type="button" id="edit_btn" class="btn btn-black2 btn-lg" onclick="edit();">EDIT PROFILE</button>
										<button type="submit" id="ok_btn" class="btn btn-red btn-lg hidden">CONFIRM</button>
										<button type="button" id="cancel_btn" class="btn btn-black2 btn-lg hidden" onclick="cancel();">CANCEL</button>
									</div>
								</form>
								<br>
								<form action="<?php echo base_url('index.php/accounts/editPassword');?>" method="POST">
                                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
									<div class="form-group row">
										<div class="col-md-6">
											<label for="password">PASSWORD</label>
											<input type="password" class="form-control" name="password" id="password" maxlength="100" disabled>
											<?php echo form_error('password'); ?>
										</div>
										<div class="col-md-6">
											<label for="confirm_password">CONFIRM PASSWORD</label>
											<input type="password" class="form-control" name="cpass" id="cpass" maxlength="100" disabled>
											<?php echo form_error('cpass'); ?>
										</div>
									</div>
									<div class="form-group">
										<button type="button" id="edit_btn3" class="btn btn-black2 btn-lg" onclick="edit_pass();">CHANGE PASSWORD</button>
										<button type="submit" id="ok_btn3" class="btn btn-red btn-lg hidden">CONFIRM</button>
										<button type="button" id="cancel_btn3" class="btn btn-black2 btn-lg hidden" onclick="cancel_pass();">CANCEL</button>
									</div>
								</form>
							</div>
							<div class="col-md-4 col-md-offset-1">
								<form action="<?php echo base_url();?>index.php/accounts/edit_pic" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
									<img class="img-circle img-responsive" src="<?php echo base_url($_SESSION['profil_picture_url']);?>" id="pic">
									<br>
									<div class="form-group">
										<label for="file" id="edit_btn2" class="btn btn-black2 " onclick="edit_pic();">EDIT PICTURE</label>
										<input class="hidden" type="file" name="file" id="file">
										<button type="submit" name="upload" id="ok_btn2" class="btn btn-red hidden" value="true">CONFIRM</button>
										<button type="button" id="cancel_btn2" class="btn btn-black2 hidden" onclick="cancel_pic();" id="resetPic">CANCEL</button>
									</div>
								</form>
							</div>
						</div>
						<br>
					</div>
				</div>
			</div>
		</div>
		<script>
			function edit() {
				document.getElementById("edit_btn").classList.add("hidden");
				document.getElementById("ok_btn").classList.remove("hidden");
				document.getElementById("cancel_btn").classList.remove("hidden");
				var ids = ["nickname", "firstname", "lastname", "phone"];
				for (var i = ids.length - 1; i >= 0; i--) {
					document.getElementById(ids[i]).disabled = false;
				}
			}
			function cancel() {
				document.getElementById("edit_btn").classList.remove("hidden");
				document.getElementById("ok_btn").classList.add("hidden");
				document.getElementById("cancel_btn").classList.add("hidden");
				var ids = ["nickname", "firstname", "lastname", "phone"];
				for (var i = ids.length - 1; i >= 0; i--) {
					document.getElementById(ids[i]).disabled = true;
				}
			}			
			function edit_pic() {
				document.getElementById("edit_btn2").classList.add("hidden");
				document.getElementById("ok_btn2").classList.remove("hidden");
				document.getElementById("cancel_btn2").classList.remove("hidden");
			}
			function cancel_pic() {
				document.getElementById("edit_btn2").classList.remove("hidden");
				document.getElementById("ok_btn2").classList.add("hidden");
				document.getElementById("cancel_btn2").classList.add("hidden");
				document.getElementById("pic").src="<?php echo base_url($_SESSION['profil_picture_url']);?>";
			}
			function edit_pass() {
				document.getElementById("edit_btn3").classList.add("hidden");
				document.getElementById("ok_btn3").classList.remove("hidden");
				document.getElementById("cancel_btn3").classList.remove("hidden");
				var ids = ["password", "cpass"];
				for (var i = ids.length - 1; i >= 0; i--) {
					document.getElementById(ids[i]).disabled = false;
				}
			}
			function cancel_pass() {
				document.getElementById("edit_btn3").classList.remove("hidden");
				document.getElementById("ok_btn3").classList.add("hidden");
				document.getElementById("cancel_btn3").classList.add("hidden");
				var ids = ["password", "cpass"];
				for (var i = ids.length - 1; i >= 0; i--) {
					document.getElementById(ids[i]).disabled = true;
				}
			}
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#pic').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			$("#file").change(function() {
				readURL(this);
			});
		</script>