<?php

  require_once("hdr.php");

  getperm(201);

  $item = getfromDBw("*", "case_cases", "id", $_GET["id"]);
  $smarty->assign("item", $item);

  $smarty->display("editcase.tpl");
    
  if(isset($_POST["submit"])){

    $itemslist = serialize($_POST["itemslist"]);

    $stmt = $db->prepare('UPDATE case_cases SET title=:title, price=:price, `desc`=:desc, createdDate=:createdDate, creatorID=:creatorID WHERE id=:id');
    $stmt->execute(array(
        ':title' => $_POST["title"],
        ':price' => $_POST["value"],
        ':desc' => $_POST["desc"],
        ':createdDate' => time(),
        ':creatorID' => $_SESSION["memberID"],
        ':id' => $_GET["id"]
    ));

    header("Location: cases?action=casesuccessfullyedited");

}

?>
