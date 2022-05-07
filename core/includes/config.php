<?php

session_save_path("../../uploads/sessions");

ob_start();
session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ERROR || E_WARNING);



//set timezone
date_default_timezone_set('Europe/London');

require_once("version.php");
require_once("settings.php");

try {

	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";charset=utf8mb4;dbname=".DBNAME, DBUSER, DBPASS);
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);//Suggested to uncomment on production websites
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Suggested to comment on production websites
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
require_once('classes/userinfo.class.php');
require_once('classes/user.php');
require_once('classes/phpmailer/mail.php');
$user = new User($db);

//define include checker
define('included', 1);

require_once('functions.php');

// Smarty template engine
require_once("../libs/smarty/libs/Smarty.class.php");

// API.php
require_once("api.php");

// COOKIES FOR LOGGING IN
if(!$user->is_logged_in()){
  if($_COOKIE["loggedin"] == true){
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['memberID'] = $_COOKIE['memberID'];
  }
}

// SMARTY

$smarty = new Smarty();

if($sstatus == 0){
	$smarty->template_dir = '../../custom/templates/default/';
} else if ($sstatus == 1) {
	$smarty->template_dir = '../../custom/panel_templates/default/';
} else {
	echo 'Error Detected: Unreachable template folder';
}

$smarty->compile_dir = '../cache/';

$siteinform = getfromDB("*", "settings");

$sitetitle = $siteinform["siteTitle"];
$smarty->assign("siteTitle", $sitetitle);
$smarty->assign("username", $_SESSION['username']);

// GET USER INFORMATION

$userinfo = getfromDBnw("groupID", "members", "memberID", $_SESSION["memberID"]);
$smarty->assign("membercurrentID", $_SESSION["memberID"]);
$usergroupID = $userinfo["groupID"];

// GET PAGE INFORMATION

$siteinfo = getfromDBnw("background", "settings");
$smarty->assign("siteinfo", $siteinfo);

if(!empty($_GET["id"])){ $smarty->assign("getID", $_GET["id"]);}

// GET PLUGIN INFORMATION
$pluginsrow = getfromDBm("path", "plugins");
foreach($pluginsrow as $rowplugins){
	$pluginpath[] = $rowplugins["path"];
}
$smarty->assign("pluginpath", $pluginpath);

// LANGUAGE

if(isset($_GET['lang']))
{
	$lang = $_GET['lang'];
	$_SESSION['lang'] = $lang;
	setcookie("lang", $lang, time() + (3600 * 24 * 30));
}
else if(isset($_SESSION['lang']))
{
	$lang = $_SESSION['lang'];
}
else if(isset($_COOKIE['lang']))
{
	$lang = $_COOKIE['lang'];
}
else
{
	$lang = 'sk';
}

switch ($lang) {
  case 'en':
  $lang_file = 'en.php';
  break;

  case 'sk':
  $lang_file = 'sk.php';
  break;

  default:
  $lang_file = 'en.php';

}

require_once 'languages/'.$lang_file;

// AVATAR
$avataruser = getAvatar(100, $_SESSION["memberID"]);
$smarty->assign("avataruser", $avataruser);

// Errory

require_once("errors.php");
?>
