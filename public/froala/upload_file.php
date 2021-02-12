<?php

// Allowed extentions.
$allowedExts = array("txt", "pdf", "doc", "docx", "xls", "xlsx", "rtf", "zip", "rar", "pptx", ".ppt", ".pot", ".pps", ".ppa", ".pptx", ".potx", ".ppsx", ".ppam", ".pptm", ".potm", ".ppsm");


// Get filename.
$temp = explode(".", $_FILES["file1"]["name"]);

// Get extension.
$extension = end($temp);

//echo $extension;
//die();

// Validate uploaded files.
// Do not use $_FILES["file"]["type"] as it can be easily forged.
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES["file1"]["tmp_name"]);

//echo $mime;
//die();

if ((($mime == "text/plain")
|| ($mime == "text/rtf")
|| ($mime == "application/msword")
|| ($mime == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
|| ($mime == "application/x-pdf")
|| ($mime == "application/pdf")
|| ($mime == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
|| ($mime == "application/vnd-xls")
|| ($mime == "application/zip")
|| ($mime == "application/octet-stream")
|| ($mime == "application/x-compressed")
|| ($mime == "application/x-zip-compressed")
|| ($mime == "multipart/x-zip")
|| ($mime == "application/powerpoint")
|| ($mime == "application/mspowerpoint")
|| ($mime == "application/vnd.openxmlformats-officedocument.presentationml.presentation")
|| ($mime == "application/vnd.openxmlformats-officedocument.presentationml.presentation")
|| ($mime == "application/vnd.openxmlformats-officedocument.presentationml.template")
|| ($mime == "application/vnd.openxmlformats-officedocument.presentationml.slideshow")
|| ($mime == "application/vnd.ms-powerpoint.addin.macroEnabled.12")
|| ($mime == "application/vnd.ms-powerpoint.presentation.macroEnabled.12")
|| ($mime == "application/vnd.ms-powerpoint.template.macroEnabled.12")
|| ($mime == "application/vnd.ms-powerpoint.slideshow.macroEnabled.12")
|| ($mime == "application/vnd.ms-powerpoint")
|| ($mime == "application/x-rar")
|| ($mime == "application/rtf"))
    && in_array($extension, $allowedExts)) {
    // Generate new random name.
    $name = sha1(microtime()) . "." . $extension;

    // Save file in the uploads folder.
    move_uploaded_file($_FILES["file1"]["tmp_name"], "../files/".$name);

    // Generate response.
    $response = new StdClass;
    $response->link = url()."/files/" . $name;
//    $response->link = "http://localhost:9000/img/news/froala/" . $name;
    echo stripslashes(json_encode($response));
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
