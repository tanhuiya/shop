<?php
	class IndexController{
		public function indexAction(){
			include CUR_VIEW_PATH."index.html";
		}	
		public function topAction()
		{
			require CUR_VIEW_PATH."top.html";
		}
		public function dragAction(){
			require CUR_VIEW_PATH."drag.html";
		}
		public function menuAction(){
			require CUR_VIEW_PATH."menu.html";
		}
		public function mainAction(){
			require CUR_VIEW_PATH."main.html";
		}
	}
?>