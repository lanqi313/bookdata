<?php
	class Mysql_connect{
		protected  static  $db;
		private function __construct(){
			self :: $db = new mysqli('localhost','bookdata','password','bookdata');
		}
		static function get_connect(){
			if(self::$db){
				return self :: $db;
			} else {
				self :: $db = new mysqli('localhost','bookdata','password','bookdata');
				return self :: $db;
			}

		}
	}
