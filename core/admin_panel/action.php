<?php

  require_once("hdr.php");

  $action = $_GET["action"];
  $id = htmlspecialchars($_GET["id"]);
  $route = htmlspecialchars($_GET["route"]);
  $add = htmlspecialchars($_GET["add"]);
  $add2 = htmlspecialchars($_GET["add2"]);

  switch ($action) {
    case "deleteassignment":

      getperm(5);

      $stmt = $db->prepare("DELETE FROM assignments WHERE id=:id");
      $stmt->execute(array(
        ':id' => $id
      ));

      $stmt2 = $db->prepare("DELETE FROM assignments_comments WHERE assignmentID=:id");
      $stmt2->execute(array(
        ':id' => $id
      ));

      break;
    case "deletegroup":
        getperm(2);
        $stmt = $db->prepare("DELETE FROM `groups` WHERE id=:id");
        $stmt->execute(array(
          ':id' => $id
        ));
        break;
    case "deleteforum":
        getperm(6);
        $stmt = $db->prepare("DELETE FROM forums WHERE id=:id");
        $stmt->execute(array(
          ':id' => $id
        ));
        break;
    case "deletecat":
        getperm(3);
        $stmt = $db->prepare("DELETE FROM categories WHERE catID=:id");
        $stmt->execute(array(
          ':id' => $id
        ));
        break;
    case "deleteitem":
        getperm(201);
        $stmt = $db->prepare("DELETE FROM case_items WHERE id=:id");
        $stmt->execute(array(
          ':id' => $id
        ));
        break;
    case "deletecase":
      getperm(201);
      $stmt = $db->prepare("DELETE FROM case_cases WHERE id=:id");
      $stmt->execute(array(
        ':id' => $id
      ));
      break;
    default:
      header("Location: index.php?action=actionnotdefined");
  }

  header("Location: ".$route."");

?>
