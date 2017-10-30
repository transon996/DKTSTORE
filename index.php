<?php
	//start session
	session_start(); 
	//load file confit
	include "config.php";
	//load model
	include "application/model.php";
	//load controller
	include "application/controller.php";
	$controller = isset($_GET["controller"])?$_GET["controller"]:"home";
	//gan thanh duong dan vat ly
	$controller = ($controller!="")?"controller_$controller.php":"";
	//load layout admin
	include "view/frontend/view_layout.php";
 ?>