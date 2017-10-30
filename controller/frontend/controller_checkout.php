<?php 
	class controller_checkout extends controller{
		public function __construct(){
			parent::__construct();
			//kiem tra, neu user chua dang nhap (hoac session timeout) thi yeu cau dang nhap
			if(isset($_SESSION["customer_id"]) == false)
				echo "<script language='javascript'>location.href='index.php?controller=login';</script>";
			$customer_id = $_SESSION["customer_id"];
			//them ban ghi vao tbl_order va lay order_id vua them vao, khoa ngoai la customer_id
			$gia = 0;	
			foreach($_SESSION["cart"] as $product){
				$gia = $gia + $product["c_price"]*$product["number"];
			}
			//insert thong tin vao tbl_order
			$order_id = $this->model->execute("insert into tbl_order(customer_id,ngaymua,gia,trangthai) values($customer_id,now(),$gia,0)");
			//them ban ghi vao tbl_order_detail voi khoa ngoai la order_id
			foreach($_SESSION["cart"] as $product){
				$fk_product_id=$product["pk_product_id"];
				$c_number=$product["number"];
				$this->model->execute("insert into tbl_order_detail(order_id,fk_product_id,c_number) values($order_id,$fk_product_id,$c_number)");
			}
			//xoa gio hang 
			 $_SESSION['cart'] = array();
			 echo "<script language='javascript'>location.href='index.php?controller=cart';</script>";
		}
	}
	new controller_checkout();
 ?>