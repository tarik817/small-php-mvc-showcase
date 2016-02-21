
<?php include_once('../app/views/default/top.php'); ?>
<div class="row">
	<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
		<div class="panel panel-default">
			  <div class="panel-body">
					<form enctype="multipart/form-data" method="post" action="<?php echo BASE_URL . '/home/add' ?>">
					  <input name="user_id" type="text" class="hidden" value="<?php echo $user['id'] ?>">
					  <div class="form-group">
					    <label >Message</label>
					    <input id="description" name="description" class="form-control">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputFile">File input</label>
					    <input name="files[]" type="file" id="exampleInputFile">
					  </div>
					  <button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
			<hr>
			<div id="board">
			<?php foreach ($data['posts'] as $value) { ?>
				<div class="panel panel-default" style="margin:5px;">
					<div class="panel-body">
						<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
						<input type="text" class="hidden user_id" value="<?php echo $value['user_id']; ?>">
						<input type="text" class="hidden post_id" value="<?php echo $value['id']; ?>">
						<p><?php echo $value['description']; ?></p>

							<?php if (json_decode($value['file'])){ 
									$t = json_decode($value['types']);
									$file = json_decode($value['file']);
							?>
							<div class="well well-sm"> 
								<a href="<?php echo $file[0]; ?>" download>Download</a> 
								<small class="pull-right">type: <strong><?php echo $t[0]; ?></strong></small>
							</div>
						<?php } ?>
						<small>author: <strong><?php echo $value['name']; ?></strong></small>
						<small class="pull-right">create date: <strong><?php echo $value[5]; ?></strong></small>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>

</div>
<div class="hidden" id='urls'>
	<input id="remove_url" type="text" value="<?php echo BASE_URL . '/home/remove'; ?>">
</div>
<?php
include_once('../app/views/default/bottom.php');?>