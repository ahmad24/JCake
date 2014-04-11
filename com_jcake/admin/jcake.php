<?php
defined('_JEXEC') or die;


class HTML_cake {
    function requestCakePHP($url) {
        //$_GET['url']=$url;
        $_SERVER['PATH_INFO'] = $url;
        require_once 'app/webroot/index.php';
    }
}

//require_once( JApplicationHelper::getPath('front_html') );
jimport('joomla.application.component.controller');
jimport('joomla.application.component.helper');

$document = JFactory::getDocument();
$document->setTitle("com_jcake: Ultimate Joomla Component");
$joomla_path = dirname(dirname(dirname(__FILE__)));



// As this component (cakephp) will need database access, lets include Joomla's config file
require_once(JPATH_ROOT.'/configuration.php');

// Constants to be used later in com_cake
$config = new JConfig();

define('JOOMLA_PATH',JURI::base());
define('DB_SERVER',$config->host);
define('DB_USER',$config->user);
define('DB_PASSWORD',$config->password);
define('DB_NAME',$config->db);
define('DB_PREFEX',$config->dbprefix);


//$controller = JRequest::getVar('module'); //option passed is treated as a controller in cake
$controller_action = JRequest::getVar('tasks'); //task passed is treated as a controller in cake
$param = JRequest::getVar('id');

$request = explode('.', $controller_action);
if(count($request)>1){
    $controller = $request[0];
    $action = $request[1];
}else{
    $controller = !empty($request[0])?$request[0]:'tests';
    $action = 'index';
}
//echo $controller .'   '.$action.'  '.$param;exit;


HTML_cake::requestCakePHP('/'.$controller.'/'.$action.'/'.$param);



