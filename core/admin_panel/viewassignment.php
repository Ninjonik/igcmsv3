<?php

  require_once("hdr.php");

  $moduleclass = new moduleinfo(4,$db);
  $modulestatus = $moduleclass->modulestatus();
  getperm(4);

  $stmt2 = $db->prepare("SELECT * FROM assignments WHERE id=:id");
	$stmt2->execute(array(":id" => htmlspecialchars($_GET["id"])));
	$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

	if (!$stmt2->execute())
	{
		print_r($stmt2->errorInfo());
	}

	while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
	{
		$assignments[] = $row2;
    foreach(unserialize($row2["people"]) as $ppl){
      $stmt89 = $db->prepare("SELECT username FROM members WHERE memberID=:memberID");
      $stmt89->execute(array(":memberID" => $ppl["id"]));
      $row89 = $stmt89->fetch(PDO::FETCH_ASSOC);
      if (!$stmt89->execute())
      {
        print_r($stmt89->errorInfo());
      }

      $retarder2["avatar"] = getAvatar(100, $ppl['id']);

      while($row89 = $stmt89->fetch(PDO::FETCH_ASSOC)){
        $assignedto899[] = $row89 + $retarder2;
      }
    }
	}

	$smarty->assign("assignments", $assignments);
  $smarty->assign("assignedto899", $assignedto899);

  // ASSIGNMENT COMMENTS
  $stmt4 = $db->prepare("SELECT * FROM assignments_comments WHERE assignmentID=:assignmentID ORDER BY time");
  $stmt4->execute(array(":assignmentID" => htmlspecialchars($_GET["id"])));
  $row4 = $stmt4->fetch(PDO::FETCH_ASSOC);

  if (!$stmt4->execute())
  {
    print_r($stmt4->errorInfo());
  }

  while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC))
  {
    $imgtop[] = $row4;
  }

  foreach($imgtop as $imgtop2){
    $stmt3 = $db->prepare("SELECT username FROM members WHERE memberID=:memberID");
    $stmt3->execute(array(":memberID" => $imgtop2["userID"]));
    $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
    if (!$stmt3->execute())
    {
      print_r($stmt3->errorInfo());
    }

    $retarder["avatar"] = getAvatar(100, $imgtop2['userID']);

    $arrayfinal[] = $imgtop2 + $row3 + $retarder;

  }

$smarty->assign("imgtop", $arrayfinal);

// CREATE COMMENT
if (isset($_POST['submit'])) {

			$stmt = $db->prepare('INSERT INTO assignments_comments (userID,`desc`,`time`,assignmentID) VALUES (:userID, :desc, :time, :assignmentID)');
			$stmt->execute(array(
					':userID' => $_SESSION["memberID"],
					':desc' => $_POST["desc"],
					':time' => time(),
					':assignmentID' => htmlspecialchars($_GET["id"])
			));

			header("Location: viewassignment?id=".htmlspecialchars($_GET['id'])."&action=commentadded");
}

// QUOTES

$quote = "";

if(!empty($_GET["quote"])){
     $stmtci = $db->prepare('SELECT * FROM assignments_comments WHERE id=:id');
		 $stmtci->execute(array(':id' => htmlspecialchars($_GET["quote"])));
		 $rowci = $stmtci->fetch(PDO::FETCH_ASSOC);

		 $stmtcim = $db->prepare('SELECT * FROM members WHERE memberID=:id');
		 $stmtcim->execute(array(':id' => $rowci["userID"]));
		 $rowcim = $stmtcim->fetch(PDO::FETCH_ASSOC);

		 $r2mdate = date("d.m.Y H:i", $rowci["time"]);

     $quote = '<div style="background:##2c2d2e; border:1px solid #cccccc; padding:5px 10px"><em>'.$rowcim["username"].' povedal  '.$r2mdate.'</em></div>
               <div style="background:##2c2d2e; border:1px solid #cccccc; padding:5px 10px"><em>'.$rowci["desc"].'</em></div>';

}

$smarty->assign("quote", $quote);

$smarty->display("viewassignment.tpl");

?>
