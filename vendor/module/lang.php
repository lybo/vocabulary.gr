<?php

$getLangs = function() use ($app) {
	
	$db = getConnection();
	$sql = "SELECT * FROM langs ORDER BY title";
	$res = q($db, $sql);
	
	$rows = array();
	while( $row = $res->fetch_assoc()){
		$rows[] = $row;
	}
	//print_r($rows);
	$env = $app->environment();
	$data = $env['req:data'];
	$data['langs'] = $rows;
	$env['req:data'] = $data;
	
};
