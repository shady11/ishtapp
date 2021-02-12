<?php

include('SimpleImage.php');
$image = new SimpleImage();
$image->load($_FILES["file"]["tmp_name"]);

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES["file"]["tmp_name"]);

if (in_array(strtolower($extension), $allowedExts)) {
    // Generate new random name.
    $name = sha1(microtime()) . "." . $extension;

    // Save file in the uploads folder.
//    move_uploaded_file($_FILES["file"]["tmp_name"], getcwd() . "/uploads/" . $name);

    $image->resizeToHeight(1024);
    $image->save("../img/news/".$name);

    // Generate response.
    $response = new StdClass;
    $response->link = url()."/img/news/" . $name;
//    $response->link = "http://localhost:8002/img/news/froala/" . $name;
    $response->file_name = $name;
    echo stripslashes(json_encode($response));
} else {
	echo 0;
}

function url(){
    return sprintf(
        "%s://%s%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME'],
        isset($_SERVER['SERVER_PORT']) ? ':'.$_SERVER['SERVER_PORT'] : ''
    );
}
?>
