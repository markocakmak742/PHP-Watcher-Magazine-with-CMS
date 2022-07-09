<?php

class Comment extends Db_object {
   
protected static $db_table = "comments";
protected static $db_table_fields = array('id','photo_id', 'author', 'body', 'reports', 'status');

public $id;
public $photo_id;
public $author;
public $body;
public $reports;
public $status;


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



public static function create_comment($photo_id, $author="John", $body="", $reports="0", $status="Unapproved") {

if(!empty($photo_id) && !empty($author) && !empty($body) ) {

$comment = new Comment();

$comment->photo_id = (int)$photo_id;
$comment->author   = $author;
$comment->body     = $body;
$comment->reports  = $reports;
$comment->status   = $status;

return $comment;

} else {

return false;

}
}
    
public static function unapproved_comments() {

global $database;

$sql  = "SELECT * FROM " . self::$db_table;
$sql .= " WHERE status = 'Unapproved' ";
$sql .= " ORDER  BY photo_id ASC";

return self::find_by_query($sql);

}
    
public static function reported_comments() {

global $database;

$sql  = "SELECT * FROM " . self::$db_table;
$sql .= " WHERE reports >= 1 ";
$sql .= " ORDER  BY photo_id ASC";

return self::find_by_query($sql);

}


public static function find_the_comments($photo_id=0) {

global $database;

$sql  = "SELECT * FROM " . self::$db_table;
$sql .= " WHERE photo_id = " . $database->escape_string($photo_id);
$sql .= " AND status = 'Approved' ";
$sql .= " ORDER  BY photo_id ASC";

return self::find_by_query($sql);

}


public static function find_the_comments_limit($photo_id=0) {

global $database;

$sql  = "SELECT * FROM " . self::$db_table;
$sql .= " WHERE photo_id = " . $database->escape_string($photo_id);
$sql .= " AND status = 'Approved' ";
$sql .= " ORDER  BY photo_id ASC ";
$sql .= " LIMIT 3";

return self::find_by_query($sql);

}











  
    
  
    






    

    
    
    
    
} // EndClassComment
















?>