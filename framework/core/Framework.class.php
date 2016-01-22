<?php
	/**
	* 
	*/
	class Framework 
	{
		public static function run(){
			// echo "running";
			ini_set("display_errors" , "on");
			self::init();
			self::autoload();
			self::route();

		}
		public static function init(){
			define('DS', DIRECTORY_SEPARATOR);
			define('ROOT', getcwd().DS);
			define('FRAMEWORK_PATH', ROOT."framework".DS);
			define('CORE_PATH', FRAMEWORK_PATH."core".DS);
			define('DATABASE_PATH', FRAMEWORK_PATH."database".DS);
			define('HELP_PATH', FRAMEWORK_PATH."helpers".DS);
			define('LIBRARIES_PATH', FRAMEWORK_PATH."libraries".DS);
			
			define('PUBLIC_PATH', ROOT."public".DS);
			
			define('APP_PATH', ROOT."application".DS);
			define('CONFIG_PATH', APP_PATH."config".DS);
			define('CONTROLLER_PATH', APP_PATH."controllers".DS);
			define('MODEL_PATH', APP_PATH."models".DS);
			define("VIEW_PATH", APP_PATH."views".DS);
			define('ADMIN_PATH', CONTROLLER_PATH."admin".DS);
			define('HOME_PATH', CONTROLLER_PATH."home".DS);

			define('PLATFORM',isset($_REQUEST['p']) ? $_REQUEST['p'] :"home");
			define('CONTROLLER',isset($_REQUEST['c'])? ucfirst($_REQUEST['c']):'Index');
			define('ACTION',isset($_REQUEST['a'])? $_REQUEST['a'] : 'index');
			
			define('CUR_CONTROLLER_PATH', CONTROLLER_PATH.PLATFORM.DS);
			define('CUR_VIEW_PATH', VIEW_PATH.PLATFORM.DS);
			
			require CORE_PATH."Controller.class.php";
			require CORE_PATH."Model.class.php";
			require DATABASE_PATH."Mysql.class.php";

			$GLOBALS["config"] = include CONFIG_PATH."config.php";
		}

		public static function route(){
			$controller_name = CONTROLLER."Controller";
			$action_name = ACTION."Action";
			$controller = new $controller_name;
			$controller->$action_name();
		}

		public static function autoload(){
			spl_autoload_register(array(__CLASS__,"load"));
		}
		public static function load($classname){
			if(substr($classname, -10)=="Controller"){
				include CUR_CONTROLLER_PATH."{$classname}.class.php";
			}else if (substr($classname, -5)=="Model") {
				require MODEL_PATH."{$classname}.class.php";
			}
		}
	}
?>