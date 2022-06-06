<?php

	require_once("hdr.php");

  $moduleclass = new moduleinfo(6,$db);
  $modulestatus = $moduleclass->modulestatus();

	isempty("index?action=invalidid", $_GET["id"]);

  $row = getfromDBw("*", "pages", "id", htmlspecialchars($_GET['id']));
  if(!empty($row["redirect"])){
    header("Location: ".$row['redirect']."");
  }

	$smarty->assign("page", $row);
	$smarty->display("viewpage.tpl");


?>
