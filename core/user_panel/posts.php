<?php

	require_once("hdr.php");

  if(empty($_GET["searchcategory"])){
    $additional = "";
  } else {
    $additional = "WHERE sectionID=".htmlspecialchars($_GET['searchcategory'])." ";
  }

  $smarty->assign("quote", $quote);

  $stmt25 = $db->prepare("SELECT
    P.id,
    P.title,
    P.text,
    P.editdate,
    P.background,
    P.authorID,
    C.name,
		C.catID,
    M.username,
    M.avatar
    FROM
      posts AS P
    INNER JOIN categories AS C
    ON
      C.catID = P.sectionID
    INNER JOIN members AS M
    ON
      M.memberID = P.authorID
    ".$additional."
    ORDER BY P.editdate DESC LIMIT 10
  ");
  $stmt25->execute();
  $row25 = $stmt25->fetch(PDO::FETCH_ASSOC);

  if (!$stmt25->execute())
  {
    print_r($stmt25->errorInfo());
  }

  while ($row25 = $stmt25->fetch(PDO::FETCH_ASSOC))
  {
    $rowfirst[] = $row25;
  }

  foreach($rowfirst as $rowsecond){
    $avatar2["avataruser"] = getavatar(100, $rowsecond["authorID"]);
    $rowfinal3[] = $rowsecond + $avatar2;
  }

  $smarty->assign("posts", $rowfinal3);

  $smarty->display("posts.tpl");

?>
