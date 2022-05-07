<?php

  require_once("hdr.php");

  getperm(201);

  $item = getfromDBijWa("*", "case_items", "categories", "rarity", "catID", "id", $_GET['id'], "");
  $smarty->assign("item", $item);

  $categories = getfromDBmw("*", "categories", "type", 2);
  $smarty->assign("categories", $categories);


  isempty("items?action=invalidid", $_GET["id"]);

  $smarty->display("edititem.tpl");

    
  if(isset($_POST["submit"])){

    $stmt = $db->prepare('UPDATE case_items SET title=:title, `value`=:value, `desc`=:desc, :rarity=:rarity WHERE id=:id');
    $stmt->execute(array(
        ':title' => $_POST["title"],
        ':value' => $_POST["value"],
        ':desc' => $_POST["desc"],
        ':rarity' => $_POST["category"],
        ':id' => $_GET["id"]
    ));

    header("Location: items?action=itemsuccessfulyedited");

}

?>
