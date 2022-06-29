<?php

  require_once("hdr.php");

  getperm(201);

  $item = getfromDBijM("*", "case_items", "categories", "rarity", "catID");
  $smarty->assign("item", $item);

  $smarty->display("createcase.tpl");

  if(isset($_POST["submit"])){

    $itemslist = serialize($_POST["itemslist"]);

    $stmt = $db->prepare('INSERT INTO case_cases (title,price,`desc`,items,createdDate,creatorID) VALUES (:title, :price, :desc, :items, :createdDate, :creatorID)');
    $stmt->execute(array(
        ':title' => $_POST["title"],
        ':price' => $_POST["value"],
        ':desc' => $_POST["desc"],
        ':items' => $itemslist,
        ':createdDate' => time(),
        ':creatorID' => $_SESSION["memberID"]
    ));

    $idgetos = $db->lastInsertId('id');
    header("Location: editchances?id=".$idgetos."&action=editchances");

}

?>
