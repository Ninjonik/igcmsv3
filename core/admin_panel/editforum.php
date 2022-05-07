<?php

  require_once("hdr.php");

  getperm(6);

  $stmt2 = $db->prepare("SELECT * FROM forums WHERE id=:id");
	$stmt2->execute(array(":id" => $_GET["id"]));
	$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

	if (!$stmt2->execute())
	{
		print_r($stmt2->errorInfo());
	}

if($row2["parent"] != 0){
    $stmt22 = $db->prepare("SELECT title FROM forums WHERE id=:id");
  	$stmt22->execute(array(":id" => $row2["parent"]));
  	$row22 = $stmt22->fetch(PDO::FETCH_ASSOC);

  	if (!$stmt22->execute())
  	{
  		print_r($stmt22->errorInfo());
  	}

    $smarty->assign("parentsmarty", $row22);
  }

	$smarty->assign("forum", $row2);

  if(isset($_POST["submit"])){

    $title = $_POST["title"];
    $desc = $_POST["desc"];
    $order = $_POST["order"];
    $parent = $_POST["parent"];
    $icon = $_POST["icon"];

      updateDB("forums", "title='".$title."', `desc`='".$desc."', `order`='".$order."', parent='".$parent."', icon='".$icon."'", "id=".$_GET['id']."");

      header("Location: forums?action=forumsuccessfullyedited");

  }

  //

  $stmt23 = $db->prepare("SELECT * FROM forums WHERE NOT id=:id ORDER BY id");
  $stmt23->execute(array("id" => $_GET["id"]));
  $row23 = $stmt23->fetch(PDO::FETCH_ASSOC);

  if (!$stmt23->execute())
  {
    print_r($stmt23->errorInfo());
  }

  while ($row23 = $stmt23->fetch(PDO::FETCH_ASSOC))
  {
    $forums3[] = $row23;
  }
  $smarty->assign("forums3", $forums3);

  //

  $smarty->display("editforum.tpl");

  if(empty($_GET["id"])){
    header("Location: index?action=invalidid");
  }

?>
