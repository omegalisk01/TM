		<div class="container">
			<div class="row gap-2">
				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12 bg-secondary">
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
					<h2 class="bold text-center">LOGIN</h2>
					<hr class="footer-line">
					<form action="<?php echo base_url();?>index.php/accounts/login" method="post">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<div class="form-group">
							<label for="username">USERNAME</label>
							<input type="text" class="form-control" name="username">
                            <?php echo form_error('username'); ?>
						</div>
						<div class="form-group">
							<label for="password">PASSWORD</label>
							<input type="password" class="form-control" name="password">
                            <?php echo form_error('password'); ?>
						</div>
						<hr class="footer-line">
						<div class="form-group">
							<button type="submit" class="btn btn-red btn-block">LOGIN</button>
						</div>
					</form>
				</div>
			</div>
		</div>