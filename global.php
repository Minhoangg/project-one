<?php
/**
 * Định nghĩa các url cần thiết sử dụng trong website
 */
$ROOT_URL = "";
$CONTENT_URL = "$ROOT_URL/content";
$ADMIN_URL = "$ROOT_URL/admin";
$SITE_URL = "$ROOT_URL/site";
$SL_PER_PAGE = 10;

//Định nghĩa đường dẫn chứa ảnh trong upload

$UPLOAD_URL = "../uploaded";

function save_file($fieldname, $target_dir)
{
    $file_uploaded = $_FILES[$fieldname];
    $file_name = basename($file_uploaded['name']);
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_uploaded['tmp_name'], $target_path);
    return $file_name;
}
