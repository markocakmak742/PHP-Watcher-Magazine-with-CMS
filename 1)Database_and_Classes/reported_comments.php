<?php

class reportedComment extends Db_object {
   
protected static $db_table = "reported_comments";
protected static $db_table_fields = array('id', 'comment_id' , 'post_id', 'user_id');

public $id;
public $comment_id;
public $post_id;
public $user_id;


public $errors = array();
public $upload_errors_array = array(

UPLOAD_ERR_OK => 'There is no error, the file uploaded with success',
UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded',
UPLOAD_ERR_NO_FILE => 'No file was uploaded',
UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder',
UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload.'

);

 
public static function find_reported_comment($comment) {

global $database;

$sql  = "SELECT * FROM " . self::$db_table;
$sql .= " WHERE comment_id = " . $comment;
$sql .= " ORDER  BY post_id ASC";

return self::find_by_query($sql);

}
    
    
public static function all_reported_comment() {

global $database;

$sql  = "SELECT  * FROM " . self::$db_table . " GROUP BY comment_id ";

return self::find_by_query($sql);

}

public static function count_of_reports($id) {

global $database;

$sql  = "SELECT  * FROM " . self::$db_table;
$sql .=" WHERE comment_id = " . $id ;

return self::find_by_query($sql);

}
    
public static function find_if_user_report($user,$post_id) {

global $database;

$sql  = "SELECT * FROM " . self::$db_table;
$sql .= " WHERE user_id = " . $user;
$sql .= " AND comment_id = " . $post_id;
" ORDER  BY post_id ASC";

return self::find_by_query($sql);

}
    
    
    
}
















?>