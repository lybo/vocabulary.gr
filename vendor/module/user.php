<?php

$updateAddVocabulary = function($route) use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];

	if( !$data['user']['num_vocabularies'] ){
		$data['user']['num_vocabularies'] = 0;
	}
	
	$data['user']['num_vocabularies']++;
	$env['req:data'] = $data;
};

$updateDeleteVocabulary = function($route) use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];

	if( !$data['user']['num_vocabularies'] || $data['user']['num_vocabularies']<0 ){
		$data['user']['num_vocabularies'] = 0;
	} else {
		$data['user']['num_vocabularies']--;
	}
	
	$env['req:data'] = $data;
};

$getUserNumVocabulary = function($route) use ($app) {

	$req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	//print_r($data['user']);
	$data['new_num_vocabularies'] = null;

	if( $data['is_logged'] ) {

		$db = getConnection();
		$sql = "SELECT COUNT(*) FROM vocabularies 
				WHERE user_id = '{$_SESSION['user']['id']}' 
				AND is_published = '1'";
                  
	    $data['new_num_vocabularies'] = get_value($db, $sql);
		
	}

	$env['req:data'] = $data;
};

$updateUserNumVocabulary = function($route) use ($app) {

	$req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	//print_r($data['user']);

	if( $data['is_logged'] && $data['new_num_vocabularies'] != null ) {

		$db = getConnection();
		$sql = "UPDATE users SET 
                  num_vocabularies = ?
                  WHERE id = ?";
               
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'si',
			$data['new_num_vocabularies'],
			$_SESSION['user']['id']
		);

		$data['currentUser']['num_vocabularies'] = $data['new_num_vocabularies'];
		$_SESSION['user']['num_vocabularies'] = $data['new_num_vocabularies'];
		$stmt->execute();
		$env['req:data'] = $data;
	}
};

$getUser = function($route) use ($app) {

	$req = $app->request();
	$params = $route->getParams();
	$userId = $params['userId'];

	if( !$userId ) {
		$env = $app->environment();
		$data = $env['req:data'];
		$userId = $data['userId']; 
	}

	if($userId){
		//echo '==========================';
		$db = getConnection();
	    $sql = "SELECT * FROM users WHERE id = '$userId' LIMIT 1";
	    $result = q($db, $sql);
		$user = $result->fetch_assoc();

		$env = $app->environment();
		$data = $env['req:data'];

		$data['user'] = $user;
		$env['req:data'] = $data;
	}

};

$sendUser = function() use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];

	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);

	if($mediaType == 'json') {

		$res['Content-Type'] = 'application/json';
		$res->body(json_encode($data['user']));

	} elseif ($mediaType == 'html') {
        $app->render('user.html', $data);
	}
};

$getUsers = function($route) use ($app) {

	$params = $route->getParams();
	$req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	$sqlWhere = '';
    $sqlWhere_and = array();
    $sqlWhere_or = array();
    $users = array();

    if( $req->get('user_ids') || $data['user_ids'] ) {

    	$user_ids = $req->get('user_ids');
    	if( !$user_ids ) {
    		$user_ids = implode(',', $data['user_ids']);
    	}
    	$data['user_ids'] = explode(',', $user_ids);
    }

    if( $data['user_ids'] ) {
    	$user_ids = implode(',', $data['user_ids']);
    	$sqlWhere_and[] = 'id IN ('.$user_ids.')';
    }

    if( count($sqlWhere_and) ) {
    	$sqlWhere = 'WHERE '.implode(' AND ', $sqlWhere_and);
    }
    
    if( $data['usersInputIsRequired'] ) {

    	if($sqlWhere) {
	    	$db = getConnection();
		    $sql = "SELECT id, name, first_name, last_name, photo, lang_id, num_vocabularies, num_subscribes, last_vocabularies FROM users $sqlWhere";
		    $users = get_values_assoc_array($db, $sql);
		}

    } else {

    	$db = getConnection();
		$sql = "SELECT id, name, first_name, last_name, photo, lang_id, num_vocabularies, num_subscribes, last_vocabularies FROM users $sqlWhere";
		$users = get_values_assoc_array($db, $sql);

    }

    $data['users'] = $users;
    $env['req:data'] = $data;
        
};

