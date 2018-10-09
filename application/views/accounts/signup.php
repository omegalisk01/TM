		<div class="container">
			<div class="row gap-2">
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 bg-secondary">
					<div class="col-md-10 col-md-offset-1">
						<h2 class="bold text-center">SIGN UP</h2>
						<hr class="footer-line">
						<form action="<?php echo base_url();?>accounts/signup" method="POST">
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
							<div class="form-group">
								<label for="username">USERNAME</label>
								<input type="text" class="form-control" name="username" value="<?php echo set_value('username');?>">
								<?php echo form_error('username'); ?>
							</div>
							<div class="form-group">
								<label for="password">PASSWORD</label>
								<input type="password" class="form-control" name="password" value="<?php echo set_value('password');?>">
								<?php echo form_error('password'); ?>
							</div>
							<div class="form-group">
								<label for="password">CONFIRM PASSWORD</label>
								<input type="password" class="form-control" name="cpass" value="<?php echo set_value('cpass');?>">
								<?php echo form_error('cpass'); ?>
							</div>
							<div class="form-group">
								<label for="email">EMAIL</label>
								<input type="email" class="form-control" name="email" value="<?php echo set_value('email');?>">
								<?php echo form_error('email'); ?>
							</div>
							<div class="form-group">
								<label for="nickname">NICKNAME</label>
								<input type="text" class="form-control" name="nickname" value="<?php echo set_value('nickname');?>">
								<?php echo form_error('nickname'); ?>
							</div>
							<?php
								if (isset($_SESSION['error']))
								{
									echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
									unset($_SESSION['error']);
								}
							?>
							<div class="form-group gap-bottom-1">
								<button type="submit" class="btn btn-red pull-right btn-lg">SIGN UP</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
