<?php

$getUserLibrary = function($route) use ($app) {


	$env = $app->environment();
	$data = $env['req:data'];

	$db = getConnection();
	$user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM user_library WHERE user_id='$user_id' ORDER BY date_in DESC";
    $userLibrary = get_values_assoc_array($db, $sql);
    $data['userLibrary'] = $userLibrary;

    $data['vocabulary_ids'] = array();
    if( count($userLibrary) ) {
	    foreach( $userLibrary as $key=>$userLibrary_item ) {

	    	if( !in_array($userLibrary_item['vocabulary_id'], $data['vocabulary_ids']) ){
	    		$data['vocabulary_ids'][] = $userLibrary_item['vocabulary_id'];
	    	}
	    }
	}

	$env['req:data'] = $data;
};


$orderVocabulariesByVisit = function($route) use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];

	$vocabularies = array();
	if( count($data['userLibrary']) && $data['vocabularies'] ) {
		foreach($data['userLibrary'] as $key=>$rowLib) {

			foreach($data['vocabularies'] as $key2=>$vocabulary) {

				if( $vocabulary['id'] ==  $rowLib['vocabulary_id'] ) {
					$vocabulary['library_id'] = $rowLib['id'] ? $rowLib['id'] : '0';
					$vocabularies[] = $vocabulary;
					break;
				}

			}

		}
	}
	
	$data['vocabularies'] = $vocabularies;
    $env['req:data'] = $data;

};


$sendLibraryVocabularies = function() use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];

	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);

	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		$res->body(json_encode($data['vocabularies']));

	} elseif ($mediaType == 'html') {

		
        $app->render('library.html', $data);
	}

};



$insertLibrary = function($route) use ($app) {

	$req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];
	$input_data = $req->post();
	$data['success'] = 0;

	if( $input_data['vocabulary_id'] && $data['is_logged'] ) {

		$db = getConnection();

		$sql = "INSERT INTO user_library (id, user_id, vocabulary_id, date_visit, date_in) VALUES (null, ?, ?, UNIX_TIMESTAMP(), UNIX_TIMESTAMP() )";
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'ii',
			$_SESSION['user']['id'],
			$input_data['vocabulary_id']
		);
		$stmt->execute();

		$data['libraryId'] = $db->insert_id;
		if($data['libraryId']) {
			$data['success'] = 1;
		}
	}

	$env['req:data'] = $data;

};

$saveLibrary = function() use ($app) {

	$req = $app->request();
	$res = $app->response();
	$env = $app->environment();
	$data = $env['req:data'];
	$sendData = array('success'=>$data['success'], 'libraryId'=>$data['libraryId']);
	$res['Content-Type'] = 'application/json';
	$res->body(json_encode($sendData));

};


$deleteUserLibrary = function($route) use ($app) {

	$req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	$params = $route->getParams();
	$libraryId = $params['libraryId'];

	$data['success'] = 0;

	if( $libraryId && $data['is_logged'] ) {

		$db = getConnection();
		$sql = "DELETE FROM user_library WHERE id = ? AND user_id = ?";
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'ii',
			$libraryId,
			$_SESSION['user']['id']
		);
		$stmt->execute();

		$data['libraryId'] = $libraryId;
		$data['success'] = 1;

	}

	$env['req:data'] = $data;

};

$sendDeleteUserLibrary = function() use ($app) {

	$req = $app->request();
	$res = $app->response();
	$env = $app->environment();
	$data = $env['req:data'];
	$sendData = array('success'=>$data['success'], 'id'=>$data['libraryId']);
	$res['Content-Type'] = 'application/json';
	$res->body(json_encode($sendData));

};



$checkExistVocabularyInLibrary = function($route) use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];

	$params = $route->getParams();
	$vocabularyId = $params['vocabularyId'];
	$user_id = $_SESSION['user']['id'];

	$data['vocabularyLibrary'] = '';

	if( $vocabularyId && $user_id ){

		$db = getConnection();
		$sql = "SELECT * FROM user_library WHERE user_id='$user_id' AND vocabulary_id = '$vocabularyId' LIMIT 1";
	    $vocabularyLibrary = get_values($db, $sql);
	    $data['vocabularyLibrary'] = $vocabularyLibrary;
	}

    $env['req:data'] = $data;

};






