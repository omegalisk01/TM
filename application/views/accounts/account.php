		<div class="container">
			<div class="row gap-2">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 bg-secondary">
					<div class="col-md-10 col-md-offset-1">
						<h2 class="bold">ACCOUNT</h2>
						<hr class="footer-line">
						<div class="row">
							<div class="col-md-7">
								<form action="<?php echo base_url();?>index.php/accounts/edit">
									<div class="form-group">
										<label for="username">USERNAME</label>
										<input type="text" class="form-control" name="username" value="<?php echo set_value('username');?>" maxlength="25">
										<?php echo form_error('username'); ?>
									</div>
									<div class="form-group row">
										<div class="col-md-6">
											<label for="password">PASSWORD</label>
											<input type="password" class="form-control" name="password" value="<?php echo set_value('password');?>" maxlength="100">
											<?php echo form_error('password'); ?>
										</div>
										<div class="col-md-6">
											<label for="confirm_password">CONFIRM PASSWORD</label>
											<input type="confirm_password" class="form-control"  name="cpass" value="<?php echo set_value('cpass');?>" maxlength="100">
											<?php echo form_error('cpass'); ?>
										</div>
									</div>
									<div class="form-group">
										<label for="email">EMAIL</label>
										<input type="email" class="form-control"  name="email" value="<?php echo set_value('email');?>" maxlength="100">
										<?php echo form_error('email'); ?>
									</div>
									<div class="form-group">
										<label for="nickname">NICKNAME</label>
										<input type="text" class="form-control" name="nickname" value="<?php echo set_value('nickname');?>" maxlength="25">
										<?php echo form_error('nickname'); ?>
									</div>
									<div class="form-group row">
										<div class="col-md-5">
											<label for="firstname">FIRST NAME</label>
											<input type="text" class="form-control" name="firstname" value="<?php echo set_value('firstname');?>" maxlength="50">
											<?php echo form_error('firstname'); ?>
										</div>
										<div class="col-md-7">
											<label for="lastname">LAST NAME</label>
											<input type="text" class="form-control" name="lastname" value="<?php echo set_value('lastname');?>" maxlength="50">
											<?php echo form_error('lastname'); ?>
										</div>
									</div>
									<div class="form-group">
										<label for="phone">PHONE</label>
										<input type="text" class="form-control" name="phone" value="<?php echo set_value('phone');?>" maxlength="20">
										<?php echo form_error('phone'); ?>
									</div>
									<br>
									<div class="form-group">
										<button type="button" id="edit_btn" class="btn btn-black2 btn-lg" onclick="edit();">EDIT PROFILE</button>
										<button type="submit" id="ok_btn" class="btn btn-red btn-lg hidden">CONFIRM</button>
										<button type="button" id="cancel_btn" class="btn btn-black2 btn-lg hidden" onclick="cancel();">CANCEL</button>
									</div>
								</form>
							</div>
							<div class="col-md-4 col-md-offset-1">
								<form action="<?php echo base_url();?>index.php/accounts/edit_pic">
									<img class="img-circle img-responsive" src="<?php echo base_url($_SESSION['profil_picture_url']);?>">
									<br>
									<div class="form-group">
										<label for="file" id="edit_btn2" class="btn btn-black2 " onclick="edit_pic();">EDIT PICTURE</label>
										<input class="hidden" type="file" name="file" id="file" accept="image/jpeg">
										<button type="submit" id="ok_btn2" class="btn btn-red hidden">CONFIRM</button>
										<button type="button" id="cancel_btn2" class="btn btn-black2 hidden" onclick="cancel_pic();">CANCEL</button>
									</div>
								</form>
							</div>
						</div>
						<?php
							if (isset($_SESSION['error'])){	
								echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
							}
						?>
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
				var ids = ["username", "password", "confirm_password", "email", "nickname", "first_name", "last_name", "phone"];
				for (var i = ids.length - 1; i >= 0; i--) {
					document.getElementById(ids[i]).disabled = false;
				}
			}
			function cancel() {
				document.getElementById("edit_btn").classList.remove("hidden");
				document.getElementById("ok_btn").classList.add("hidden");
				document.getElementById("cancel_btn").classList.add("hidden");
				var ids = ["username", "password", "confirm_password", "email", "nickname", "first_name", "last_name", "phone"];
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
			}
		</script>