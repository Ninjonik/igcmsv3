<?php

	require_once("hdr.php");

  $stmt2 = $db->prepare('SELECT * FROM posts WHERE authorID=:authorID');
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

  foreach($row2smarty2 as $row2smarty3){

    $stmt3 = $db->prepare("SELECT * FROM categories WHERE catID=:catID");
  	$stmt3->execute(array(":catID" => $row2smarty3["sectionID"]));
  	$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
  	if (!$stmt3->execute())
  	{
  		print_r($stmt3->errorInfo());
  	}

  	$row2smarty[] = $row2smarty3 + $row3;

  }

$smarty->assign("row2s", $row2smarty);
$smarty->display("myposts.tpl");

?>
