<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">Add edit product</div>
		<div class="panel-body">
			<form class="form-horizontal" method="post" action="<?php echo $form_action; ?>" enctype="multipart/form-data">
				<div class="form-group">
					<label class="col-md-2">Name</label>
					<div class="col-md-10">
					<input type="text" value="<?php echo isset($arr->c_name)?$arr->c_name:""; ?>" name="c_name" required class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Category</label>
					<div class="col-md-10">
					<select name="fk_category_product_id">
					<?php 
						$category = $this->model->fetch("select * from tbl_category_product");
						foreach($category as $rows)
						{
					 ?>
						<option <?php echo isset($arr->fk_category_product_id)&&$arr->fk_category_product_id==$rows->pk_category_product_id?"selected":""; ?> value="<?php echo $rows->pk_category_product_id; ?>"><?php echo $rows->c_name; ?></option>
					<?php } ?>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2"></label>
					<div class="col-md-10">
					<input type="checkbox" <?php echo isset($arr->c_hotproduct)&&$arr->c_hotproduct==1?"checked":""; ?> name="c_hotproduct"> Hot product
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Description</label>
					<div class="col-md-10">
					<textarea name="c_description">
						<?php echo isset($arr->c_description)?$arr->c_description:""; ?>
					</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('c_description');
					</script>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2">Content</label>
					<div class="col-md-10">
					<textarea name="c_content">
						<?php echo isset($arr->c_content)?$arr->c_content:""; ?>
					</textarea>
					<script type="text/javascript">
						CKEDITOR.replace('c_content');
					</script>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2"></label>
					<div class="col-md-10">
					<input type="file" name="c_img">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2"></label>
					<div class="col-md-10">
					<?php if(isset($arr->c_img)&&file_exists("public/upload/product/".$arr->c_img&&$arr->c_img!="")){ ?>
					<img src="public/upload/product/<?php echo $arr->c_img; ?>" style="max-width: 100px;">
					<?php } ?>
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