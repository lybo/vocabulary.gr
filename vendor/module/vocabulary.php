<?php

$updateAddTranslation = function($route) use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];

	if( !$data['vocabulary']['num_translations'] ){
		$data['vocabulary']['num_translations'] = 0;
	}
	
	$data['vocabulary']['num_translations']++;
	$env['req:data'] = $data;
};

$updateDeleteTranslation = function($route) use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];

	if( !$data['vocabulary']['num_translations'] || $data['vocabulary']['num_translations']<0 ){
		$data['vocabulary']['num_translations'] = 0;
	} else {
		$data['vocabulary']['num_translations']--;
	}
	
	$env['req:data'] = $data;
};

$updateVocabularyNumTranslations = function($route) use ($app) {

	$req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	if( $data['vocabulary'] && $data['is_logged'] ) {

		$db = getConnection();
		$sql = "UPDATE vocabularies SET 
                  num_translations = ?
                  WHERE id = ?";
                  
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'si',
			$data['vocabulary']['num_translations'],
			$data['vocabulary']['id']
		);
		$stmt->execute();
		$env['req:data'] = $data;
	}
};

$updateVocabularyCachedTranslations = function($route) use ($app) {

	$req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	if( $data['vocabulary'] && $data['translations'] && $data['is_logged'] ) {
		
		$data['vocabulary']['translations'] = json_encode($data['translations']);

		//print_r($data['translations']);

		$db = getConnection();
		$sql = "UPDATE vocabularies SET 
                  translations = ?
                  WHERE id = ?";
                  
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'si',
			$data['vocabulary']['translations'],
			$data['vocabulary']['id']
		);
		$stmt->execute();
		$env['req:data'] = $data;
	}
};

$getVocabulary = function($route) use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];
	$req = $app->request();
	$params = $route->getParams();
	$vocabularyId = $params['vocabularyId'];

	if( !$vocabularyId ) {
		$vocabularyId = $data['vocabularyId'];
	}

	if($vocabularyId){
		$db = getConnection();
	    $sql = "SELECT * FROM vocabularies WHERE id='$vocabularyId' LIMIT 1";
	    $vocabulary = get_values($db, $sql);
		
		$data['vocabulary'] = $vocabulary;
		$data['vocabularyId'] = $vocabularyId;
		$data['userId'] = $vocabulary['user_id'];
		$env['req:data'] = $data;
	}
	
};

$checkOwnerVocabulary = function($route) use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];
	$req = $app->request();

	if( $data['vocabulary']['user_id'] != $data['currentUser']['id'] ){
		$res = $app->response();
		$res->redirect('/');
	}
	
};

$checkIsPublished = function($route) use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];
	$req = $app->request();

	if( $data['vocabulary']['user_id'] != $data['currentUser']['id'] && !$data['vocabulary']['is_published'] ){
		$res = $app->response();
		$res->redirect('/');
	}
	
};

$sendVocabulary = function() use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];

	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);

	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		$res->body(json_encode($data['vocabulary']));

	} elseif ($mediaType == 'html') {
        //$app->render('new_user_response.html', $data);
	}

	
};

$onlyPublishedVocabularies = function($route) use ($app) {

	$params = $route->getParams();
	$env = $app->environment();
	$data = $env['req:data'];

	$data['onlyPublishedVocabularies'] = 1;

	$env['req:data'] = $data;
};

$prepareVocabularySql = function($route) use ($app) {

	$params = $route->getParams();
	$env = $app->environment();
	$data = $env['req:data'];

	$data['vocabularySQL'] = "user_id = '".$_SESSION['user']['id']."'";
    $sqlWhere_and = array();
    $sqlWhere_or = array();

    if( $params['vocabularyQuery'] ) {

    	$data['vocabularyQuery'] = $params['vocabularyQuery'];
    	$vocabularyQuery_array = explode(' ', $params['vocabularyQuery']);

    	$sqlWhere_or = array();
    	if(count($vocabularyQuery_array)) {

    		foreach($vocabularyQuery_array as $keyword) {

    			$sqlWhere_or[] = "title LIKE '%$keyword%'";

    		}

    	}

    	if(count($sqlWhere_or)) {
            $sqlWhere_and[] = '('.implode(' OR ', $sqlWhere_or).')';
        }

        $data['page'] = $params['page'] ? $params['page'] : 1 ;

    }

    if( $params['vocabularyUser'] ) {
          
        $sqlWhere_and[] = "user_id = '".$params['vocabularyUser']."'";
        $data['page'] = $params['page'] ? $params['page'] : 1 ;
        $data['vocabularyUser'] = $params['vocabularyUser'];
        $data['userId'] = $params['vocabularyUser'];
    }

    if( $data['vocabulary_ids'] && count($data['vocabulary_ids']) ) {
          
        $sqlWhere_and[] = 'id IN ('.implode(',', $data['vocabulary_ids']).')';
    }

    if( $data['user_ids'] && count($data['user_ids']) ) {
    	$sqlWhere_and[] = 'user_id IN ('.implode(',', $data['user_ids']).')';
    	//$data['vocabularyGroupBy'] = 'GROUP BY user_id';
    }

    if($data['onlyPublishedVocabularies']) {
    	$sqlWhere_and[] = "is_published = '1'";
    }

    if( count($sqlWhere_and) ) {
    	$data['vocabularySQL'] = implode(' AND ', $sqlWhere_and);
    }


    $env['req:data'] = $data;

};

