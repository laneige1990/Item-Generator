<?php

// Globals
if ($_SERVER['HTTP_HOST'] != "itemtool.local"){
    define('SERVER', '10.169.0.210');
    define('DATABASE', 'fastlane1_qtg7');
    define('USER', 'fastlane1_qtg7');
    define('PASSWORD', 'cx7y%a29FI%U3#5L');
}else{
    define('SERVER', 'localhost');
    define('DATABASE', 'item-tool_dev');
    define('USER', 'root');
    define('PASSWORD', '');
}

// load database
require_once('models/database.php');