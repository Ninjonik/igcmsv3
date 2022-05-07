<?php

  require_once("hdr.php");

  getperm(5);

  $stmt2 = $db->prepare("SELECT * FROM members ORDER BY memberID");
  $stmt2->execute(array());
  $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

  if (!$stmt2->execute())
  {
    print_r($stmt2->errorInfo());
  }

  while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
  {
    $assignto[] = $row2;
  }
  $smarty->assign("assignto", $assignto);

  if(isset($_POST["submit"])){

    foreach ($_POST['select'] as $selects){
      $people[] = ["id" => $selects];
    }

    $stmt2 = $db->prepare('INSERT INTO assignments (title,description,assignedBy,time,colour,priority,people,deadline) VALUES (:title, :description, :assignedBy, :time, :colour, :priority, :people, :deadline)');
    $stmt2->execute(array(
        ':title' => $_POST["title"],
        ':description' => $_POST["desc"],
        ':assignedBy' => $_SESSION["memberID"],
        ':time' => time(),
        ':colour' => $_POST["colour"],
        ':priority' => $_POST["priority"],
        ':people' => serialize($people),
        ':deadline' => strtotime($_POST["deadline"]),
    ));
    $idnumber = $db->lastInsertId('id');

    header("Location: assignments.php?action=assignmentssuccessfullycreated");

}

  $smarty->display("createassignment.tpl");

?>
