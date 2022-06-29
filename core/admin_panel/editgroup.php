<?php

  require_once("hdr.php");

  getperm(2);

  $stmt2 = $db->prepare("SELECT * FROM `groups` WHERE id=:id");
	$stmt2->execute(array(":id" => $_GET["id"]));
	$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

	if (!$stmt2->execute())
	{
		print_r($stmt2->errorInfo());
	}

	while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
	{
		$groups = $row2;
	}

  $stmtg2 = $db->prepare('SELECT name, id FROM groups_perms ORDER BY id');
  $stmtg2->execute();
  $rowg2 = $stmtg2->fetch(PDO::FETCH_ASSOC);

  if (!$stmtg2->execute()) {
    print_r($stmtg2->errorInfo());
  }

  while ($rowg2 = $stmtg2->fetch(PDO::FETCH_ASSOC)) {
    $groupsnames[] = $rowg2;
    $permsvalue[] = ["name" => $rowg2["name"], "id" => $rowg2["id"]];
  }

  $smarty->assign("perms", $permissions);

    $stmtg = $db->prepare('SELECT perms FROM `groups` WHERE groups.id=:id');
    $stmtg->execute(array(":id" => htmlspecialchars($_GET["id"])));
    $rowg = $stmtg->fetch(PDO::FETCH_ASSOC);

    if (!$stmtg->execute()) {
      print_r($stmtg->errorInfo());
    }

    while ($rowg = $stmtg->fetch(PDO::FETCH_ASSOC)) {
      $groupsvalues = unserialize($rowg["perms"]);
    }

  $smarty->assign("groupsvalues", $groupsvalues);
	$smarty->assign("groupsnames", $groupsnames);
  $smarty->assign("groups2", $groups);

  $dbresult = getfromdbm("*", "groups_perms");
  $smarty->assign("permdata", $dbresult);

  $smarty->display("editgroup.tpl");

  if(empty($_GET["id"])){
    header("Location: index?action=invalidid");
  }

  $dbresult = getfromdbm("*", "groups_perms");

  $i = 0;
  foreach($dbresult as $dbresultos){
    $i++;
  }

  if(isset($_POST["submit"])){

    $perms = array();

    for ($x = 1; $x <= $i; $x++) {
      if(empty($_POST[strval($x)])){
        $perms[] = array('id' => $x, 'value' => 0);
      } else {
        echo $_POST[strval($x)];
        $perms[] = array('id' => $x, 'value' => 1);
      }
    }
    $rdyperms = serialize($perms);

    $title = $_POST["firstname"];
    $colour = $_POST["colour"];


    updateDB("groups", "title='".$title."', colour='".$colour."', perms='".$rdyperms."', html='".$_POST['html']."'", "id=".htmlspecialchars($_GET['id'])."");

    header("Location: groups?action=groupsuccesfullyedited");

  }

?>
