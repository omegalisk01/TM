		<div class="container">
			<div class="row gap-2">
				<div class="col-md-6 col-md-offset-3 bg-secondary">
					<div class="col-md-10 col-md-offset-1">
						<h2 class="bold text-center">SIGN UP</h3>
						<hr class="footer-line">
						<form action="<?php echo base_url();?>index.php/accounts/login">
							<div class="form-group">
								<label for="username">USERNAME</label>
								<input type="text" class="form-control" id="username">
							</div>
							<div class="form-group">
								<label for="password">PASSWORD</label>
								<input type="password" class="form-control" id="password">
							</div>
							<div class="form-group">
								<label for="email">EMAIL</label>
								<input type="email" class="form-control" id="email">
							</div>
							<div class="form-group">
								<label for="nickname">NICKNAME</label>
								<input type="text" class="form-control" id="nickname">
							</div>
							<hr class="footer-line">
							<div class="form-group gap-1">
								<button type="submit" class="btn btn-red pull-right btn-lg">SIGN UP</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>