<?php

class User extends Db_object {
   
protected static $db_table = "users";
protected static $db_table_fields = array('id', 'username', 'email', 'password', 'first_name', 'last_name', 'gender', 'role');

public $id;
public $username;
public $email;
public $password;
public $first_name;
public $last_name; 
public $gender;
public $reports; 
public $restriction; 
public $role; 
public $upload_directory = "images";
public $image_placeholder = "images/male.png";

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


public static function verify_user($username, $password) {

global $database;
    
$username = $database->escape_string($username);
$password = $database->escape_string($password);
     
$sql  = "SELECT * FROM " . self::$db_table . " WHERE ";
$sql .= "username = '{$username}' ";
$sql .= "AND password = '{$password}' ";
$sql .= "LIMIT 1";
    
$the_resault_array = self::find_by_query($sql);

return !empty($the_resault_array) ? array_shift($the_resault_array) : false;    

}  


public static function verify_admin($username, $password) {

global $database;
    
$username = $database->escape_string($username);
$password = $database->escape_string($password);
     
$sql  = "SELECT * FROM " . self::$db_table . " WHERE ";
$sql .= "username     = '{$username}' ";
$sql .= "AND password = '{$password}' ";
$sql .= "AND role = 'admin' ";
$sql .= "LIMIT 1";
    
$_SESSION['admin_username'] = $username;

    
$the_resault_array = self::find_by_query($sql);

return !empty($the_resault_array) ? array_shift($the_resault_array) : false;    


    
}


public static function username_exist($username) {

global $database;
    
$sql = "SELECT username FROM users WHERE username = '$username'";
$result_set_users = $database->query($sql);

$num_rows_users = mysqli_num_rows($result_set_users);
        
return $num_rows_users;
   
}


public static function email_exist($email) {
    
global $database;    
    
$sql = "SELECT email FROM users WHERE email = '$email'";
$result_set = $database->query($sql);
    
$num_rows = mysqli_num_rows($result_set);
    
return $num_rows;

    
}

} // EndClassUser

?>