$getVocabulariesCount = function($route) use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];

	$db = getConnection();
    $sql = "SELECT COUNT(*) FROM vocabularies WHERE ".$data['vocabularySQL'];
    $vocabularies_length = get_value($db, $sql);
    $data['vocabularies_length'] = $vocabularies_length;
    $env['req:data'] = $data;
};

$getVocabularies = function($route) use ($app) {

	$params = $route->getParams();
	$env = $app->environment();
	$data = $env['req:data'];

	$ORDERBY = 'ORDER BY title';

	if( $data['page'] && $data['vocabularies_length'] ) {
		$page = ($data['page'] - 1)*10;
		$LIMIT = "LIMIT  $page, 10";
		$data['currentPage'] = $data['page'];
		$data['pages'] = ceil($data['vocabularies_length']/10);
    }

    if( $_REQUEST['page'] && $_REQUEST['per_page'] ) {
    	$page = ($_REQUEST['page'] - 1)*10;
    	$per_page = $_REQUEST['per_page'];
    	$LIMIT = "LIMIT  $page, 10";
    }

    if( $params['orderby'] ) {
    	$order_data = explode('|', $params['orderby']);
    	$ORDERBY = "ORDER BY {$order_data[0]} {$order_data[1]}";
    	$data['orderby'] = $order_data[0];
    	$data['ordertype'] = $order_data[1];
    }

	$db = getConnection();
    $sql = "SELECT * FROM vocabularies WHERE ".$data['vocabularySQL']." ".$data['vocabularyGroupBy']." $ORDERBY $LIMIT";
    $vocabularies = get_values_assoc_array($db, $sql);
//echo $sql;
    $data['user_ids'] = array();
    if( count($vocabularies) ) {
	    foreach( $vocabularies as $key=>$vocabulary ) {

	    	if( !in_array($vocabulary['user_id'], $data['user_ids']) ){
	    		$data['user_ids'][] = $vocabulary['user_id'];
	    	}

	    	$vocabularies[$key]['elasped_time'] = humanTiming ($vocabulary['date_in']);
	    }
	}
    
    $data['vocabularies'] = $vocabularies;
    $env['req:data'] = $data;

    //print_r($data);

};

function _remove_empty_internal($value) {
  return !empty($value) || $value === 0;
}

$getUserLastVocabularies = function($route) use ($app) {

	$params = $route->getParams();
	$env = $app->environment();
	$data = $env['req:data'];

	$vocabularies = array();
	$db = getConnection();

	$vocabularies_array = array();
	
	if( count($data['users']) && is_array($data['users']) ){
		foreach ($data['users'] as $key => $user) {
			$temp_vocabularies_array = (array)explode(',', $user['last_vocabularies']);
			$vocabularies_array = array_merge($vocabularies_array, $temp_vocabularies_array);
		}
	}

	$vocabularies_array = array_filter($vocabularies_array, '_remove_empty_internal');
		
	if( count($vocabularies_array) ) {

		$vocabularies_ids = implode(',', $vocabularies_array);

		$sql = "SELECT * FROM vocabularies WHERE id IN ($vocabularies_ids) ORDER BY date_in DESC";
		
	    $vocabularies = get_values_assoc_array($db, $sql);

	    if( count($vocabularies) ) {
		    foreach( $vocabularies as $key=>$vocabulary ) {

		    	if( !in_array($vocabulary['user_id'], $data['user_ids']) ){
		    		$data['user_ids'][] = $vocabulary['user_id'];
		    	}

		    	$vocabularies[$key]['elasped_time'] = humanTiming ($vocabulary['date_in']);
		    }
		}

		$data['vocabularies'] = $vocabularies;
		$env['req:data'] = $data;
		
	}
};

$sendVocabularies = function() use ($app) {
	
	$env = $app->environment();
	$data = $env['req:data'];

	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);

	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		
		if(!$_REQUEST['callback']){
			$res->body( json_encode($data['vocabularies']) );
		} else {
			$res->body( $_REQUEST['callback'].'('.json_encode($data['vocabularies']).')' );
		}

	} elseif ($mediaType == 'html') {
        $app->render('vocabularies.html', $data);
	}

};

$sendMyVocabularies = function() use ($app) {
	
	$env = $app->environment();
	$data = $env['req:data'];
	
	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);
	
	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		$res->body(json_encode($data['vocabularies']));
		
	} elseif ($mediaType == 'html') {
			
		if($data['is_logged']){
        	$app->render('myvocabularies.html', $data);
        } else {
        	$res->redirect('/');
        }
        
	}
	
};

