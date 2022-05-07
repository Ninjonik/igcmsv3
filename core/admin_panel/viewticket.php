<?php

  require_once("hdr.php");

  getperm(9);

  $stmt2e = $db->prepare("SELECT T.*, TC.* FROM tickets as T INNER JOIN categories as TC ON TC.catID=T.catID WHERE id=:id");
	$stmt2e->execute(array(":id" => $_GET["id"]));
	$row2e = $stmt2e->fetch(PDO::FETCH_ASSOC);

	if (!$stmt2e->execute())
	{
		print_r($stmt2e->errorInfo());
	}

	while ($row2e = $stmt2e->fetch(PDO::FETCH_ASSOC))
	{
		$tickets[] = $row2e;
	}

  if(isset($_POST["status"])){
    $stmt2e = $db->prepare("UPDATE tickets SET status=:status WHERE id=:id");
  	$stmt2e->execute(array(":status" => $_POST["status"], ":id" => $_GET["id"]));
  	$row2e = $stmt2e->fetch(PDO::FETCH_ASSOC);

  	if (!$stmt2e->execute())
  	{
  		print_r($stmt2e->errorInfo());
  	}

    header("Location: viewticket?id=".$_GET["id"]."&action=statuschanged");

  }

  foreach($tickets as $key => $csm)
   {
    switch($tickets[$key]["status"]){
      case 0:
        $status["statustitle"] = 'Čaká sa na podporu';
        break;
      case 1:
        $status["statustitle"] = 'Rieši sa';
        break;
      case 2:
        $status["statustitle"] = 'Vyriešené';
        break;
      case 3:
        $status["statustitle"] = 'Uzavreté';
        break;
      case 4:
        $status["statustitle"] = 'Odložené';
        break;
      case 5:
        $status["statustitle"] = 'Čaká sa na uživateľa';
        break;
    }
      $tickets[$key]['statustitle'] = $status["statustitle"];
   }

  $smarty->assign("tickets", $tickets);

  // ASSIGNMENT COMMENTS
  $stmt4 = $db->prepare("SELECT * FROM tickets_comments WHERE ticketID=:ticketID ORDER BY time");
  $stmt4->execute(array(":ticketID" => htmlspecialchars($_GET["id"])));
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

			$stmt = $db->prepare('INSERT INTO tickets_comments (userID,`desc`,`time`,ticketID,type) VALUES (:userID, :desc, :time, :ticketID, :type)');
			$stmt->execute(array(
					':userID' => $_SESSION["memberID"],
					':desc' => $_POST["desc"],
					':time' => time(),
					':ticketID' => htmlspecialchars($_GET["id"]),
          ':type' => 1
			));

			header("Location: viewticket?id=".htmlspecialchars($_GET['id'])."&action=commentadded");
}

$smarty->display("viewticket.tpl");

?>
