<?php
/**
* 
*/
class BrandController extends Controller
{
	
	public function indexAction(){
		$brandModel = new BrandModel("brand");
		$brands = $brandModel->getBrands();
		require CUR_VIEW_PATH.'brand_list.html';
	}
	public function addAction(){
		require CUR_VIEW_PATH.'brand_add.html';

	}
	public function insertAction(){
		$brandModel = new BrandModel("brand");
		$data["brand_name"]=$_POST["brand_name"];
		$data["url"]=isset($_POST["url"])? $_POST["url"]:"" ;
		$data["logo"]=isset($_POST["logo"])? $_POST["logo"]:"" ;
		$data["brand_desc"]=isset($_POST["brand_desc"])? $_POST["brand_desc"]:"";
		$data["sort_order"]=$_POST["sort_order"];
		$data["is_show"]=$_POST["is_show"];
		if($data["brand_name"]==""||empty($data["brand_name"])){
			$this->jump("index.php?p=admin&c=brand&a=add","品牌名不能为空","2.0");
			return;
		}
		if($brandModel->insert($data)){
			$this->jump("index.php?p=admin&c=brand&a=index","添加成功","1.0");
		}else{
			$this->jump("index.php?p=admin&c=brand&a=add","添加失败","2.0");
		}
	}
	public function editAction(){
		$brandModel = new BrandModel("brand");
		$brand_id = $_GET["brand_id"];
		$brand = $brandModel->selectByPk($brand_id);
		require CUR_VIEW_PATH.'brand_edit.html';
	}
	public function updateAction(){
		$brandModel = new BrandModel("brand");
		$data["brand_id"]=$_POST["brand_id"];
		$data["brand_name"]=$_POST["brand_name"];
		$data["url"]=$_POST["url"];
		$data["logo"]= isset($_POST["logo"])?$_POST["logo"]:"";
		$data["brand_desc"]=isset($_POST["brand_desc"])?$_POST["brand_desc"]:"";
		$data["sort_order"]=isset($_POST["sort_order"])?$_POST["sort_order"]:"";
		$data["is_show"]=$_POST["is_show"];
		if($data["brand_name"]==""||empty($data["brand_name"])){
			$this->jump("index.php?p=admin&c=brand&a=add","品牌名不能为空","2.0");
			return;
		}
		if($brandModel->update($data)){
			$this->jump("index.php?p=admin&c=brand&a=index","更新成功","1.0");
		}else{
			$this->jump("index.php?p=admin&c=brand&a=edit&brand_id=".$_POST["brand_id"],"更新失败","10.0");
		}
	}
	public function deleteAction(){
		$brandModel = new BrandModel("brand");
		$brand_id=$_GET["brand_id"];
		if($brandModel->delete($brand_id)){
			$this->jump("index.php?p=admin&c=brand&a=index","删除成功","1.0");
		}else{
			$this->jump("index.php?p=admin&c=brand&a=index","删除失败","1.0");
		}
	}
}
?>