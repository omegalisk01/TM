		<div class="container">
			<div class="row gap-2">
				<div class="col-md-4 col-md-offset-4 bg-secondary">
					<h2 class="bold text-center">LOGIN</h3>
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
						<hr class="footer-line">
						<div class="checkbox">
							<label><input type="checkbox"> Remember me</label>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-red btn-block">LOGIN</button>
						</div>
					</form>
				</div>
			</div>
		</div>