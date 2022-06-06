<?php

  require_once("hdr.php");

  $moduleclass = new moduleinfo(2,$db);
  $modulestatus = $moduleclass->modulestatus();
  getperm(6);

  $stmt2 = $db->prepare("SELECT * FROM forums ORDER BY id");
	$stmt2->execute(array());
	$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

	if (!$stmt2->execute())
	{
		print_r($stmt2->errorInfo());
	}

	while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
	{
		$forums[] = $row2;
	}
	$smarty->assign("forums", $forums);

  $smarty->display("forums.tpl");

?>
