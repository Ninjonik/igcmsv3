<?php

  require_once("hdr.php");

  getperm(201);

  $categories = getfromDBmw("*", "categories", "type", 2);
  $smarty->assign("categories", $categories);

  $smarty->display("createitems.tpl");

    
  if(isset($_POST["submit"])){

    $stmt = $db->prepare('INSERT INTO case_items (title,`value`,`desc`,rarity) VALUES (:title, :value, :desc, :rarity)');
    $stmt->execute(array(
        ':title' => $_POST["title"],
        ':value' => $_POST["value"],
        ':desc' => $_POST["desc"],
        ':rarity' => $_POST["category"]
    ));

    header("Location: items?action=itemsuccessfullycreated");

}

?>