$sendUserVocabularies = function($route) use ($app) {
	
	$env = $app->environment();
	$data = $env['req:data'];
	
	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);
	
	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		$res->body(json_encode($data['vocabularies']));
		
	} elseif ($mediaType == 'html') {
			
		$data['page_title'] = $data['users'][0]['name'];
		//print_r($data);
        $app->render('user_vocabularies.html', $data);
       
        
	}
	
};

$insertVocabulary = function($route) use ($app) {

	$req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	if( $req->isPost() && $data['is_logged'] ) {

		//$input = $req->getBody();
		//$vocabulary = json_decode($input, true);
		$vocabulary = $req->post();

		//print_r($vocabulary);

		

		$db = getConnection();

	    $sql = "INSERT INTO vocabularies (id, title, source, source_url, lang_1_id, lang_2_id, labels, type_id, user_id, date_in) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, UNIX_TIMESTAMP() )";
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'sssiissi',
			$vocabulary['title'],
			$vocabulary['source'],
			$vocabulary['source_url'],
			$vocabulary['lang_1_id'],
			$vocabulary['lang_2_id'],
			$vocabulary['labels'],
			$vocabulary['type_id'],
			$_SESSION['user']['id']
		);
		$result = $stmt->execute();

		//die($result);

	    $vocabulary['id'] = $db->insert_id;
		$vocabulary['user_id'] = $_SESSION['user']['id'];
		$vocabulary['date_in'] = time();
		$data['userId'] = $_SESSION['user']['id'];

		

		$body = '<a href="/exercise/'.$vocabulary['id'].'"><strong class="user">'.$_SESSION['user']['name'].'</strong> has created a new vocabulary<span class="title">'.$vocabulary['title'].'</span></a>';
		new_notification($body);

		$data['vocabulary'] = $vocabulary;
		$env['req:data'] = $data;
	}

};

$saveVocabulary = function() use ($app) {
	$env = $app->environment();
	$data = $env['req:data'];
	
	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);
	
	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		$res->body(json_encode($data['vocabulary']));
		
	} else {
		
		if( $data['vocabulary']['id'] ){
			$res->redirect('/translations/vocabulary/'.$data['vocabulary']['id']);
		}else {
			$res->redirect('/new_user');
		}
	}
};

$updateVocabulary = function($route) use ($app) {
	

	$req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	if( $req->isPut() && $data['is_logged'] ) {

		$input = $req->getBody();
		$vocabulary = json_decode($input, true);

		$db = getConnection();

		$sql = "UPDATE vocabularies SET 
                  title = ?, 
                  source = ?, 
                  source_url = ?, 
                  lang_1_id = ?, 
                  lang_2_id = ?,
                  labels = ?,
                  type_id = ?
                  WHERE id = ?";
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'sssiisii',
			$vocabulary['title'],
			$vocabulary['source'],
			$vocabulary['source_url'],
			$vocabulary['lang_1_id'],
			$vocabulary['lang_2_id'],
			$vocabulary['labels'],
			$vocabulary['type_id'],
			$vocabulary['id']
		);
		$stmt->execute();


		$vocabulary['user_id'] = $_SESSION['user']['id'];

		$data['vocabulary'] = $vocabulary;
		$env['req:data'] = $data;
	}

};

$sendUpdateVocabulary = function() use ($app) {


	$env = $app->environment();
	$data = $env['req:data'];
	
	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);
	
	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		$res->body(json_encode($data['vocabulary']));
		
	}
	
};

$deleteVocabulary = function($route) use ($app) {


    $params = $route->getParams();
    $req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	if( $params['vocabularyId'] && $data['is_logged'] ) {

		$data['vocabularyId'] = $params['vocabularyId'];

		$db = getConnection();
	    $sql = "DELETE FROM vocabularies WHERE id = '{$params['vocabularyId']}'";
	    $result = q($db, $sql);

	    $sql = "DELETE FROM translations WHERE vocabulary_id = '{$params['vocabularyId']}'";
	    $result = q($db, $sql);

	    $data['userId'] = $_SESSION['user']['id'];
	    $data['vocabulary'] = $vocabulary;
		$env['req:data'] = $data;

	}
	
};

$sendDeleteVocabulary = function() use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];
	
	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);
	
	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		$res->body(json_encode(array('id'=>$data['vocabularyId'])));
		
	}
	
};

$updateStatusVocabulary = function($route) use ($app) {
	

	$req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	if( $req->isPost() && $data['is_logged'] && $data['vocabulary']['id'] ) {

		$vocabulary = $data['vocabulary'];

		$vocabulary['is_published'] = $vocabulary['is_published'] ? 0 : 1;

		$db = getConnection();

		$sql = "UPDATE vocabularies SET 
                  is_published = '{$vocabulary['is_published']}'
                  WHERE id = {$vocabulary['id']}";

        
	    q($db, $sql);


		$data['vocabulary'] = $vocabulary;
		$env['req:data'] = $data;
	}

};

$sendUpdateStatusVocabulary = function() use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];
	
	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);
	
	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		$res->body(json_encode($data['vocabulary']));
	
	}
	
};














