<?php

	require_once("hdr.php");

	// POSTS
	$smarty->assign("countposts", countrows("id", "posts"));
	$smarty->assign("countpostsa", countrowsw("id", "posts", "isallowed", 1));

	// FORUM POSTS
	$smarty->assign("countfposts", countrows("id", "topics_comments"));
	$smarty->assign("countfpostsq", countrowsw("id", "topics_comments", "NOT quoteID", 0));

	// MEMBERS
	$smarty->assign("countmembers", countrows("memberID", "members"));
	$smarty->assign("countmembersa", countrowsw("memberID", "members", "active", "Yes"));

	// MEMBERS CHART
	include_once("memberschart.php");
	$smarty->assign("chartmembers", $datausl7d);

	// ASSIGNMENTS
	$stmt3 = $db->prepare("SELECT id,people FROM assignments");
  $stmt3->execute();
  $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);

	// API {

	$url = "http://host.igportals.ml/cmsapi/apiv3/index.php";
	$data = file_get_contents($url);
	$JSON = json_decode($data, true, JSON_UNESCAPED_UNICODE);

	$smarty->assign("jsonversion", $JSON["version"]);
	$smarty->assign("assignedversion", $vcms);

	// } API

  if (!$stmt3->execute())
  {
    print_r($stmt3->errorInfo());
  }

  while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC))
  {

    foreach(unserialize($row3["people"]) as $valueas){
      if($valueas["id"] == $_SESSION["memberID"]){
        $stmt4 = $db->prepare("SELECT * FROM assignments WHERE id=:id ORDER BY id DESC LIMIT 5");
        $stmt4->execute(array(":id" => $row3["id"]));
        $row4 = $stmt4->fetch(PDO::FETCH_ASSOC);
        if (!$stmt4->execute())
        {
          print_r($stmt4->errorInfo());
        }
        while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
          switch($row4["priority"]){
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

          $assignmentsfinal[] = $row4 + $status;
        }

      }
    }

  }

  $smarty->assign("assgnid", $assignmentsfinal);

	$smarty->display("index.tpl");

?>
