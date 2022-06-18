<?php

  require_once("hdr.php");

  getperm(11);

  $item = getfromDBm("*", "settings_modules");
  $smarty->assign("modules", $item);

  if(isset($_POST["submit"])){
    foreach($item as $itemslist){
      updateDB("settings_modules", "value='".$_POST[$itemslist['id']]."'", "id='".$itemslist['id']."'");
      header("Location: settings_modules?action=successfullyupdated");
    }
  } 

  $smarty->display("settings_modules.tpl");

?>
