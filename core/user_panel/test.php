<?php

require_once("hdr.php");

$userinfo = new userinfo(9,$db);
$usergroupinfo   = $userinfo->usrgrpdetails("groups.html");
var_dump($usergroupinfo);
echo $usergroupinfo["html"];

?>
