<?php

  require_once("hdr.php");

  getperm(3);

  $smarty->display("createcat.tpl");

  if(isset($_POST["submit"])){

      $stmt = $db->prepare('INSERT INTO categories (name,type) VALUES (:name, :type)');
      $stmt->execute(array(
          ':name' => $_POST["catname"],
          ':type' => $_POST["type"]
      ));

      header("Location: cats?action=categorysuccessfullycreated");

  }

?>