$insertUser = function($route) use ($app) {
	
	$req = $app->request();

	$env = $app->environment();
	$data = $env['req:data'];
	if( !$data['userExists'] ) {

		$signUpemail = $req->post('signUpemail');
		$signUpname_array = explode('@', $signUpemail);
		$signUpname = $signUpname_array[0];
		$signUppassword = $req->post('signUppassword');
		$lat_lng = $req->post('lat_lng');
		$signUpLanguage = $req->post('signUpLanguage');
		$hash = hash('md5', date('l jS \of F Y h:i:s A'));

		$sql = "INSERT INTO users (id, name, email, password, lat_lng, lang_id, is_published, date_in) VALUES (null, '$signUpname', '$signUpemail', '$signUppassword', '$lat_lng', '$signUpLanguage', '$hash', UNIX_TIMESTAMP() )";
	              
	    $db = getConnection();
		$result = q($db, $sql);

		$user['id'] = $user_id = $db->insert_id;
		$user['name'] = $signUpname;
		$user['email'] = $signUpemail;
		$user['password'] = $signUppassword;
		$user['lat_lng'] = $lat_lng;
		$user['lang_id'] = $signUpLanguage;
		$user['hash'] = $hash;
		
		send_email(array(
			'fullname'=>$user['email'],
			'to'=>$user['email'],
			'from'=>'do.not.reply@vocabulary.gr',
			'subject'=>'Welcome to vocabulary.gr',
			'message'=>"
				Welcome to vocabulary.gr<br/><br/>
				<a href=\"http://www.vocabulary.gr/verify/$user_id/$hash\" target=\"_blank\">Please verify your account</a>
			"
		));

	}//!$data['userExists']

};

$saveUser = function() use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];

	$req = $app->request();
	$res = $app->response();
	$mediaType = getContentData($req);

	if($mediaType == 'json') {

	} elseif ($mediaType == 'html') {
		
		if(!$data['userExists']){
        	$app->render('new_user_response.html', $data);
        } else {
        	$res->redirect('/');
        }

	}
	    
};

$updateUserPersonalDetails = function($route) use ($app) {
	$env = $app->environment();
	$data = $env['req:data'];

	$req = $app->request();
	$user = $req->post();

	if( trim($user['name']) ) {

		$db = getConnection();

		$sql = "UPDATE users SET 
	              name = ?, 
	              first_name = ?, 
	              last_name = ?
	              WHERE id = ?";
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'sssi',
			$user['name'],
			$user['first_name'],
			$user['last_name'],
			$_SESSION['user']['id']
		);
		$stmt->execute();

		$data['currentUser']['name'] = $user['name'];
		$data['currentUser']['first_name'] = $user['first_name'];
		$data['currentUser']['last_name'] = $user['last_name'];
		$_SESSION['user']['name'] = $user['name'];
		$_SESSION['user']['first_name'] = $user['first_name'];
		$_SESSION['user']['last_name'] = $user['last_name'];

	}

	
};

$sendUserPersonalDetails = function() use ($app) {
	$res = $app->response();
	$res->redirect('/me');
};

