
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
			<?php foreach ($data['posts'] as $value) { ?>
				<div class="panel panel-default" style="margin:5px;">
					<div class="panel-body">
						<p><?php echo $value['description']; ?></p>

						<?php if (json_decode($value['file'])){ 
								$t = json_decode($value['types']);
								$value = json_decode($value['file']);
						?>
							<div class="well well-sm"> <a href="<?php echo $value[0]; ?>" download>Download</a> <small class="pull-right">type: <strong><?php echo $t[0]; ?></strong></small></div>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>

</div>
<?php
include_once('../app/views/default/bottom.php');?>