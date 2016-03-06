<?php
date_default_timezone_set('America/Sao_Paulo');

define('SYSTEM', './system/');
define('HELPERS', './system/helpers/');
define('CONTROLLERS', './apps/controllers/');
define('MODELS', './apps/models/');
define('VIEWS', './apps/views/');
define('TPLS', './apps/tpls/');

define('PATH', '/strap/responsive/');

define('BASEPATH', '/strap/responsive/');

function __autoload($file) {
    if(file_exists(MODELS . $file . ".php")) {
        require_once (MODELS . $file . ".php");
    } elseif(file_exists(HELPERS . $file . ".php")) {
        require_once (HELPERS . $file . ".php");
    } else {
        die('<h2><br /><br />A Classe ' . $file . 'n&atilde;o conseguiu ser carregada automaticamente!</h2>');
    }
}

if(file_exists(SYSTEM . "ApiImaV1.php")) {
    require_once (SYSTEM . "ApiImaV1.php");
}

if(file_exists(SYSTEM . "System.php")) {
    require_once (SYSTEM . "System.php");
}
if(file_exists(SYSTEM . "Controller.php")) {
    require_once (SYSTEM . "Controller.php");
}
if(file_exists(SYSTEM . "Model.php")) {
    require_once (SYSTEM . "Model.php");
}

$hackaton = new System();
