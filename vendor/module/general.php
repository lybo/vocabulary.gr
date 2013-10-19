<?php

$getHome = function() use ($app) {

	$req = $app->request();
	$res = $app->response();

	$env = $app->environment();
    $data = $env['req:data'];

    if( !$data['is_logged'] ){
    	$data['page_title'] = 'Welcome!';
    	$app->render('index.html', $data);
    } else {
    	$res->redirect('/home');
    }
    
};

$getUserHome = function() use ($app) {

	$req = $app->request();
	$res = $app->response();

	$env = $app->environment();
    $data = $env['req:data'];

    if( !$data['is_logged'] ){
    	$res->redirect('/');
    } else {
    	//print_r($data);
    	$data['page_title'] = 'Dashboard!';
    	$app->render('home.html', $data);
    	
    }
    
};

$getNewNotifications = function($route) use ($app) {

	$user_id = $_SESSION['user']['id'];

	if($user_id) {

		$req = $app->request();
		$res = $app->response();

		$env = $app->environment();
	    $data = $env['req:data'];

	    $db = getConnection();
	    $sql = "SELECT id, body FROM user_notifications WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 0, 5";
		$res = q($db, $sql);
		
		$rows = array();
		while( $row = $res->fetch_assoc()){
			$notifications[] = $row;
		}

		$data['notifications'] = $notifications;
		$env['req:data'] = $data;

	}
    
};

function new_notification($body) {


	$db = getConnection();

	$user_id = $_SESSION['user']['id'];
	$sql = "SELECT subscribe_user_id FROM user_subscribes WHERE user_id = '$user_id' ORDER BY id DESC";
	$res = q($db, $sql);
	
	$rows = array();
	while( $row = $res->fetch_assoc()){
		
	    $sql = "INSERT INTO user_notifications (`id`, `user_id`, `body`, `date_in`) VALUES (null, ?, ?, UNIX_TIMESTAMP() )";
	    $stmt = $db->prepare($sql);
		$stmt->bind_param( 'is',
			$row['subscribe_user_id'],
			$body
		);
		$stmt->execute();

	}

}


function getContentData($req) {
	$mediaType = $req->headers('ACCEPT');

	if( strpos($mediaType, 'json') !== false) {
		$result = 'json';
	}

	if( strpos($mediaType, 'html') !== false) {
		$result = 'html';
	}

	return $result;
}

function send_email($data){

	/*
	  VARIABLES
	  ------------------------
	  'template_id'=>'',
	  'fullname'=>'',
	  'to'=>'',
	  'from'=>'',
	  'CC'=>'',
	  'BCC'=>'',
	  'subject'=>'' 
	*/
	
	if(count($data)){
		foreach($data as $key=>$value){
			$$key = $value;
		}
	}
	
	
	if($message){
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		//$headers .= 'To: '.$fullname.' <'.$to.'>' . "\r\n";
		$headers .= 'From: donotreply <'.$from.'>' . "\r\n";
		if($CC){
			$headers .= 'Cc: '.$CC.'' . "\r\n";
		}
		
		if($BCC){
			$headers .= 'Bcc: '.$BCC.'' . "\r\n";
		}
		
		$return = mail($to, $subject, $message, $headers);

	}
	
	
	
	return $return;
}

function humanTiming ($time) {

    $time = time() - $time; // to get the time since that moment

    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    $approximately = array (
       'year', 'month', 'week', 'day'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.((in_array($text, $approximately))?'approximately ':'').$text.(($numberOfUnits>1)?'s':'').' ago';
    }

}



