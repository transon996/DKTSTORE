<?php 
	class controller_add_edit_user extends controller{
		public function __construct(){
			parent::__construct();
			$act = isset($_GET["act"])?$_GET["act"]:"";
			$id = isset($_GET["id"])&&is_numeric($_GET["id"])?$_GET["id"]:0;
			switch($act){
				case "edit":
					$form_action = "admin.php?controller=add_edit_user&act=do_edit&id=$id";
					//lay ban ghi co id truyen vao
					$arr = $this->model->fetch_one("select * from tbl_user where pk_user_id=$id");
					//load view
					include "view/backend/view_add_edit_user.php";
				break;
				case "do_edit":
					$c_fullname = $_POST["c_fullname"];
					$c_password = $_POST["c_password"];
					//update fullname
					$this->model->execute("update tbl_user set c_fullname='$c_fullname' where pk_user_id=$id");
					//neu user thay doi password thi update password
					if($c_password != ""){
						$c_password = md5($c_password);
						$this->model->execute("update tbl_user set c_password='$c_password' where pk_user_id=$id");
					}
					header("location:admin.php?controller=user");
				break;
				case "add":
					$form_action = "admin.php?controller=add_edit_user&act=do_add";
					//load view
					include "view/backend/view_add_edit_user.php";
				break;
				case "do_add":
					$c_username = $_POST["c_username"];
					$c_fullname = $_POST["c_fullname"];
					$c_password = $_POST["c_password"];
					$c_password = md5($c_password);
					//insert ban ghi vao csdl
					$this->model->execute("insert into tbl_user(c_username,c_password,c_fullname) values('$c_username','$c_password','$c_fullname')");
					header("location:admin.php?controller=user");
				break;
			}
		}
	}
	new controller_add_edit_user();
 ?>