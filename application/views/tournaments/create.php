		<div class="container">
			<div class="row gap-2">
				<div class="col-md-12 col-sm-12 col-xs-12 bg-secondary">
					<ul class="nav nav-tabs">
						<li><a href="<?php echo base_url('index.php/tournaments');?>">My Tournaments</a></li>
						<li class="active"><a href="<?php echo base_url('index.php/tournaments/create');?>">Create a Tournament</a></li>
					</ul>
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
						<form action="<?php echo base_url('index.php/tournaments/add');?>" method="POST">
							<div class="row gap-1">
								<div class="col-md-8">
									<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
									<div class="form-group">
										<label for="name">TOURNAMENT NAME<label>*</label></label>
										<input type="text" class="form-control" name="name" id="name" maxlength="25">
										<?php echo form_error('name'); ?>
									</div>
									<div class="form-group row">
										<div class="col-md-6">
										<label for="date">DATE*</label>
										<input type="date" class="form-control"  name="date" id="date">
										<?php echo form_error('date'); ?>
										</div>
										<div class="col-md-6">
										<label for="date">TIME*</label>
										<input type="time" class="form-control"  name="time" id="time">
										<?php echo form_error('time'); ?>
										</div>
									</div>
									<div class="form-group">
										<label for="description">DESCRIPTION*</label>
										<textarea class="form-control" rows="7" name="description" id="description"></textarea>
										<?php echo form_error('description'); ?>
									</div>
									<div class="form-group">
										<label for="website">WEBSITE</label>
										<input type="text" class="form-control" name="website" id="website" maxlength="100">
										<?php echo form_error('website'); ?>
									</div>
									<div class="form-group row">
										<div class="col-md-3">
											<label for="players">PLAYER PER TEAM*</label>
											<input type="number" class="form-control" name="players" id="players">
											<?php echo form_error('players'); ?>
										</div>
										<div class="col-md-9">
											<label for="slots">SLOTS TEAM*</label>
											<br>
											<label class="radio-inline"><input type="radio" name="slots">2 Teams</label>
											<label class="radio-inline"><input type="radio" name="slots">4 Teams</label>
											<label class="radio-inline"><input type="radio" name="slots">8 Teams</label>
											<label class="radio-inline"><input type="radio" name="slots">16 Teams</label>
											<label class="radio-inline"><input type="radio" name="slots">32 Teams</label>
											<label class="radio-inline"><input type="radio" name="slots">64 Teams</label>
											<?php echo form_error('slots'); ?>
										</div>
									</div>
									<div class="form-group">
										<p class="text-muted">*Required field</p>
									</div>
									<div class="form-group">
										<button type="submit" id="ok_btn" class="btn btn-red btn-lg">CONFIRM</button>
									</div>
								</div>
								<div class="col-md-3 col-md-offset-1">
									<label>LOGO</label><div class="form-group">
									<img class="img-thumbnail img-responsive" src="<?php echo base_url('assets/images/no_logo.jpg');?>" id="logo"></div>
									<div class="form-group">
										<label for="file" id="edit_btn2" class="btn btn-black2">EDIT LOGO</label>
										<input class="hidden" type="file" name="file" id="file" accept="image/jpeg">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#logo').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}

			$("#file").change(function() {
				readURL(this);
			});
		</script>