$uploadUserImageCrop = function() use ($app) {

	$req = $app->request();

	// Original image
	$filename = 'images/users/'.$_SESSION['user']['id'].'.jpg';
	//die(print_r($_POST));
	$new_filename = $filename;
	 
	// Get dimensions of the original image
	list($current_width, $current_height) = getimagesize($filename);
	 
	// The x and y coordinates on the original image where we
	// will begin cropping the image, taken from the form
	$x1    = $req->post('x1');
	$y1    = $req->post('y1');
	$x2    = $req->post('x2');
	$y2    = $req->post('y2');
	$w     = $req->post('w');
	$h     = $req->post('h');     
	 
	//die(print_r($_POST));
	 
	// This will be the final size of the image 
	$crop_width = 60;
	$crop_height = 60;
	 
	// Create our small image
	$new = imagecreatetruecolor($crop_width, $crop_height);
	// Create original image
	$current_image = imagecreatefromjpeg($filename);
	// resamling (actual cropping)
	imagecopyresampled($new, $current_image, 0, 0, $x1, $y1, $crop_width, $crop_height, $w, $h);
	// creating our new image
	imagejpeg($new, $new_filename, 95);

	$photo = '/images/users/'.$_SESSION['user']['id'].'.jpg';

	$db = getConnection();
	$sql = "UPDATE users SET 
              photo = ?
              WHERE id = ?";  
    $stmt = $db->prepare($sql);
	$stmt->bind_param( 'si',
		$photo,
		$_SESSION['user']['id']
	);
	$stmt->execute();
	$_SESSION['user']['photo'] = $photo;

	die(json_encode(array('success'=>'1', 'file_name'=>$photo)));
};

$uploadUserImage = function() use ($app) {

	$req = $app->request();
	$res = $app->response();

	$env = $app->environment();
    $data = $env['req:data'];

	if(!isset($_FILES['image'])){
        //required variables are empty
        //$res->body();
        die(json_encode(array('error'=>"File is empty!")));
        
    }


    if($_FILES['image']['error']){
        //File upload error encountered
        
        //$res->body();
        die(json_encode(array('error'=>upload_errors($_FILES['image']['error']))));
    }

    $FileName           = strtolower($_FILES['image']['name']); //uploaded file name
    
    $ImageExt           = substr($FileName, strrpos($FileName, '.')); //file extension
    $FileType           = $_FILES['image']['type']; //file type
    $FileSize           = $_FILES['image']["size"]; //file size
    $RandNumber         = rand(0, 9999999999); //Random number to make each filename unique.
    $uploaded_date      = date("Y-m-d H:i:s");

    switch(strtolower($FileType))
    {
        //allowed file types
        case 'image/png': //png file
        case 'image/gif': //gif file
        case 'image/jpeg': //jpeg file
        /*case 'application/pdf': //PDF file
        case 'application/msword': //ms word file
        case 'application/vnd.ms-excel': //ms excel file
        case 'application/x-zip-compressed': //zip file
        case 'text/plain': //text file
        case 'text/html': //html file*/
            break;
        default:
        	//$res->body();
        	die(json_encode(array('error'=>'Unsupported File!')));
            
    }


    //File Title will be used as new File name
   /*
	$NewFileName = preg_replace(array('/s/', '/.[.]+/', '/[^w_.-]/'), array('_', '.', ''), strtolower($FileTitle));
    $NewFileName = $NewFileName.'_'.$RandNumber.$ImageExt;
   */
    $NewFileName = $_SESSION['user']['id'].'_upload'.$ImageExt;
    $finalNewFileName = $_SESSION['user']['id'].'.jpg';
    $UploadDirectory = 'images/users/';


   //Rename and save uploded file to destination folder.
   if(move_uploaded_file($_FILES['image']["tmp_name"], $UploadDirectory . $NewFileName )){
        //connect & insert file record in database
        
        if(!convertImage($UploadDirectory . $NewFileName, $UploadDirectory . $finalNewFileName, 100)){
        	die(json_encode(array('error'=>'error uploading File!')));
        } else {

        	$image = new SimpleImage(); 
        	$image->load($UploadDirectory.$finalNewFileName); 
        	if( $image->getWidth() > 400 ) {
	        	$image->resizeToWidth(400);
	        	$image->save($UploadDirectory.$finalNewFileName);
	        }

	        chmod($UploadDirectory.$finalNewFileName,0755);
        	
        }

   }else{
   		//$res->body();
        die(json_encode(array('error'=>'error uploading File!')));
   }

  // echo $NewFileName;
   $res->body(json_encode(array('file_name'=>$finalNewFileName)));
};

