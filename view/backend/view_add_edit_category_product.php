<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">Add edit category_product</div>
		<div class="panel-body">
			<form class="form-horizontal" method="post" action="<?php echo $form_action; ?>">
				<div class="form-group">
					<label class="col-md-2">Name</label>
					<div class="col-md-10">
					<input type="text" value="<?php echo isset($arr->c_name)?$arr->c_name:""; ?>" name="c_name" required class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2"></label>
					<div class="col-md-10">
					<input type="submit" value="Process" class="btn btn-primary">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>