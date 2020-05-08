<?php

// Globals
define('SERVER', 'localhost');
define('DATABASE', 'item-tool');
define('USER', 'root');
define('PASSWORD', '');

if ($_SERVER['HTTP_HOST'] != "itemtool.local"){
    define('SERVER', '10.169.0.210');
    define('DATABASE', 'fastlane1_qtg7');
    define('USER', 'root');
    define('PASSWORD', 'cx7y%a29FI%U3#5L');
}

// load database
require_once('models/database.php');