<?php
require_once('loader.php'); 
// move to ajax call
if ($_GET['r'] == "gen"){
    require_once('models/item.php');
    $item = new Item();
    $item->potentialImages();
//    die(print_r($_POST));
}elseif ($_GET['r'] == "data"){
    require_once('models/data.php');
    new Data();
//    die(print_r($_POST));
}else{
    // register image
    require_once('models/image.php');
    new Images();
    // redirect back to home
    header('Location: http://'. $_SERVER["HTTP_HOST"]);
    exit;
}
