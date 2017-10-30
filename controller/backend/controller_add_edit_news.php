<?php 
	class controller_add_edit_news extends controller{
		public function __construct(){
			parent::__construct();
			$act = isset($_GET["act"])?$_GET["act"]:"";
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			switch($act){
				case "edit":
					$form_action = "admin.php?controller=add_edit_news&act=do_edit&id=$id";
					//lay ban ghi co id truyen vao
					$arr = $this->model->fetch_one("select * from tbl_news where pk_news_id=$id");
					include "view/backend/view_add_edit_news.php";
				break;
				case "do_edit":
					$c_name = $_POST["c_name"];
					$c_hotnews = isset($_POST["c_hotnews"])?1:0;
					$c_description = $_POST["c_description"];
					$c_content = $_POST["c_content"];
					//update ban ghi co id truyen vao
					$this->model->execute("update tbl_news set c_name='$c_name',c_hotnews=$c_hotnews,c_description='$c_description',c_content='$c_content' where pk_news_id=$id");
					//kiem tra, neu user chon anh thi thuc hien upload anh
					if($_FILES["c_img"]["name"] != ""){
						//-------------
						//lay anh cu
						$arr_old_img = $this->model->fetch_one("select c_img from tbl_news where pk_news_id=$id");
						$old_img = isset($arr_old_img->c_img)?$arr_old_img->c_img:"";
						if($old_img != "")
							unlink("public/upload/news/$old_img");
						//-------------
						$c_img = time().$_FILES["c_img"]["name"];
						//upload image
						move_uploaded_file($_FILES["c_img"]["tmp_name"], "public/upload/news/$c_img");
						//update c_img
						$this->model->execute("update tbl_news set c_img='$c_img' where pk_news_id=$id");				
					}
					header("location:admin.php?controller=news");
				break;
				case "add":
					$form_action = "admin.php?controller=add_edit_news&act=do_add";
					include "view/backend/view_add_edit_news.php";
				break;
				case "do_add":
					$c_name = $_POST["c_name"];
					$c_hotnews = isset($_POST["c_hotnews"])?1:0;
					$c_description = $_POST["c_description"];
					$c_content = $_POST["c_content"];
					$c_img = "";
					if($_FILES["c_img"]["name"] != ""){
						$c_img = time().$_FILES["c_img"]["name"];
						//upload image
						move_uploaded_file($_FILES["c_img"]["tmp_name"], "public/upload/news/$c_img");
					}
					$this->model->execute("insert into tbl_news(c_name,c_hotnews,c_description,c_content,c_img) values('$c_name',$c_hotnews,'$c_description','$c_content','$c_img')");
					header("location:admin.php?controller=news");
				break;
			}
		}
	}
	new controller_add_edit_news();
 ?>