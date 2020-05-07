<?php

// Globals
define('SERVER', 'localhost');
define('DATABASE', 'item-tool');
define('USER', 'root');
define('PASSWORD', '');
echo "<script>console.log(".json_encode($_SERVER).");</script>";
if ($_SERVER['HTTP_HOST'] == "itemtool.local"){
    define('IMG_PATH', '/assets/images');
}else{
    define('IMG_PATH', '/public_html/assets/images');
}


// load database
require_once('models/database.php');