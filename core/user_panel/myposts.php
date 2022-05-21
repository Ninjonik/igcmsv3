<?php

	require_once("hdr.php");

  $stmt2 = $db->prepare('SELECT P.*, C.* FROM posts as P INNER JOIN categories as C ON C.catID=P.sectionID WHERE authorID=:authorID');
  $stmt2->execute(array(':authorID' => $_SESSION['memberID']));
  $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

  if (!$stmt2->execute())
	{
		print_r($stmt2->errorInfo());
	}

  while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
	{
		$row2smarty2[] = $row2;
	}

$smarty->assign("row2s", $row2smarty2);
$smarty->display("myposts.tpl");

?>
