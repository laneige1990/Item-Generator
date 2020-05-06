<?php
require_once('loader.php'); 
die(print_r($_POST));
// register image
require_once('models/image.php');
new Images();
// redirect back to home
header('Location: http://'. $_SERVER["HTTP_HOST"]);
exit;