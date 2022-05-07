<?php

  require_once("hdr.php");

  getperm(201);

  $item = getfromDBijM("*", "case_items", "categories", "rarity", "catID", "id", $_GET['id'], "");
  $smarty->assign("item", $item);

  $smarty->display("items.tpl");

?>
