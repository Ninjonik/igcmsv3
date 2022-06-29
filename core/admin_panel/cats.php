<?php

  require_once("hdr.php");

  getperm(3);

  $stmt2 = $db->prepare("SELECT * FROM categories ORDER BY catID");
	$stmt2->execute(array());
	$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

	if (!$stmt2->execute())
	{
		print_r($stmt2->errorInfo());
	}

	while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
	{
		$categories[] = $row2;
	}
	$smarty->assign("categories", $categories);

  $smarty->display("cats.tpl");

?>
