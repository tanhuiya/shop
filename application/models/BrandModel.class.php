<?php
/**
* 
*/
class BrandModel extends Model
{
	
	public function getBrands(){

		$sql = "select * from {$this->table}";
		$brands= $this->db->getAll($sql);
		return $brands;
	}
}
?>