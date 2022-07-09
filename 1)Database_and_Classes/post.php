<?php 

class Post extends Db_object {

protected static $db_table = "posts";
protected static $db_table_fields = array('id', 'title', 'Introductory_text', 'main_text', 'image', 'paragraph', 'type', 'size', 'category_id', 'priority','date');

public $id;
public $title;
public $Introductory_text;
public $main_text;
public $image;
public $paragraph;
public $type; 
public $size;
public $category_id;
public $priority;
public $date;
    
public $filename;

public $upload_directory = "images";
public $image_placeholder = "images/default.jpg";

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

    

    


    

public static function posts_in_category($category) {
    
return static::find_by_query("SELECT * FROM posts WHERE category_id = '" . $category . "'" . "order by length(priority), priority");  

}
 
public static function featured_posts() {
    
return static::find_by_query("SELECT * FROM posts ORDER BY RAND()  LIMIT 5 ");

}
    
public static function trending_posts() {
    
return static::find_by_query("SELECT * FROM posts ORDER BY RAND()  LIMIT 5 ");

}
    
    

    
    
    
    
public function picture_path() {

return empty($this->image) ? $this->image_placeholder : $this->upload_directory ."/".$this->image;

}
    
    
    
    
    
    
public function set_file($file) {

if(empty($file) || !$file || !is_array($file)) {

$this->errors[] = "There was no file uploaded here";
return false;

} else if($file['error'] != 0) {

$this->errors[] = $this->upload_errors_array[$file['error']];
return false;

} else {

$this->filename = basename($file['name']);
$this->tmp_path = $file['tmp_name'];
$this->type = $file['type'];
$this->size = $file['size'];



}
}

    
    


    
   
public function upload_photo() {



if(!empty($this->errors)) {

return false;

}

if(empty($this->filename) || empty($this->tmp_path)) {

$this->errors[] = "The file was not avaliable";
return false;

}

$target_path = $_SERVER['DOCUMENT_ROOT'] . "/Watcher/CMS/" . $this->upload_directory . "/" . $this->filename;

//$target_path = $_SERVER['DOCUMENT_ROOT'] . "/CMS/" . $this->upload_directory . basename($_FILES['uploadedFile']['name']);


if(file_exists($target_path)) {

$this->errors[] = "The file {$this->filename} already exists";
 return false;

}




if(move_uploaded_file($this->tmp_path, $target_path)) {

unset($this->tmp_path);
return true;


} else {

$this->errors[] = "The file directory does not have premision";
return false;

}

}  
  
  
    
 
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    



public function delete_post() {

if($this->delete()) {
    
print_r($this->picture_path());    
    
if($this->picture_path() != "images/default.jpg") {    
    
$target_path = $_SERVER['DOCUMENT_ROOT'] . "/Watcher_R/CMS/" . $this->picture_path();

}

return unlink($target_path) ? true : false;

} else {

return false;

}

}



public static function display_sidebar_data($photo_id) {

$photo = Photo::find_by_id($photo_id);

$output  = "<a class='thumbnail' href=''><img width='100%' src='{$photo->picture_path()}'></a>";
$output .= "<p>{$photo->image}</p>";
$output .= "<p>{$photo->type}</p>";
$output .= "<p>{$photo->size}</p>";

echo $output;

}




}

?>