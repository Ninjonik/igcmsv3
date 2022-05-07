<?php

  require_once("hdr.php");

  getperm(201);

  $item = getfromDBijM("*", "case_cases", "members", "creatorID", "memberID", "id", "", "");
  $smarty->assign("item", $item);

  $smarty->display("cases.tpl");

?>
