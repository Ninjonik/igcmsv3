<?php

  require_once("hdr.php");

  getperm(5);

  $stmt2 = $db->prepare("SELECT * FROM assignments ORDER BY `id` DESC");
	$stmt2->execute(array());
	$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

	if (!$stmt2->execute())
	{
		print_r($stmt2->errorInfo());
	}

	while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
	{
		$assignments2[] = $row2;
	}

  foreach($assignments2 as $assignments3){
    switch($assignments3["priority"]){
      case "0":
        $status["status"] = '<button class="btn btn-primary">Nie dôležitá</button>';
        break;
      case "1":
        $status["status"] = '<button class="btn btn-info">Nízka</button>';
        break;
      case "2":
        $status["status"] = '<button class="btn btn-success">Normálna</button>';
        break;
      case "3":
        $status["status"] = '<button class="btn btn-warning">Vysoká</button>';
        break;
      case "4":
        $status["status"] = '<button class="btn btn-danger">Súrna</button>';
        break;
      default:
        $status["status"] = '<button class="btn btn-danger">Chyba</button>';
        break;
    }

  	$assignments[] = $assignments3 + $status;

  }

	$smarty->assign("assignments", $assignments);

  $smarty->display("assignments.tpl");

?>
