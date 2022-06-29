<?php

require_once("hdr.php");

$moduleclass = new moduleinfo(5,$db);
$modulestatus = $moduleclass->modulestatus();

getperm(201);

$item = getfromDBijM("*", "case_cases", "members", "creatorID", "memberID", "id", "", "");
$smarty->assign("item", $item);

$smarty->display("cases.tpl");

?>
