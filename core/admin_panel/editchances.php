<?php

  require_once("hdr.php");

  getperm(201);

  isempty("cases?action=invalidid", $_GET['id']);
  $item = getfromDBw("items", "case_cases", "id", $_GET['id']);
  foreach($item as $itemprefinal){
    $finalitem = unserialize($itemprefinal);
  }

  foreach($finalitem as $finalitemm){
    $itemnames[] = getfromDBw("*", "case_items", "id", $finalitemm["id"]);
    
  }
  $smarty->assign("item", $itemnames);

  if(isset($_POST["submit"])){
    $finalarrayos = [];
    foreach($_POST["chance"] as $key=>$value) {
        //$finalarrayos[$key] = $key;
        //$finalarrayos["chance"] = $value;
        $finalarrayos[] = array(
            "id" => $key,
            "chance" => $value
        );
        
        //$finalarrayos[$key] = $value;
        //array_push($finalarrayos, $value);
        
    }
    $ser = serialize($finalarrayos);
    $itemslist = serialize($_POST["itemslist"]);

    $stmt = $db->prepare('UPDATE case_cases SET items=:items WHERE id=:id');
    $stmt->execute(array(
      /*  ':title' => $_POST["title"],
        ':price' => $_POST["value"],
        ':desc' => $_POST["desc"],*/
        ':id' => $_GET["id"],
        ':items' => $ser/*,
        ':createdDate' => time(),
        ':creatorID' => $_SESSION["memberID"]*/
    ));

    header("Location: cases?action=chancessuccessfullyedited");
  }


  $smarty->display("editchances.tpl");

?>
