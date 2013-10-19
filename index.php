<?php
    session_start();

    error_reporting(E_ALL ^ E_NOTICE);

    /* SLIM SETTINGS */
    require_once 'vendor/autoload.php';

    $app = new \Slim\Slim();

    $app->config('templates.path', 'templates');

    \Slim\Extras\Views\Twig::$twigOptions = array(
        'charset'           => 'utf-8',
        'cache'             => 'templates/cache',
        'auto_reload'       => true,
        'strict_variables'  => false,
        'autoescape'        => false
    );

    $app->view(new \Slim\Extras\Views\Twig());

    /* DEFAULT VALUES FOR $data */
    $data = array(
        'is_logged'=>0,
        'vocabularyQuery'=>'',
        'currentUser'=>array(),
        'userLastActivities'=>0,
        'notifications'=>0,
        'success'=>0,
        'page_title'=>''
    );

    $env = $app->environment();
    $env['req:data'] = $data;


    /* INCLUDE MODULES */
    include('vendor/module/sql.php');
    include('vendor/module/authentication.php');
    include('vendor/module/general.php');
    include('vendor/module/lang.php');
    include('vendor/module/subscribe.php');
    include('vendor/module/user.php');
    include('vendor/module/vocabulary.php');
    include('vendor/module/library.php');
    include('vendor/module/translation.php');

    /* ROUTES */

    //------------------------GENERAL--------------------------

    //HOME
    $app->get('/', $isAuthenticated, $getLangs, $getHome);

    //USER HOME
    $app->get('/home', $isAuthenticated, $requireLogin, $getNewNotifications, $getUserSubscribes, $getUsersFromSubscribes, $getUsers, $getUserLastVocabularies, $getLangs, $getUserLastActivities, $getUserHome);

    //login POST
    $app->post('/login', $login, $isAuthenticated, $sendLogin);
    //login GET
    $app->get('/login', $isAuthenticated, $loginForm);
    //logout POST
    $app->post('/logout', $logout);
    $app->get('/logout', $logout);
    //remindme POST
    $app->post('/remindme', $sendPassword, $sendUserPassword);
    //remindme GET
    $app->get('/remindme', $isAuthenticated, $remindmeForm);
    //signup GET
    $app->get('/signup', $isAuthenticated, $getLangs, $signupForm);
    //verify GET
    $app->get('/verify/:userId/:hashCode', $isAuthenticated, $getUser, $verifyUserAccount, $sendVerifyAccount);


    //------------------------VOCABULARY------------------------

    // vocabularies GET
    $app->get('/vocabularies', $isAuthenticated, $requireLogin, $getNewNotifications, $prepareVocabularySql, $getVocabularies, $getUsers, $getLangs, $sendMyVocabularies);

    // vocabularies POST
    $app->post('/vocabularies', $isAuthenticated, $requireLogin, $getNewNotifications, $insertVocabulary, $getUser, $getUserNumVocabulary, $updateUserNumVocabulary, $updateUserLastVocabularies, $saveVocabulary);

    // vocabulary GET
    $app->get('/vocabularies/:vocabularyId', $isAuthenticated, $requireLogin, $getNewNotifications, $getVocabulary, $sendVocabulary);

    // vocabulary PUT
    $app->put('/vocabularies/:vocabularyId', $isAuthenticated, $requireLogin, $getNewNotifications, $updateVocabulary, $sendUpdateVocabulary);

    // vocabulary DELETE
    $app->delete('/vocabularies/:vocabularyId', $isAuthenticated, $requireLogin, $deleteVocabulary, $getUser, $getUserNumVocabulary, $updateUserNumVocabulary, $updateUserLastVocabularies, $sendDeleteVocabulary);

    // vocabulary POST update status
    $app->post('/vocabularies/update_status/:vocabularyId', $isAuthenticated, $requireLogin, $getVocabulary, $updateStatusVocabulary, $getUserNumVocabulary, $updateUserNumVocabulary, $sendUpdateStatusVocabulary);

    //------------------------USER VOCABULARY------------------------



    //------------------------SEARCH VOCABULARY------------------------
    // vocabulary GET
    $app->get('/vocabularies/search/:vocabularyQuery', $isAuthenticated, $getNewNotifications, $onlyPublishedVocabularies, $prepareVocabularySql, $getVocabulariesCount, $getVocabularies, $getUsers, $getLangs, $sendVocabularies);
    // vocabulary pagination GET
    $app->get('/vocabularies/search/:vocabularyQuery/:page', $isAuthenticated, $onlyPublishedVocabularies, $getNewNotifications, $prepareVocabularySql, $getVocabulariesCount, $getVocabularies, $getUsers, $getLangs, $sendVocabularies);

    // vocabulary order GET
    $app->get('/vocabularies/search/:vocabularyQuery/:page/orderby/:orderby', $isAuthenticated, $onlyPublishedVocabularies, $getNewNotifications, $prepareVocabularySql, $getVocabulariesCount, $getVocabularies, $getUsers, $getLangs, $sendVocabularies);



    //------------------------USER VOCABULARY------------------------

    $app->get('/vocabularies/user/:vocabularyUser', $isAuthenticated, $getNewNotifications, $onlyPublishedVocabularies, $prepareVocabularySql, $getVocabulariesCount, $getVocabularies, $getUsers, $getLangs, $sendUserVocabularies);

    $app->get('/vocabularies/user/:vocabularyUser/:page', $isAuthenticated, $getNewNotifications, $onlyPublishedVocabularies, $prepareVocabularySql, $getVocabulariesCount, $getVocabularies, $getUsers, $getLangs, $sendUserVocabularies);

    //$app->get('/vocabularies/user/:vocabularyUser/search/:vocabularyQuery', $isAuthenticated, $prepareVocabularySql, $getVocabulariesCount, $getVocabularies, $getUsers, $getLangs, $sendUserVocabularies);

    $app->get('/vocabularies/user/:vocabularyUser/:page/search/:vocabularyQuery', $isAuthenticated, $onlyPublishedVocabularies, $prepareVocabularySql, $getVocabulariesCount, $getVocabularies, $getUsers, $getLangs, $sendUserVocabularies);




    //------------------------SUBSCRIBES------------------------
    $app->get('/subscribes', $isAuthenticated, $requireLogin, $getNewNotifications, $getUserSubscribes, $sendUserSubscribes);
    $app->get('/users/subscribes', $isAuthenticated, $requireLogin, $getNewNotifications, $getUsersSubscribed, $sendUsers);
    $app->post('/subscribes', $isAuthenticated, $requireLogin, $getNewNotifications, $checkUserSubscribe, $insertUserSubscribe, $getUser, $updateUserNum, $sendUserSubscribe);

    $app->delete('/subscribes/:userSubscribeId', $isAuthenticated, $requireLogin, $getNewNotifications, $getSubscribe, $deleteUserSubscribe, $getUser, $updateUserNum, $sendDeleteUserSubscribe);

   //post: [this.isAuthenticated, this.checkUserSubscribe, this.insertUserSubscribe, this.getUser, this.updateUserNum, this.sendUserSubscribe],

    //------------------------USERS------------------------
    $app->get('/me', $isAuthenticated, $requireLogin, $getNewNotifications, $sendUser);
    $app->post('/user_image', $isAuthenticated, $requireLogin, $uploadUserImage);
    $app->post('/user_image_crop', $isAuthenticated, $requireLogin, $uploadUserImageCrop);
    $app->get('/users', $isAuthenticated, $requireLogin, $getNewNotifications, $sendUser);
    $app->get('/new_user', $isAuthenticated, $requireLogin, $getLangs, $sendUserForm);
    $app->post('/users', $checkUserExists, $insertUser, $saveUser);
    $app->post('/user_details', $checkUserExists, $updateUserPersonalDetails, $sendUserPersonalDetails);
    $app->post('/user_login', $checkUserExists, $updateUserLoginDetails, $sendUserLoginDetails);
    $app->post('/user_login_email', $checkUserExists, $updateUserLoginEmailDetails, $sendUserLoginEmailDetails);
    $app->get('/confirm_password/', $isAuthenticated, $requireLogin, $sendConfirmPassword);
    $app->get('/confirm_email/', $isAuthenticated, $requireLogin, $sendConfirmEmail);
    //$app->get('/users/:userId', $getUser, $sendUser);
    //$app->put('/users/:userId', $update);

   $app->get('/images/users/:image', function($image) use ($app){

        $image_array = explode('?', $image);

        header('Content-type:image/jpg');
        readfile("images/users/".$image_array[0]);

   });

    //------------------------TRANSLATIONS------------------------

    $app->get('/exercise/:vocabularyId', $isAuthenticated, $getNewNotifications, $getVocabulary, $checkIsPublished, $checkExistVocabularyInLibrary, $getUser, $insertUserLastActivity, $getCachedTranslations, $sendExercise);

    $app->get('/translations', $isAuthenticated, $requireLogin, $getNewNotifications, $getTranslations, $sendTranslations);


    $app->post('/translations', $isAuthenticated, $requireLogin, $getNewNotifications, $insertTranslation, $getVocabulary, $updateAddTranslation, $updateVocabularyNumTranslations, $getTranslations, $updateVocabularyCachedTranslations, $sendSaveTranslations);

    $app->put('/translations/:translationId', $isAuthenticated, $requireLogin, $getNewNotifications, $updateTranslation, $getVocabulary, $getTranslations, $updateVocabularyCachedTranslations, $sendUpdateTranslations);

    $app->delete('/translations/:translationId', $isAuthenticated, $requireLogin, $getNewNotifications, $getTranslation, $deleteTranslation, $getVocabulary, $updateDeleteTranslation, $updateVocabularyNumTranslations, $getTranslations, $updateVocabularyCachedTranslations, $sendDeleteTranslation);


    $app->get('/translations/vocabulary/:vocabularyId', $isAuthenticated, $requireLogin, $getNewNotifications, $getVocabulary, $checkOwnerVocabulary, $getTranslations, $getLangs, $sendTranslations);


    $app->post('/import_translations/:vocabularyId/', $isAuthenticated, $requireLogin, $getVocabulary, $importCsv, $updateVocabularyNumTranslations, $getTranslations, $updateVocabularyCachedTranslations, $sendSaveTranslations);



    //------------------------LIBRARY------------------------
    $app->get('/library', $isAuthenticated, $requireLogin, $getNewNotifications, $getUserLibrary, $prepareVocabularySql, $getVocabularies, $orderVocabulariesByVisit, $getUsers, $sendLibraryVocabularies);
    $app->post('/library', $isAuthenticated, $requireLogin, $getNewNotifications, $insertLibrary, $saveLibrary);
    $app->delete('/library/:libraryId', $isAuthenticated, $requireLogin, $getNewNotifications, $deleteUserLibrary, $sendDeleteUserLibrary);



    //------------------------AUDIO------------------------

    $getParams = function($route) use ($app){

        $params = $route->getParams();

        $env = $app->environment();
        $data = $env['req:data'];

        $data['lang'] = $params['lang'];
        $data['text'] = $params['text'];

        $env['req:data'] = $data;

    };

    $app->get('/audio/:lang/:text', $getParams, function() use ($app){

        $env = $app->environment();
        $data = $env['req:data'];
        $lang = $data['lang'];
        $text = urlencode($data['text']);

        $outputfile = getAudio($lang, $text);
        while ( $outputfile == false ) {
            $outputfile = getAudio($lang, $text);
        }

        header("Content-Type: audio/mpeg");
        header('Content-Length: ' . filesize($outputfile));
        header('Content-Disposition: inline; filename="'.$outputfile.'"');
        header('X-Pad: avoid browser bug');
        header('Cache-Control: no-cache');
        readfile($outputfile);

        die();
        /*$res['Content-Type'] = 'audio/mpeg';
        $res['Content-length'] = filesize($outputfile);
        $res['Content-Disposition'] = 'inline;filename="'.$outputfile.'"';
        $res['X-Pad'] = 'avoid browser bug';
        $res['Cache-Control'] = 'no-cache';
        $res['Content-Transfer-Encoding'] = 'chunked';
        //readfile($outputfile);
        readfile($outputfile);*/
    });

    function getAudio($lang, $text) {
        $url = 'http://translate.google.com/translate_tts?ie=UTF-8&tl='.$lang.'&q='.$text;
        //?ie=UTF-8
        $file_name = md5($text).'_'.$lang;
        $outputfile = 'audio/'.$file_name.".mp3";

        if(!file_exists($outputfile) || !filesize($outputfile)) {
            $cmd = "wget -q \"$url\" -c -U Chrome -O $outputfile";
            exec($cmd);
        }

        $filesize = filesize($outputfile);

        if( $filesize ) {
            return $outputfile;
        } else {
            return false;
        }
    }

    //$app->get('/:id', $isAuthenticated, $getHome);

    $app->notFound(function () use ($app) {
        $app->render('page404.html');
    });

    //$app->get('/getUserLastVocabularies', $getUserLastVocabularies, function() use ($app) {});

    /*
    html5 & javascript
    http://www.w3schools.com/html/tryit.asp?filename=tryhtml5_geolocation_map

    google maps api
    http://maps.googleapis.com/maps/api/geocode/json?latlng=55.6094249,13.0425317&language=en&sensor=false
    */

    $app->run();