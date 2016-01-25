<?php
	class TypeController extends Controller{
		public function indexAction(){
			
			require CUR_VIEW_PATH.'good_type_list.html';
		}
		public function addAction(){
			include CUR_VIEW_PATH.'good_type_add.html';
		}
		public function editAction(){
			include CUR_VIEW_PATH.'good_type_edit.html';
		}
		public function savaAction(){
		}
	}
?>
