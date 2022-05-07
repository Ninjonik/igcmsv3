<?php

  require_once("hdr.php");

  getperm(11);

  $item = getfromDBijM("*", "members", "groups", "groupID", "id");
  $smarty->assign("members", $item);

  $smarty->display("members.tpl");

?>
