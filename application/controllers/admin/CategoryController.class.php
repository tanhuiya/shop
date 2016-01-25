<?php
	class CategoryController extends Controller{
		public function indexAction(){
			$catmodel = new CategoryModel("category");
			$cats=$catmodel->getCats();
			// var_dump($cats);
			// exit(1);
			// var_dump($cats);
			// exit(1);
			require CUR_VIEW_PATH."cat_list.html";
		}
		public function addAction(){
			$catmodel = new CategoryModel("category");
			$cats=$catmodel->getCats();
			include CUR_VIEW_PATH."cat_add.html";
		}
		public function insertAction(){
			$cateModel = new CategoryModel("category");
			$data["cat_name"]=$_POST["cat_name"];
			$data["parent_id"]=$_POST["parent_id"];
			$data["unit"]=$_POST["unit"];
			$data["sort_order"]=$_POST["sort_order"];
			$data["is_show"]=$_POST["is_show"];
			$data["cat_desc"]=$_POST["cat_desc"];

			if ($data["cat_name"]=="") {
				$this->jump("index.php?p=admin&c=Category&a=add","类型名不能为空",$wait=0.5);
				return;
			}
			if($cateModel->insert($data)){
				$this->jump("index.php?p=admin&c=Category&a=index","添加成功",$wait=1);
			}else{
				$this->jump("index.php?p=admin&c=Category&a=add","添加失败",$wait=2);
			}
		}
		public function editAction(){
			// $catmodel = new CategoryModel("category");
			// $cat_id=$_GET["cat_id"];
			// $cat= $catmodel->selectByPk($cat_id);

		}
		public function deleteAction(){
			$catmodel = new CategoryModel("category");
			$catmodel = new CategoryModel("category");
			$cat_id=$_GET["cat_id"];
			if($catmodel->delete($cat_id)){
				$this->jump("index.php?p=admin&c=Category&a=index","删除成功",$wait=1);
			}else{
				$this->jump("index.php?p=admin&c=Category&a=index","删除失败",$wait=1);
			}
		}
	}
?>