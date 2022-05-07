<?php

  require_once("hdr.php");
  
  getperm(6);

  $stmt2 = $db->prepare("SELECT * FROM forums ORDER BY id");
  $stmt2->execute(array());
  $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

  if (!$stmt2->execute())
  {
    print_r($stmt2->errorInfo());
  }

  while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
  {
    $forums[] = $row2;
  }
  $smarty->assign("forums", $forums);

  if(isset($_POST["submit"])){

    isempty($_POST["title"], "createforum.php?action=missingtitle");

    if(empty($_POST["order"])){
      $order = 0;
    } else {
      $order = $_POST["order"];
    }

    if(empty($_POST["parent"])){
      $parent = 0;
    } else {
      $parent = $_POST["parent"];
    }

      $stmt = $db->prepare('INSERT INTO forums (title,`desc`,`order`,parent,icon) VALUES (:title, :descr, :order, :parent, :icon)');
      $stmt->execute(array(
          ':title' => $_POST["title"],
          ':descr' => $_POST["desc"],
          ':order' => $order,
          ':parent' => $parent,
          ':icon' => $_POST["icon"]
      ));

      header("Location: forums.php?action=forumsuccessfullycreated");

  }

  $smarty->display("createforum.tpl");

?>
