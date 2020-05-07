<?php
require_once('loader.php'); 
// move to ajax call
if (isset($_GET['r'])){
    require_once('models/item.php');
    new Item();
    die(print_r($_POST));
}else{
    // register image
    require_once('models/image.php');
    new Images();
    // redirect back to home
    header('Location: http://'. $_SERVER["HTTP_HOST"]);
    exit;
}
