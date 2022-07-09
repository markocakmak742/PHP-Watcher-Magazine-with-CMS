<?php

class Comment extends Db_object {
   
protected static $db_table = "comments";
protected static $db_table_fields = array('id','post_id', 'user_id', 'body', 'reports', 'status', 'date');

public $id;
public $post_id;
public $user_id;
public $body;
public $reports;
public $status;
public $date;

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

    
public static function unapproved_comments() {

global $database;

$sql  = "SELECT * FROM " . self::$db_table;
$sql .= " WHERE status = 'Unapproved' ";
$sql .= " ORDER  BY post_id ASC";

return self::find_by_query($sql);

}
    



public static function find_the_comments($post_id=0) {

global $database;

$sql  = "SELECT * FROM " . self::$db_table;
$sql .= " WHERE post_id = " . $database->escape_string($post_id);
$sql .= " AND status = 'Approved' ";
$sql .= " ORDER  BY post_id ASC";

return self::find_by_query($sql);

}


public static function find_the_comments_limit($post_id=0) {

global $database;

$sql  = "SELECT * FROM " . self::$db_table;
$sql .= " WHERE post_id = " . $database->escape_string($post_id);
$sql .= " AND status = 'Approved' ";
$sql .= " ORDER  BY post_id ASC ";
$sql .= " LIMIT 3";

return self::find_by_query($sql);

}











  
    
  
    






    

    
    
    
    
} // EndClassComment
















?>