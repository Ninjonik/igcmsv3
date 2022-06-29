<?php

  require_once("hdr.php");

  getperm(2);

  $dbresult = getfromdbm("*", "groups_perms");
  $smarty->assign("permdata", $dbresult);

  $i = 0;
  foreach($dbresult as $dbresultos){
    $i++;
  }

  if(isset($_POST["submit"])){

    $perms = array();

    for ($x = 1; $x <= $i; $x++) {
      if(empty($_POST[strval($x)])){
        $perms[] = array('id' => $x, 'value' => 0);
      } else {
        echo $_POST[strval($x)];
        $perms[] = array('id' => $x, 'value' => 1);
      }
    }
    $rdyperms = serialize($perms);

      $stmt = $db->prepare('INSERT INTO `groups` (title,colour,perms,html) VALUES (:title, :colour, :perms, :html)');
      $stmt->execute(array(
          ':title' => $_POST["firstname"],
          ':colour' => $_POST["colour"],
          ':perms' => $rdyperms,
          ':html' => $_POST["html"]
      ));

      header("Location: groups.php?action=groupsuccesfullycreated");

  }

  $smarty->display("creategroup.tpl");

?>
