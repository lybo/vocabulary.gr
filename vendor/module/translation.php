<?php

$getTranslation = function($route) use ($app) {


	$env = $app->environment();
	$data = $env['req:data'];

    $req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	$params = $route->getParams();
	$translationId = $params['translationId'];

	if( $translationId ) {

		$data['translationId'] = $translationId;

		$db = getConnection();
	    $sql = "SELECT * FROM translations WHERE id='$translationId' LIMIT 1";
	    $translation = get_values($db, $sql);

	    $data['translation'] = $translation;
	    $data['vocabularyId'] = $translation['vocabulary_id'];
	}

    $env['req:data'] = $data;
};

$getTranslations = function($route) use ($app) {


	$env = $app->environment();
	$data = $env['req:data'];
	
	$sql_WHERE = '';
	if( $data['vocabularyId'] ) {
		$sql_WHERE = "WHERE vocabulary_id='" . $data['vocabularyId'] . "'";
	}

	$db = getConnection();
    $sql = "SELECT * FROM translations $sql_WHERE ORDER BY id";
    $translations = get_values_assoc_array($db, $sql);


	
	$data['translations'] = $translations;
    $env['req:data'] = $data;
};


$importCsv = function($route) use ($app) {
		$env = $app->environment();
        $data = $env['req:data'];
        $req = $app->request();
        $res = $app->response();
        
        $data['vocabularyId'] = $data['vocabulary']['id'];

        $FileName = strtolower($_FILES['file']['name']); 
        //$FileName_path = $_FILES['file']["tmp_name"];

        $UploadDirectory = 'csv/';
        $NewFileName = $data['vocabulary']['id'].'.csv';

        $new_tranlstions = array();
        
        if(move_uploaded_file($_FILES['file']["tmp_name"], $UploadDirectory . $NewFileName )){

            chmod($UploadDirectory . $NewFileName, 0755);

            $csvData = file_get_contents($UploadDirectory . $NewFileName);


            

            $new_tranlstions = explode("\n", $csvData); 

            
            foreach ($new_tranlstions as $key => $value) {
            	$words = explode("\t", $value);

            	if(count($words)){
	            	$item = array('word_1'=>$words[0], 'word_2'=>$words[1]); 
	            	if( trim($words[0]) && trim($words[1]) ) {

		            	$new_tranlstions2[] = array( 
		            			'id'=>$key, 
		            			'word_1'=>str_replace("\n", '', trim($words[0])), 
		            			'word_2'=>str_replace("\n", '', trim($words[1]))
		            	);
		            }
		        }

            }
            $new_tranlstions = $new_tranlstions2;
            //
            /*

            $db = getConnection();

            foreach ($new_tranlstions as $key => $value) {
                # code...
            
                $sql = "INSERT INTO translations (id, word_1, word_2, vocabulary_id, date_in) VALUES (null, ?, ?, ?, UNIX_TIMESTAMP() )";
                $stmt = $db->prepare($sql);
                $stmt->bind_param( 'ssi',
                    str_replace("\n", '', trim($value[0])),
                    str_replace("\n", '', trim($value[1])),
                    $data['vocabulary']['id']
                );
                $stmt->execute();
            } 

            */
           // print_r($data);
            
            
        }

        echo str_replace("\n", '', json_encode($new_tranlstions));

        //print_r($new_tranlstions);
        die();

        //$env['req:data'] = $data;
};

$getCachedTranslations = function($route) use ($app) {


	$env = $app->environment();
	$data = $env['req:data'];

	if ( !($data['vocabulary'] && $data['vocabulary']['translations']) ) {
		$sql_WHERE = '';
		if( $data['vocabularyId'] ) {
			$sql_WHERE = "WHERE vocabulary_id='" . $data['vocabularyId'] . "'";
		}

		$db = getConnection();
	    $sql = "SELECT * FROM translations $sql_WHERE ORDER BY id";
	    $translations = get_values_assoc_array($db, $sql);
	} elseif( $data['vocabulary'] && $data['vocabulary']['translations'] ) {
		$translations = json_decode($data['vocabulary']['translations'], true);
		//print_r($data);
	}

	$data['translations'] = $translations;
    $env['req:data'] = $data;
};

$sendExercise = function() use ($app) {
	
	$env = $app->environment();
	$data = $env['req:data'];

	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);

	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		$res->body(json_encode($data['translations']));

	} elseif ($mediaType == 'html') {

		$data['page_title'] = $data['vocabulary']['title'];
		$data['vocabularyOwner'] = $data['user'];
        $app->render('exercises.html', $data);
	}

};

$sendTranslations = function() use ($app) {
	
	$env = $app->environment();
	$data = $env['req:data'];

	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);

	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		$res->body(json_encode($data['translations']));

	} elseif ($mediaType == 'html') {

		$data['vocabularyOwner'] = $data['user'];

        foreach($data['langs'] as $lang) {
        	if($data['vocabulary']['lang_1_id'] == $lang['id']){
        		$data['lang_1'] = $lang;
        	}
        	if($data['vocabulary']['lang_2_id'] == $lang['id']){
        		$data['lang_2'] = $lang;
        	}

        }

        $app->render('translations.html', $data);
	}

};

$insertTranslation = function($route) use ($app) {

	$req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	if( $req->isPost() && $data['is_logged'] ) {

		$input = $req->getBody();
		$translation = json_decode($input, true);

		$db = getConnection();

	    $sql = "INSERT INTO translations (id, word_1, word_2, vocabulary_id, date_in) VALUES (null, ?, ?, ?, UNIX_TIMESTAMP() )";
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'ssi',
			$translation['word_1'],
			$translation['word_2'],
			$translation['vocabulary_id']
		);
		$stmt->execute();

	    $translation['id'] = $db->insert_id;
		$translation['date_in'] = time();

		$data['translation'] = $translation;
		$data['vocabularyId'] = $translation['vocabulary_id'];
		$env['req:data'] = $data;
	}

};

$sendSaveTranslations = function() use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];
	
	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);
	
	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		$res->body(json_encode($data['translation']));
		
	}

};

$updateTranslation = function($route) use ($app) {

	$req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	if( $req->isPut()  && $data['is_logged'] ) {

		$input = $req->getBody();
		$translation = json_decode($input, true);

		$db = getConnection();
	    $sql = "UPDATE translations SET 
	    		  word_1 = ?, 
                  word_2 = ?
                  WHERE id = ?";
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'ssi',
			$translation['word_1'],
			$translation['word_2'],
			$translation['id']
		);
		$stmt->execute();

		$sql = "SELECT vocabulary_id FROM translations WHERE id='{$translation['id']}' LIMIT 1";
	    $data['vocabularyId'] = get_value($db, $sql);

		$data['translation'] = $translation;
		$env['req:data'] = $data;
	}

};

$sendUpdateTranslations = function() use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];
	
	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);
	
	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		$res->body(json_encode($data['translation']));
		
	}

};

$deleteTranslation = function($route) use ($app) {


    $params = $route->getParams();
    $req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	if( $params['translationId'] ) {

		$data['translationId'] = $params['translationId'];

		$db = getConnection();
	    $sql = "DELETE FROM translations WHERE id = '{$params['translationId']}'";
	    $result = q($db, $sql);

		$env['req:data'] = $data;

	}
	
};

$sendDeleteTranslation = function() use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];
	
	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);
	
	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		$res->body(json_encode(array('id'=>$data['translationId'])));
		
	}
	
};

