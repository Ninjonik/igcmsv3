<?php

  require_once("hdr.php");

  getperm(12);

  $stmt2 = $db->prepare("SELECT * FROM pages ORDER BY id");
	$stmt2->execute(array());
	$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

	if (!$stmt2->execute())
	{
		print_r($stmt2->errorInfo());
	}

	while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
	{
		$pages[] = $row2;
	}
	$smarty->assign("pages", $pages);

  $smarty->display("pages.tpl");

?>