//function outputs upload error messages, http://www.php.net/manual/en/features.file-upload.errors.php#90522
function upload_errors($err_code) {
    switch ($err_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}

function convertImage($originalImage, $outputImage, $quality) {
    // jpg, png, gif or bmp?
    $exploded = explode('.',$originalImage);
    $ext = $exploded[count($exploded) - 1]; 

    if (preg_match('/jpg|jpeg/i',$ext))
        $imageTmp=imagecreatefromjpeg($originalImage);
    else if (preg_match('/png/i',$ext))
        $imageTmp=imagecreatefrompng($originalImage);
    else if (preg_match('/gif/i',$ext))
        $imageTmp=imagecreatefromgif($originalImage);
    else if (preg_match('/bmp/i',$ext))
        $imageTmp=imagecreatefrombmp($originalImage);
    else
        return 0;

    // quality is a value from 0 (worst) to 100 (best)
    imagejpeg($imageTmp, $outputImage, $quality);
    imagedestroy($imageTmp);
    unlink($originalImage);
    return 1;
}

class SimpleImage {   
	var $image; 
	var $image_type;   
	function load($filename) {   
		$image_info = getimagesize($filename); 
		$this->image_type = $image_info[2]; 
		if( $this->image_type == IMAGETYPE_JPEG ) {   
			$this->image = imagecreatefromjpeg($filename); 
		} 
		elseif( $this->image_type == IMAGETYPE_GIF ) {   
			$this->image = imagecreatefromgif($filename); 
		} 
		elseif( $this->image_type == IMAGETYPE_PNG ) {   
			$this->image = imagecreatefrompng($filename); 
		} 
	} 

	function save($filename, $image_type=IMAGETYPE_JPEG, $compression=100, $permissions=null) {   
		if( $image_type == IMAGETYPE_JPEG ) { 
			imagejpeg($this->image,$filename,$compression); 
		} elseif( $image_type == IMAGETYPE_GIF ) {   
			imagegif($this->image,$filename); 
		} elseif( $image_type == IMAGETYPE_PNG ) {  
			imagepng($this->image,$filename); 
		}

		if( $permissions != null) {   
			chmod($filename,$permissions); 
		}
	} 

	function output($image_type=IMAGETYPE_JPEG) {   
		if( $image_type == IMAGETYPE_JPEG ) { 
			imagejpeg($this->image); 
		} elseif( $image_type == IMAGETYPE_GIF ) {   
			imagegif($this->image); 
		} elseif( $image_type == IMAGETYPE_PNG ) {   
			imagepng($this->image); } 
		} 
	function getWidth() {   
		return imagesx($this->image); 
	} 

	function getHeight() {   
		return imagesy($this->image); 
	} 

	function resizeToHeight($height) {   
		$ratio = $height / $this->getHeight(); $width = $this->getWidth() * $ratio; $this->resize($width,$height); 
	}   

	function resizeToWidth($width) { 
		$ratio = $width / $this->getWidth(); 
		$height = $this->getheight() * $ratio; 
		$this->resize($width,$height); 
	}   

	function scale($scale) { 
		$width = $this->getWidth() * $scale/100; $height = $this->getheight() * $scale/100; $this->resize($width,$height); 
	}   

	function resize($width,$height) { 
		$new_image = imagecreatetruecolor($width, $height); 
		imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight()); $this->image = $new_image;
	}  
}


function csv_to_array($filename='', $delimiter=',')
{
    if(!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = NULL;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
        while (($row = fgetcsv($handle, 10000, $delimiter)) !== FALSE)
        {
            if(!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }
    return $data;
}

