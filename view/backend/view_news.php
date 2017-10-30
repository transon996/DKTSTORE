<div class="col-md-10 col-md-offset-1">
	<div style="margin-bottom: 5px;"><a href="admin.php?controller=add_edit_news&act=add" class="btn btn-primary">Add</a></div>
	<div class="panel panel-primary">
		<div class="panel-heading">news</div>
		<div class="panel-body">
			<table class="table table-hover table-bordered">
				<tr>
					<th style="width: 100px;">Ảnh</th>
					<th>Tiêu đề</th>
					<th style="width: 100px;">Tin nổi bật</th>
					<th style="width: 100px;"></th>
				</tr>
				<?php 
					foreach($arr as $rows)
					{
				 ?>
				<tr>
					<td style="text-align: center;">
						<?php if($rows->c_img != "" && file_exists("public/upload/news/".$rows->c_img)){ ?>
						<img src="public/upload/news/<?php echo $rows->c_img; ?>" style="max-width: 100px;">
						<?php } ?>
					</td>
					<td><?php echo $rows->c_name; ?></td>
					<td style="text-align: center;">
						<?php if($rows->c_hotnews==1){ ?>
						<span class="glyphicon glyphicon-check"></span>
						<?php } ?>
					</td>
					<td style="text-align: center;">
						<a href="admin.php?controller=add_edit_news&act=edit&id=<?php echo $rows->pk_news_id; ?>">Edit</a>&nbsp;&nbsp;
						<a href="admin.php?controller=news&act=delete&id=<?php echo $rows->pk_news_id; ?>">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</table>
			<ul class="pagination" style="padding:0px; margin:0px;">
				<li><a href="#">Trang</a></li>
				<?php 
					for($i = 1; $i <= $num_page; $i++)
					{
				 ?>
				<li><a href="admin.php?controller=news&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>