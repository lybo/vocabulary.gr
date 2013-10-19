<?php

$getSubscribe = function($route) use ($app) {

	$req = $app->request();
	$params = $route->getParams();
	$userSubscribeId = $params['userSubscribeId'];

	if( !$userSubscribeId ) {
		$env = $app->environment();
		$data = $env['req:data'];
		$userSubscribeId = $data['userSubscribeId']; 
	}

	if($userSubscribeId){
		$db = getConnection();
	    $sql = "SELECT * FROM user_subscribes WHERE id = '$userSubscribeId' LIMIT 1";
	    $result = q($db, $sql);
		$userSubscribe = $result->fetch_assoc();

		$env = $app->environment();
		$data = $env['req:data'];

		$data['userId'] = $userSubscribe['subscribe_user_id'];

		$data['userSubscribe'] = $userSubscribe;
		$env['req:data'] = $data;
	}

};

$getUserSubscribes = function() use ($app) {
	
	$db = getConnection();
	$user_id = $_SESSION['user']['id'];
	$sql = "SELECT * FROM user_subscribes WHERE user_id = '$user_id' ORDER BY id DESC";
	$res = q($db, $sql);
	
	$rows = array();
	while( $row = $res->fetch_assoc()){
		$rows[] = $row;
	}
	//print_r($rows);
	$env = $app->environment();
	$data = $env['req:data'];
	$data['userSubscribes'] = $rows;
	$data['usersInputIsRequired'] = 1;
	$env['req:data'] = $data;
	
};

$sendUserSubscribes = function() use ($app) {
	
	$env = $app->environment();
	$data = $env['req:data'];

	$res = $app->response();
	$res['Content-Type'] = 'application/json';
	$res->body(json_encode($data['userSubscribes']));
    
};


$checkUserSubscribe = function($route) use ($app) {
	
	$db = getConnection();
	$req = $app->request();
	$input = $req->getBody();
	$input_data = json_decode($input, true);
	$subscribe_user_id = $input_data['subscribe_user_id'];
	$data['userId'] = $subscribe_user_id;

	$user_id = $_SESSION['user']['id'];
	$sql = "SELECT COUNT(*) AS userSubscribeCount FROM user_subscribes WHERE user_id = '$user_id' AND subscribe_user_id = '$subscribe_user_id' LIMIT 1";
	
	
	$data['userSubscribeExist'] = get_value($db, $sql);


	//print_r($rows);
	$env = $app->environment();
	$data = $env['req:data'];
	$data['userSubscribes'] = $rows;
	$env['req:data'] = $data;
	
};

$insertUserSubscribe = function($route) use ($app) {

	$params = $route->getParams();
    $req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	if( !$data['userSubscribeExist'] ) {

		$input = $req->getBody();
		$input_data = json_decode($input, true);
		$subscribe_user_id = $input_data['subscribe_user_id'];
		$data['userId'] = $subscribe_user_id;
		

		$data['userSubscribeId'] = $params['userSubscribeId'];
		$data['num_subscribes_action'] = 'insert';

		$db = getConnection();
		$sql = "INSERT INTO user_subscribes (id, user_id, subscribe_user_id, date_in) VALUES (null, ?, ?, UNIX_TIMESTAMP() )";
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'ii',
			$_SESSION['user']['id'],
			$subscribe_user_id
		);
		$stmt->execute();

		$data['subscribe'] = array( 
            'id'=> $db->insert_id,
            'user_id'=> $_SESSION['user']['id'],
            'subscribe_user_id'=> $subscribe_user_id
       	);
		
		$env['req:data'] = $data;

	}

};

$sendUserSubscribe = function() use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];
	
	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);
	
	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		$res->body(json_encode($data['subscribe']));
		
	}

};

$deleteUserSubscribe = function($route) use ($app) {

	$params = $route->getParams();
    $req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	if( $params['userSubscribeId'] ) {

		$data['userSubscribeId'] = $params['userSubscribeId'];
		$data['num_subscribes_action'] = 'delete';

		$db = getConnection();
	    $sql = "DELETE FROM user_subscribes WHERE id = '{$params['userSubscribeId']}'";
	    $result = q($db, $sql);

	    
		$env['req:data'] = $data;

	}

};

$sendDeleteUserSubscribe = function() use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];
	
	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);
	
	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		$res->body(json_encode(array('success'=>1)));
		
	}

};

$getUsersFromSubscribes = function() use ($app) {
	
	
	$env = $app->environment();
	$data = $env['req:data'];
	
	$userSubscribes = $data['userSubscribes'];
	forEach($userSubscribes as $key=>$value){
		$data['user_ids'][] = $value['subscribe_user_id'];
	}

	$env['req:data'] = $data;
	
};




