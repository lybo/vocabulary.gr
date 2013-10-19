<?php

$isAuthenticated = function($route) use ($app) {

	$db = getConnection();
	$env = $app->environment();
	$data = $env['req:data'];


	$data['hasvisited'] = $app->getCookie('hasvisited');

	if( !$data['hasvisited'] ) {
		$data['hasvisited'] = 0;
		$app->setCookie('hasvisited', 1, '30 days');
	}

	if(!$_SESSION['user']){
		if( $sql = getSqlLogin($app) ){

			$currentUser = get_values($db, $sql);

			//print_r($currentUser);

			if( $currentUser && $currentUser['is_published'] == 1 ) {
				$_SESSION['user'] = $currentUser;
				$data['is_logged'] = 1;
				$data['currentUser'] = $currentUser;
				//echo '-------------------';
			} elseif( $currentUser && $currentUser['is_published'] != 1 ) {
				unset($_SESSION['user']);
				$data['is_logged'] = 0;
				$data['currentUser'] = '';
				$data['user_is_not_published'] = 1;
				//echo '===================';
			} else {
				unset($_SESSION['user']);
				$data['is_logged'] = 0;
				$data['currentUser'] = '';
			}

		}
	} elseif($_SESSION['user']['id']) {
		$data['is_logged'] = 1;
		$data['currentUser'] = $_SESSION['user'];
	}

	$env['req:data'] = $data;

	//echo '-------------';
	//print_r($data);
	//die();
};

$requireLogin = function($route) use ($app) {
	$req = $app->request();
	$res = $app->response();
	$mediaType = $req->getMediaType();
	$env = $app->environment();
	$data = $env['req:data'];

	$mediaType = getContentData($req);
	if($mediaType == 'json') {

		if( !$data['is_logged'] ) {
          	$res->body(json_encode(array("success"=> 0)));
        }

	} elseif ($mediaType == 'html') {

        if(!$data['is_logged']) {

        	$return_page = '/';
        	if( $app->request()->isPost() ){
          		$return_page = $req->body('return_page') ? $req->body('return_page') : '/';
          	}

          	$res->redirect($return_page);
        }
	}


};

$login = function($route) use ($app) {

	$req = $app->request();
	$db = getConnection();
	if( $sql = getSqlLogin($app) ){

		$currentUser = get_values($db, $sql);
		$env = $app->environment();
		$data = $env['req:data'];

		if( $currentUser && $currentUser['is_published'] == 1 ) {
			$_SESSION['user'] = $currentUser;
			$data['is_logged'] = 1;
			$data['currentUser'] = $currentUser;
			if( $req->post('rememberme') ) {
				$app->setCookie('userid', $currentUser['id'], '30 days');
			}

		} elseif( $currentUser && $currentUser['is_published'] != 1 ) {
			unset($_SESSION['user']);
			$data['is_logged'] = 0;
			$data['currentUser'] = '';
			$data['user_is_not_published'] = 1;
		} else {
			unset($_SESSION['user']);
			$data['is_logged'] = 0;
			$data['currentUser'] = '';
		}

	    $env['req:data'] = $data;

	}

};

$logout = function() use ($app) {

	$req = $app->request();
	$res = $app->response();
	$mediaType = $req->getMediaType();
	$env = $app->environment();
	$data = $env['req:data'];

	unset($_SESSION['user']);
	$app->deleteCookie('userid');

	$mediaType = getContentData($req);
	if($mediaType == 'json') {

        $res->body(json_encode(array("success"=> 1)));

	} elseif ($mediaType == 'html') {

        $return_page = '/';
        $res->redirect($return_page);

	}

};

$sendLogin = function() use ($app) {

	$env = $app->environment();
    $data = $env['req:data'];

    if($data['is_logged']) {
    	$req = $app->request();
    	$return_page = $req->post('return_page');
		$return_page = $return_page ? $return_page : '/';
    	$app->response()->redirect($return_page);
    } else {

    	if( $data['user_is_not_published'] == 1) {
	    	$app->render('encourageactiveaccount.html', $data);
	    } else {
	    	$data['login_error'] = 1;
	    	$app->render('login.html', $data);
	    }
    }

};


$loginForm = function() use ($app) {

	$req = $app->request();
	$return_page = $req->post('return_page');

	$env = $app->environment();
    $data = $env['req:data'];
    $data['login_error'] = $data['login_error'] ? $data['login_error'] : 0;

    if(!$data['is_logged']) {
    	$app->render('login.html', $data);
    } else {
    	$app->response()->redirect('/');
    }

};

function getSqlLogin($app) {

	$req = $app->request();
	$userid = $app->getCookie('userid');
	$email = $req->post('email');
    $password = $req->post('password');
    $sql = '';

    if(!$userid && (isset($email) && isset($password)) ){

      $sql = "SELECT id, email, name, first_name, last_name, photo, lang_id, num_vocabularies, num_subscribes, is_published FROM users WHERE email = '$email' AND password = '$password' ";

    } elseif(!$_SESSION['user'] && $userid) {

      $sql = "SELECT id, email, name, first_name, last_name, photo, lang_id, num_vocabularies, num_subscribes, is_published FROM users WHERE id = '$userid' ";

    }

	return $sql;
}




?>