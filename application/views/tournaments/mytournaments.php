		<div class="container">
			<div class="row gap-2">
				<div class="col-md-12 col-sm-12 col-xs-12 bg-secondary">
					<ul class="nav nav-tabs">
						<li class="active"><a href="<?php echo base_url('index.php/tournaments');?>">My Tournaments</a></li>
						<li><a href="<?php echo base_url('index.php/tournaments/create');?>">Create a Tournament</a></li>
					</ul>
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
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>NAME</th>
								<th>DATE AND TIME</th>
								<th>SLOTS</th>
								<th>STATUS</th>
								<th>REQUETS</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($table as $items) {
							?>
							<tr>
								<td><?php echo $items->tournament_id; ?></td>
								<td><?php echo $items->name; ?></td>
								<td><?php echo $items->datetime; ?></td>
								<td>#/<?php echo $items->slots; ?></td>
								<td><?php echo $items->status; ?></td>
								<td>on progress</td>
							</tr>
							<?php 
								} 
							 ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>