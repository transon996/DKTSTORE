<?php 
	class controller_home extends controller{
		public function __construct(){
			parent::__construct();
			//--------	
			//san pham noi bat
			$arr_hot=$this->model->fetch("select * from tbl_product where c_hotproduct=1 order by pk_product_id desc limit 0,4");			
			//--------
			include "view/frontend/view_home.php";
		}
	}
	new controller_home();
 ?>