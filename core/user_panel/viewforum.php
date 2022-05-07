<?php

require_once("hdr.php");

$id = $_GET["id"];
isempty("forum?action=invalidid", $id);

// CHECK IF IT IS CATEGORY OR NOT {
  $stmt255 = $db->prepare("SELECT * FROM forums WHERE id=:id");
  $stmt255->execute(array(":id" => $id));
  $row255 = $stmt255->fetch(PDO::FETCH_ASSOC);

  if (!$stmt255->execute())
  {
    print_r($stmt255->errorInfo());
  }

  if($row255["parent"] == 0){
    header("Location: forum?action=invalidid");
  }
// }

// FORUMS {
$stmt25 = $db->prepare("SELECT * FROM forums WHERE parent=:parent ORDER by `order`");
$stmt25->execute(array(":parent" => $id));
$row25 = $stmt25->fetch(PDO::FETCH_ASSOC);

if (!$stmt25->execute())
{
  print_r($stmt25->errorInfo());
}

while ($row25 = $stmt25->fetch(PDO::FETCH_ASSOC)){
  $forums[] = $row25;

  //

  $stmt2524 = $db->prepare("SELECT forumID, editcomID, id FROM topics WHERE forumID=:forumID ORDER by `editdate` DESC LIMIT 1");
  $stmt2524->execute(array(":forumID" => $row25["id"]));
  $row2524 = $stmt2524->fetch(PDO::FETCH_ASSOC);

  if (!$stmt2524->execute())
  {
    print_r($stmt2524->errorInfo());
  }

  while ($row2524 = $stmt2524->fetch(PDO::FETCH_ASSOC))
  {

    $var1[] = $row2524;

    $stmt25245 = $db->prepare("SELECT
      T.userID,
      T.`desc`,
      T.`time`,
      T.id,
      M.username
      FROM topics_comments AS T
      INNER JOIN members AS M
      ON
        M.memberID = T.userID
      WHERE id=:id
    ");
    $stmt25245->execute(array(":id" => $row2524["editcomID"]));
    $row25245 = $stmt25245->fetch(PDO::FETCH_ASSOC);

    if (!$stmt25245->execute())
    {
      print_r($stmt25245->errorInfo());
    }

    while ($row25245 = $stmt25245->fetch(PDO::FETCH_ASSOC))
    {
      $var2[] = $row25245;
    }
  }

  //

}

$smarty->assign("forums", $forums);
// }

// TOPICS {
$stmt25248 = $db->prepare("SELECT T.*, M.username FROM topics AS T INNER JOIN members AS M ON M.memberID = T.authorID  WHERE forumID=:id ORDER by `editdate` DESC");
$stmt25248->execute(array(":id" => $id));
$row25248 = $stmt25248->fetch(PDO::FETCH_ASSOC);

if (!$stmt25248->execute())
{
  print_r($stmt25248->errorInfo());
}

while ($row25248 = $stmt25248->fetch(PDO::FETCH_ASSOC))
{

  $var18[] = $row25248;

  $stmt252458 = $db->prepare("SELECT
    T.userID,
    T.`desc`,
    T.`time`,
    T.topicID,
    T.id,
    M.username
    FROM topics_comments AS T
    INNER JOIN members AS M
    ON
      M.memberID = T.userID
    WHERE id=:id
  ");
  $stmt252458->execute(array(":id" => $row25248["editcomID"]));
  $row252458 = $stmt252458->fetch(PDO::FETCH_ASSOC);

  if (!$stmt252458->execute())
  {
    print_r($stmt252458->errorInfo());
  }

  while ($row252458 = $stmt252458->fetch(PDO::FETCH_ASSOC))
  {
    $var28[] = $row252458;
  }
}

foreach($var28 as $var38){
  $avatarus8["avatar"] = getavatar(100, $var38["userID"]);
  $varus8[] = $var38 + $avatarus8;
}
$smarty->assign("topics", $var18);
$smarty->assign("topics2", $varus8);
// }

foreach($var2 as $var3){
  $avatarus["avatar"] = getavatar(100, $var3["userID"]);
  $varus[] = $var3 + $avatarus;
}
$smarty->assign("lastupdate", $var1);
$smarty->assign("lastupdate2", $varus);

$smarty->display("viewforum.tpl");

?>
