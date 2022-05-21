<?php

require_once("hdr.php");

  $rowtickets = getfromDBijMa("T1.*, T2.*", "tickets", "categories", "catID", "catID", "ORDER BY editdate DESC");

  foreach($rowtickets as $key => $csm)
   {
    switch($rowtickets[$key]["status"]){
      case 0:
        $status["statustitle"] = '<button type="button" class="btn btn-primary">Čaká sa na podporu</button>';
        break;
      case 1:
        $status["statustitle"] = '<button type="button" class="btn btn-info">Rieši sa</button>';
        break;
      case 2:
        $status["statustitle"] = '<button type="button" class="btn btn-success">Vyriešené</button>';
        break;
      case 3:
        $status["statustitle"] = '<button type="button" class="btn btn-danger">Uzavreté</button>';
        break;
      case 4:
        $status["statustitle"] = '<button type="button" class="btn btn-warning">Odložené</button>';
        break;
      case 5:
        $status["statustitle"] = '<button type="button" class="btn btn-default">Čaká sa na uživateľa</button>';
        break;
    }
      $rowtickets[$key]['statustitle'] = $status["statustitle"];
   }

  $smarty->assign("tickets", $rowtickets);

  $smarty->assign("status", $status);

  $smarty->display("tickets.tpl");

?>
