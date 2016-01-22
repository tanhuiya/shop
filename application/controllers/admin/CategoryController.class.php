<?php
	class CategoryController extends Controller{
		public function indexAction(){

		}
		public function addAction(){
			include CUR_VIEW_PATH."add_cat.html";
		}
		public function insertAction(){
			$cateModel = new CategoryModel("category");
			$data["cat_name"]=$_POST["cat_name"];
			$data["parent_id"]=$_POST["parent_id"];
			$data["unit"]=$_POST["unit"];
			$data["sort_order"]=$_POST["sort_order"];
			$data["ishow"]=$_POST["ishow"];
			$data["cat_desc"]=$_POST["cat_desc"];
			// if ($data["cat_name"]=="") {
			// 	$this->jump()
			// }
			$cateModel->insert($data);
		}
	}
?>