$updateUserLoginDetails = function($route) use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];

	$req = $app->request();
	$user = $req->post();

	$db = getConnection();

	$sql = "SELECT name, email, password FROM users WHERE id = '{$_SESSION['user']['id']}' ";
	
	$currentUser = get_values($db, $sql);

	if( trim($user['old_password']) && trim($user['password']) && $currentUser['password'] == $user['old_password'] ) {

		$sql = "UPDATE users SET
	              password = ?
	              WHERE id = ?";
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'si',
			$user['password'],
			$_SESSION['user']['id']
		);
		$stmt->execute();

		send_email(array(
			'fullname'=>$currentUser['name'],
			'to'=>$currentUser['email'],
			'from'=>'do.not.reply@vocabulary.gr',
			'subject'=>'New login credentials about your account at vocabulary.gr',
			'message'=>"
				New login credentials about your account at vocabulary.gr<br/><br/>
				Password: <strong>{$user['password']}</strong>
			"
		));

	}
};

$sendUserLoginDetails = function() use ($app) {

	
	$res = $app->response();
	$res->redirect('/me');

};

$updateUserLoginEmailDetails = function($route) use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];

	$req = $app->request();
	$user = $req->post();

	$db = getConnection();

	$sql = "SELECT name, email, password FROM users WHERE id = '{$_SESSION['user']['id']}' ";
	
	$currentUser = get_values($db, $sql);



	if( trim($user['old_email']) && trim($user['email']) && $currentUser['email'] == $user['old_email'] ) {

		$sql = "UPDATE users SET
	              email = ?
	              WHERE id = ?";
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'si',
			$user['email'],
			$_SESSION['user']['id']
		);
		
		$stmt->execute();
		
		send_email(array(
			'fullname'=>$currentUser['name'],
			'to'=>$user['email'],
			'from'=>'do.not.reply@vocabulary.gr',
			'subject'=>'New login credentials about your account at vocabulary.gr',
			'message'=>"
				You have changed the email login about your account at vocabulary.gr
			"
		));

	}
};

$sendUserLoginEmailDetails = function() use ($app) {

	
	$res = $app->response();
	$res->redirect('/me');

};

$sendConfirmPassword = function() use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];

	$req = $app->request();
	$user = $req->get();

	$password = $user['old_password'];

	$db = getConnection();

	$sql = "SELECT email, password FROM users WHERE id = '{$_SESSION['user']['id']}' ";
	
	$currentUser = get_values($db, $sql);

	if($currentUser['password'] === $password) {
		echo 'true';
	} else {
		echo 'false';
	}
	
};

$sendConfirmEmail = function() use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];

	$req = $app->request();
	$user = $req->get();

	$email = $user['old_email'];

	$db = getConnection();

	$sql = "SELECT email, password FROM users WHERE id = '{$_SESSION['user']['id']}' ";
	
	$currentUser = get_values($db, $sql);

	if($currentUser['email'] === $email) {
		echo 'true';
	} else {
		echo 'false';
	}
	
};

$deleteUser = function($route) use ($app) {
	
};

$verifyUserAccount = function($route) use ($app) {

	$req = $app->request();
	$params = $route->getParams();
	$userId = $params['userId'];
	$hashCode = $params['hashCode'];

	$env = $app->environment();
	$data = $env['req:data'];
	
	if($data['user']['is_published'] == 1 ) {

		$data['is_activated'] = 0;
		$data['has_allready_activated'] = 1;

	} elseif( $data['user']['is_published'] == $hashCode && $userId ) {

		$db = getConnection();
	    $sql = "UPDATE users SET is_published = '1', date_verify = UNIX_TIMESTAMP() WHERE id = '$userId' ";
	    $result = q($db, $sql);

		$data['is_activated'] = 1;
		$data['has_allready_activated'] = 0;
	} else {

		$data['is_activated'] = 0;
		$data['has_allready_activated'] = 0;

	}

	$data['user'] = $user;
	$env['req:data'] = $data;

};

$sendVerifyAccount = function() use ($app) {

	$req = $app->request();
	$res = $app->response();
	$env = $app->environment();
	$data = $env['req:data'];
	
	if( !$data['is_logged'] ) {
		$app->render('verify_response.html', $data);
	} else {
		$res->redirect('/');
	}

};

