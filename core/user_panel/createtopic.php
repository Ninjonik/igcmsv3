<?php

require_once("hdr.php");

islog("createpost.php");
isempty("forum?action=invalidid", $_GET["id"]);
// CHECK IF IT IS CATEGORY OR NOT {
  $stmt255 = $db->prepare("SELECT * FROM forums WHERE id=:id");
  $stmt255->execute(array(":id" => $_GET["id"]));
  $row255 = $stmt255->fetch(PDO::FETCH_ASSOC);

  if (!$stmt255->execute())
  {
    print_r($stmt255->errorInfo());
  }

  if($row255["parent"] == 0){
    header("Location: forum?action=invalidid");
  }
// }

$stmt2 = $db->prepare("SELECT * FROM categories WHERE type=:type ORDER BY catID");
$stmt2->execute(array(":type" => 0));
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

      isempty("createtopic?action=fillallfields&id=".$_GET['id']."", $_POST["title"]);
      isempty("createtopic?action=fillallfields&id=".$_GET['id']."", $_POST["desc"]);

      if(empty($_POST["category"])){
        $category = 0;
      } else {
        $category = $_POST["category"];
      }

      $stmt = $db->prepare('INSERT INTO topics (authorID,forumID,`date`,catID,title,editdate) VALUES (:authorID, :forumID, :date, :catID, :title, :editdate)');
			$stmt->execute(array(
					':authorID' => $_SESSION["memberID"],
					':forumID' => $_GET["id"],
					':date' => time(),
          ':catID' => $category,
          ':title' => $_POST["title"],
          ':editdate' => time()
			));

      $id = $db->lastInsertId('id');

      $stmt3 = $db->prepare('INSERT INTO topics_comments (userID,`desc`,`time`,topicID) VALUES (:userID, :desc, :time, :topicID)');
			$stmt3->execute(array(
					':userID' => $_SESSION["memberID"],
					':desc' => $_POST["desc"],
					':time' => time(),
          ':topicID' => $id
			));

      $idno2 = $db->lastInsertId('id');

      $stmt4 = $db->prepare('UPDATE topics SET editcomID=:editcomID WHERE id=:id');
			$stmt4->execute(array(
					':editcomID' => $idno2,
          ':id' => $id
			));



			header("Location: viewtopic?id=".$id."&topiccreated");
}

$smarty->display("createtopic.tpl");
?>
