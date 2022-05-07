<?php

  require_once("hdr.php");

  getperm(13);

  $stmt2 = $db->prepare("SELECT * FROM categories ORDER BY id");
  $stmt2->execute(array());
  $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

  if (!$stmt2->execute())
  {
    print_r($stmt2->errorInfo());
  }

  while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
  {
    $cats[] = $row2;
  }
  $smarty->assign("cats", $cats);

  if (isset($_POST['submit'])) {

        isempty("createpost?action=fillallfields", $_POST["category"]);
        isempty("createpost?action=fillallfields", $_POST["title"]);
        isempty("createpost?action=fillallfields", $_POST["desc"]);

  			$file = $_FILES['file']['name'];

  			$stmt = $db->prepare('INSERT INTO posts (title,authorID,sectionID,text,date,editdate,isallowed,isuser) VALUES (:title, :authorID, :sectionID, :text, :date, :editdate, :isallowed, :isuser)');
  			$stmt->execute(array(
  					':title' => $_POST["title"],
  					':authorID' => $_SESSION["memberID"],
  					':sectionID' => $_POST['category'],
  					':text' => $_POST['desc'],
  					':date' => time(),
  					':editdate' => time(),
  					':isallowed' => 0,
            ':isuser' => 1
  			));

  			$id = $db->lastInsertId('id');

  			header("Location: viewpost?id=".$id."&postcreated");
  }

  $smarty->display("createpost.tpl")

?>