$checkUserExists = function($route) use ($app) {

	$req = $app->request();
	$signUpemail = $req->post('signUpemail');
         
    $db = getConnection();
    $sql = "SELECT COUNT(*) FROM users WHERE email='$signUpemail' LIMIT 1";
    $userExists = get_value($db, $sql);

    $env = $app->environment();
	$data = $env['req:data'];
	$data['userExists'] = $userExists;
	$env['req:data'] = $data;

};

$sendPassword = function() use ($app) {

	//echo $app->post('remindMeEmail');
	$req = $app->request();
	$email = $req->post('remindMeEmail');
	if($email){
		$db = getConnection();
	    $sql = "SELECT email, password FROM users WHERE email = '$email' LIMIT 1";
	    $result = q($db, $sql);
		$user = $result->fetch_assoc();
		$env = $app->environment();
		$data = $env['req:data'];
		$data['user'] = $user;
		$env['req:data'] = $data;
		$password = $user['password'];

		if($password){
			send_email(array(
				'fullname'=>$user['email'],
				'to'=>$user['email'],
				'from'=>'do.not.reply@vocabulary.gr',
				'subject'=>'Vocabulary.gr[remind me]',
				'message'=>"
					vocabulary.gr reminds you your password:<br/><br/>
					Password: <strong>$password</strong>
				"
			));
		}
	}
};

$sendUserPassword = function() use ($app) {

	$req = $app->request();
	$res = $app->response();
	$mediaType = $req->getMediaType();
	$env = $app->environment();
	$data = $env['req:data'];

    if(!$data['is_logged']) {
    	  	
      	if($data['user']['password']) {

      		$app->render('remindme_response.html', $data);

      	} else {

      		$data['no_email'] = 1;
      		$app->render('remindme.html', $data);

      	}

    } else {
    	$res->redirect('/');
    }
	
};

$remindmeForm = function() use ($app) {

	$req = $app->request();
	$res = $app->response();
	$mediaType = $req->getMediaType();
	$env = $app->environment();
	$data = $env['req:data'];

	if( !$data['is_logged'] ) {
		$data['no_email'] = 0;
		$app->render('remindme.html', $data);
	} else {
		$res->redirect('/');
	}

};

$signupForm = function() use ($app) {

	$req = $app->request();
	$res = $app->response();
	$mediaType = $req->getMediaType();
	$env = $app->environment();
	$data = $env['req:data'];

	if( !$data['is_logged'] ) {
		$app->render('signup.html', $data);
	} else {
		$res->redirect('/');
	}
	
};

$getUsersSubscribed = function($route) use ($app) {
	
	$env = $app->environment();
    $data = $env['req:data'];
    $data['users'] = array();
    $env['req:data'] = $data;

	$req = $app->request();
    $user_ids = $req->get('user_ids');
    $user_id = $req->get('user_id');

    if( $user_ids ){
    	$user_ids_array = explode(',', $user_ids);
    }

   	$sqlWhere = '';
    $sqlWhere_and = array();
    //$sqlWhere_or = [];

    if( ($user_ids_array && count($user_ids_array)) || $user_id) {

    	if($user_ids_array && count($user_ids_array)) {
            $user_ids = implode(',', $user_ids_array);
            $sqlWhere_and[] = " id IN ($user_ids) ";
		}

		if($user_id) {
			$sqlWhere_and[] = " id IN ($user_id) ";
		}

		if( count($sqlWhere_and) ) {
			$sqlWhere = 'WHERE ' . implode(' AND ', $sqlWhere_and);
		}
    }

    if( $sqlWhere ){
    	$db = getConnection();
	    $sql = "SELECT * FROM users $sqlWhere";
	    $result = q($db, $sql);
		
		$rows = array();
		while( $row = $result->fetch_assoc()){
			$rows[] = $row;
		}

		$data['users'] = $rows;
		$env['req:data'] = $data;
	}
};

