<?php

/**
* 分类模型
*/
class CategoryModel extends Model
{
	public function getCats(){
		$sql="Select * from {$this->table}";
		$result=$this->db->getAll();
		return $this->tree($result);
	}
	public function tree($arr,$parent_id=0){
		static $tree = array();
		foreach ($arr as $v) {
			if($v["cat_id"]==$parent_id){
				$tree[]=v;
				$this->tree(arr,$v["parent_id"]);
			}
		}
		return $tree;
	}
}
?>