<?php

	require_once("hdr.php");

	isempty("posts?action=invalidid", $_GET["id"]);

  $row = getfromDBw("*", "posts", "id", htmlspecialchars($_GET['id']));

  $row2 = getfromDBw("name, catID", "categories", "catID", $row["sectionID"]);

	$row3 = getfromDBw("*", "members", "memberID", $row["authorID"]);


  // AVATAR

  $avatar["avatar"] = getavatar(100, $row["authorID"]);

  $rowfinal = $row + $row2 + $avatar + $row3;

  $smarty->assign("row", $rowfinal);

	$stmt66 = $db->prepare('SELECT count(*) from posts_comments WHERE postID=:postID');
	$stmt66->execute(array(":postID" => htmlspecialchars($_GET["id"])));
	$row66 = $stmt66->fetch(PDO::FETCH_ASSOC);

	$smarty->assign("rowcommentscount", $row66["count(*)"]);

	// COMMENTS

	$stmt252 = $db->prepare("SELECT
		P.id,
		P.userID,
		P.desc,
		P.time,
		P.postID,
		P.review,
		P.quoteID,
		M.username
	FROM
		posts_comments AS P
	INNER JOIN members AS M
	ON
		M.memberID = P.userID
	WHERE P.postID=:postID
	ORDER BY P.id
	");
	$stmt252->execute(array(":postID" => htmlspecialchars($_GET["id"])));
	$row252 = $stmt252->fetch(PDO::FETCH_ASSOC);

	if (!$stmt252->execute())
	{
		print_r($stmt252->errorInfo());
	}

	while ($row252 = $stmt252->fetch(PDO::FETCH_ASSOC))
	{
		$rowfirst2[] = $row252;
	}

	foreach($rowfirst2 as $rowsecond2){

		if($rowsecond2["quoteID"] != 0){

			$stmt2522 = $db->prepare("SELECT
				P.userID,
				P.desc,
				P.time,
				P.postID,
				P.review,
				P.quoteID,
				M.username
			FROM
				posts_comments AS P
			INNER JOIN members AS M
			ON
				M.memberID = P.userID
			WHERE P.id=:id
			");
			$stmt2522->execute(array(":id" => $rowsecond2["quoteID"]));
			$row2522 = $stmt2522->fetch(PDO::FETCH_ASSOC);

			if (!$stmt2522->execute())
			{
				print_r($stmt2522->errorInfo());
			}

			while ($row2522 = $stmt2522->fetch(PDO::FETCH_ASSOC))
			{
				$rowfirst22[] = $row2522;

				$avatarus["avatar"] = getavatar(100, $row2522["userID"]);
				$avatarusfinal = "'".$avatarus['avatar']."'";

				$quotefinal["quotefinal"] = '

				<p><blockquote>
				 <p>'.$row2522["desc"].'</p>
				 <cite>'.$row2522["username"].' '.date('d.m.Y H:i:s', $row2522["time"]).'</cite>
				 <div class="blockquote-author-image" style="--image: url('.$avatarusfinal.')"></div>
			 </blockquote></p>

				';
			}

		} else {
			$quotefinal["quotefinal"] = "";
		}

		$avatar22["avatar"] = getavatar(100, $rowsecond2["userID"]);
		$rowfinal32[] = $rowsecond2 + $avatar22 + $quotefinal;
	}


	$smarty->assign("rowcom", $rowfinal32);

	// CREATE COMMENT
	if (isset($_POST['submit'])) {

				$stmt = $db->prepare('INSERT INTO posts_comments (userID,`desc`,`time`,postID,quoteID) VALUES (:userID, :desc, :time, :postID, :quoteID)');
				$stmt->execute(array(
						':userID' => $_SESSION["memberID"],
						':desc' => $_POST["desc"],
						':time' => time(),
						':postID' => htmlspecialchars($_GET["id"]),
						':quoteID' => htmlspecialchars($_GET["quote"])
				));

				header("Location: viewpost?id=".htmlspecialchars($_GET['id'])."&action=commentadded");
	}

	// QUOTES

	$quote = "";

	if(!empty($_GET["quote"])){
	     $stmtci = $db->prepare('SELECT * FROM posts_comments WHERE id=:id');
			 $stmtci->execute(array(':id' => htmlspecialchars($_GET["quote"])));
			 $rowci = $stmtci->fetch(PDO::FETCH_ASSOC);

			 $stmtcim = $db->prepare('SELECT * FROM members WHERE memberID=:id');
			 $stmtcim->execute(array(':id' => $rowci["userID"]));
			 $rowcim = $stmtcim->fetch(PDO::FETCH_ASSOC);

			 $r2mdate = date("d.m.Y H:i", $rowci["time"]);

	     $quote = '<p><a href="profile?id='.$rowcim["memberID"].'"><span style="color:#ff00ff">@'.$rowcim["username"].'</span></a><span>&nbsp;</span></p>';

			 // ADD NOTIFICATION HERE

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
WHERE P.sectionID=:sectionID
LIMIT 5
	");
	$stmt25->execute(array(":sectionID" => $row["sectionID"]));
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

	// $smarty->assign("posts", $row25);
	$smarty->display("viewpost.tpl");


?>
