<?php

/**
* 分类模型
*/
class CategoryModel extends Model
{
	public function getCats(){
		$sql="Select * from {$this->table}";
		$result=$this->db->getAll($sql);
		// return $result;
		return $this->tree($result);
	}
	public function tree($arr,$p_id=0,$level=0){
		static $tree = array();
		foreach ($arr as $v) {
			if($v["parent_id"]==$p_id){
				$v["level"]=$level;
				$tree[]=$v;
				$this->tree($arr,$v["cat_id"],$v["level"]+1);
			}
		}
		return $tree;
	}
}
?>