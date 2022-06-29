<?php

	require_once("hdr.php");

	$moduleclass = new moduleinfo(2,$db);
  	$modulestatus = $moduleclass->modulestatus();
  isempty("forum?action=invalidid", $_GET["id"]);

	$stmt2526 = $db->prepare("SELECT
		T.*,
		F.title as titleforum
	FROM
		topics AS T
	INNER JOIN forums AS F
	ON
		F.id = T.forumID
	WHERE T.id=:id
	");
	$stmt2526->execute(array(":id" => htmlspecialchars($_GET["id"])));
	$row2526 = $stmt2526->fetch(PDO::FETCH_ASSOC);

	if (!$stmt2526->execute())
	{
		print_r($stmt2526->errorInfo());
	}

	$smarty->assign("topicinfo", $row2526);

	// COMMENTS

	$stmt252 = $db->prepare("SELECT
		C.id,
    C.userID,
    C.desc,
    C.time,
    C.topicID,
    C.quoteID,
    C.review,
    M.joinTime,
		M.username
	FROM
		topics_comments AS C
	INNER JOIN members AS M
	ON
		M.memberID = C.userID
	WHERE C.topicID=:id
	ORDER BY C.id
	");
	$stmt252->execute(array(":id" => htmlspecialchars($_GET["id"])));
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
        C.id,
        C.userID,
        C.desc,
        C.time,
        C.topicID,
        C.quoteID,
        C.review,
        M.joinTime,
        M.username
        FROM
      		topics_comments AS C
      	INNER JOIN members AS M
      	ON
      		M.memberID = C.userID
			WHERE C.id=:id
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
		$userinfo = new userinfo($rowsecond2["userID"],$db);
 		$usergroupinfo["html"] = $userinfo->usrgrpdetails("groups.html");

		$rowfinal32[] = $rowsecond2 + $avatar22 + $quotefinal + $usergroupinfo;
	}

	$smarty->assign("rowcom", $rowfinal32);

	// CREATE COMMENT
	if (isset($_POST['submit'])) {

				$stmt = $db->prepare('INSERT INTO topics_comments (userID,`desc`,`time`,topicID,quoteID) VALUES (:userID, :desc, :time, :topicID, :quoteID)');
				$stmt->execute(array(
						':userID' => $_SESSION["memberID"],
						':desc' => $_POST["desc"],
						':time' => time(),
						':topicID' => htmlspecialchars($_GET["id"]),
						':quoteID' => htmlspecialchars($_GET["quote"])
				));

				$idstmato = $db->lastInsertId('id');

				$stmt = $db->prepare('UPDATE topics SET editdate=:editdate, editcomID=:editcomID WHERE id=:id');
				$stmt->execute(array(
						':editdate' => time(),
						':editcomID' => $idstmato,
						':id' => $_GET["id"]
				));

				header("Location: viewtopic?id=".htmlspecialchars($_GET['id'])."&action=commentadded");
	}

	// QUOTES

	$quote = "";

	if(!empty($_GET["quote"])){
	     $stmtci = $db->prepare('SELECT * FROM topics_comments WHERE id=:id');
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

	$smarty->display("viewtopic.tpl");


?>
