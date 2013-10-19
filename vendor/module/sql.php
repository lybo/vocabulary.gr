<?php

	function getConnection() {
	    $sql_host = 'localhost';
	    $sql_database = 'vocabularygr';
	    $sql_username = 'root';
	    $sql_password = '1qaz2wsx';

	    $db = new mysqli($sql_host, $sql_username, $sql_password, $sql_database);

	    if($db->connect_errno > 0){
	        die('Unable to connect to database [' . $db->connect_error . ']');
	    }

	    $db->query ('SET NAMES utf8');
	    mb_internal_encoding('UTF-8');

	    return $db;
	}

	function get_values($db, $sql){
		$res = q($db, $sql);
		$a = $res->fetch_assoc();

		return $a;
	}

	function get_value($db, $sql){
		$res = q($db, $sql);
		list($a) = $res->fetch_row();

		return $a;
	}

	function q($db, $sql){
		$res = $db->query($sql) or die($db->error.":\n $sql");

		return $res;
	}

	function get_values_assoc_array($db, $sql){


	    $result = q($db, $sql);
	    $vocabularies = array();
	    while( $row = $result->fetch_assoc() ){
	    	$rows[] = $row;
	    }

	    return $rows;
	}


	function txt2sql($txt, $db){
		if(!is_array($txt)){
			return $db->real_escape_string(stripcslashes($txt));
		}else{
			return $txt;
		}
	}

