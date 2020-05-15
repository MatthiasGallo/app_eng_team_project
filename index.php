<?php

define('APPLICATION_PATH', realpath(dirname(__FILE__).'/app'));

const DS = DIRECTORY_SEPARATOR;

require APPLICATION_PATH . DS . 'config' . DS . 'config.php';

/* Require Header */

require $config['MODEL_PATH']. 'stock.php';

require $config['CONTROLLER_PATH']. 'stock.php';

require $config['VIEW_PATH']. 'stock.php';

require $config['VIEW_PATH']. 'errorpage.php';

$pagename = $_GET['n'];


$ModelStock = new Model\Stock($pagename);

$Statement = $ModelStock->getCompany();

if ($Statement === false){

    $error_page = new View\Errorpage();

    $error_page->getNoPageFound();
    
}else {

    $ControllerStock = new Controller\Stock($Statement);

    $ContentArray = $ControllerStock->getContentArray();

    $ViewStock = new View\Stock($ContentArray);

    $ViewStock->Content();

}

?>


