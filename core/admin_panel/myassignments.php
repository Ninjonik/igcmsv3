<?php

  require_once("hdr.php");

  getperm(4);

  $stmt3 = $db->prepare("SELECT id,people FROM assignments");
  $stmt3->execute();
  $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);

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
$smarty->display("myassignments.tpl");

?>
