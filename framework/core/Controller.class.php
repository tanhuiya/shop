<?php
	/**
	* 
	*/
	class Controller
	{
		public function jump($url,$message,$wait=3){
			if($wait==0){
				header(url);
			}else{
				include CUR_VIEW_PATH."message.html";
			}
			exit();
		}
		
	}
?>