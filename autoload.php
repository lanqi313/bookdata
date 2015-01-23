<?php
	define ( 'BASEDIR' , __DIR__ );

	spl_autoload_register('autoload1');

	function autoload1($class) {
		require_once  BASEDIR.'/'.$class.'.class.php';
	}
	