$sendUsers = function() use ($app) {
	
	$env = $app->environment();
	$data = $env['req:data'];

	$res = $app->response();
	$res['Content-Type'] = 'application/json';
	$res->body(json_encode($data['users']));
    
};


$insertUserLastActivity = function($route) use ($app) {

	$env = $app->environment();
	$data = $env['req:data'];

	if(  $data['vocabularyId']  && $data['vocabulary'] ) {

		$data['lastActivity']['Topic'] = 'vocabulary';
		$data['lastActivity']['TopicId'] = $data['vocabularyId'];
		$data['lastActivity']['ActionType'] = 'hasStudied';
		$data['lastActivity']['html'] = '<a href="/exercise/'.$data['vocabularyId'].'" ><span class="icon icon-book"></span> You have studied the vocabulary "<strong>'.$data['vocabulary']['title'].'</strong>"</a>';

		$db = getConnection();
		$sql = "INSERT INTO user_last_activities (id, user_id, topic, topic_id, action_type, html, date_in) VALUES (null, ?, ?, ?, ?, ?, UNIX_TIMESTAMP() )";
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'isiss',
			$_SESSION['user']['id'],
			$data['lastActivity']['Topic'],
			$data['lastActivity']['TopicId'],
			$data['lastActivity']['ActionType'],
			$data['lastActivity']['html']
		);
		$stmt->execute();

	}

};


$updateUserNum = function($route) use ($app) {

	$req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	if( $data['is_logged'] ) {

		if(!$data['user']['num_subscribes']) {
			$data['user']['num_subscribes'] = 0;
		}

		if($data['num_subscribes_action'] == 'insert'){
	      $data['user']['num_subscribes']++;
	    } else if($data['num_subscribes_action'] == 'delete') {
	      $data['user']['num_subscribes']--;
	      $data['user']['num_subscribes'] = ($data['user']['num_subscribes']>=0) ? $data['user']['num_subscribes'] : 0;
	    }

		$db = getConnection();
		$sql = "UPDATE users SET 
	              num_subscribes = ?
	              WHERE id = ?";
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'ii',
			$data['user']['num_subscribes'],
			$data['userId']
			
		);
		$stmt->execute();

		$env['req:data'] = $data;

	}

};

$updateUserLastVocabularies = function($route) use ($app) {
	

	$req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];
	$db = getConnection();

	$sql ="SELECT id FROM vocabularies WHERE user_id = {$_SESSION['user']['id']} ORDER BY date_in DESC LIMIT 0, 3";
		
	$lastVocabularies = get_values_assoc_array($db, $sql);

	if( $data['is_logged'] && count($lastVocabularies) ) {

		
		foreach ($lastVocabularies as $key => $value) {
			$data['lastVocabularies'][] = $value['id'];
		}

		$data['lastVocabularies'] = implode(',', $data['lastVocabularies']);
		
		$sql = "UPDATE users SET 
                  last_vocabularies = ?
                  WHERE id = ?";
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'si',
			$data['lastVocabularies'],
			$_SESSION['user']['id']
		);
		$stmt->execute();

		//$env['req:data'] = $data;
	}

};

$getUserLastActivities = function($route) use ($app) {

	$req = $app->request();
	$env = $app->environment();
	$data = $env['req:data'];

	
	$db = getConnection();
    $sql = "SELECT * FROM user_last_activities WHERE user_id = '{$_SESSION['user']['id']}' GROUP BY action_type, topic, topic_id  ORDER BY date_in DESC LIMIT 0, 5";
    $data['userLastActivities'] = get_values_assoc_array($db, $sql);

    
    $env['req:data'] = $data;
};

$sendUserForm = function() use ($app) {

	$req = $app->request();
	$res = $app->response();
	$mediaType = $req->getMediaType();
	$env = $app->environment();
	$data = $env['req:data'];

	
	$app->render('user_form.html', $data);

	
};



