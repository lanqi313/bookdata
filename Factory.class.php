<?php
	class Factory{
		
		static function create_database(){
			$db = new Display;
			return $db;
		}
		static function create_mysql(){
			$mysql = new Mysql;
			return $mysql;
		}
		static function create_check(){
			$check = new Check;
			return $check;			
		}
		static function create_books(){
			$books = new Books;
			return $books;
		}
	}