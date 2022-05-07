<?php

	require_once("hdr.php");

	$stmt25 = $db->prepare("SELECT * FROM forums WHERE parent=0 ORDER by `order`");
	$stmt25->execute();
	$row25 = $stmt25->fetch(PDO::FETCH_ASSOC);

	if (!$stmt25->execute())
	{
		print_r($stmt25->errorInfo());
	}

	while ($row25 = $stmt25->fetch(PDO::FETCH_ASSOC))
	{
		$stmt252 = $db->prepare("SELECT * FROM forums WHERE parent=:parent ORDER by `order` DESC");
		$stmt252->execute(array(":parent" => $row25["id"]));
		$row252 = $stmt252->fetch(PDO::FETCH_ASSOC);

		if (!$stmt252->execute())
		{
			print_r($stmt252->errorInfo());
		}

		$category[] = $row25;

		while ($row252 = $stmt252->fetch(PDO::FETCH_ASSOC))
		{
			$rowchild[] = $row252;

			// COUNTING

				// THREADS COUNT

				$stmt25247 = $db->prepare("SELECT count(*) as threadscount, forumID as threadforumID from topics WHERE forumID=:forumID");
				$stmt25247->execute(array(":forumID" => $row252["id"]));
				$row25247 = $stmt25247->fetch(PDO::FETCH_ASSOC);

				if (!$stmt25247->execute())
				{
					print_r($stmt25247->errorInfo());
				}

				while ($row25247 = $stmt25247->fetch(PDO::FETCH_ASSOC)){
					$threadscount[] = $row25247;
				}

				// THREADS COUNT

				// POSTS COUNT

				$stmt252471 = $db->prepare("SELECT
				 T.forumID,
				 COUNT(C.id) as postscount,
				 C.topicID
				 FROM topics as T
				 INNER JOIN topics_comments as C
				 ON
				 C.topicID = T.id
				 WHERE forumID=:forumID
				");
				$stmt252471->execute(array(":forumID" => $row252["id"]));
				$row252471 = $stmt252471->fetch(PDO::FETCH_ASSOC);

				if (!$stmt252471->execute())
				{
					print_r($stmt252471->errorInfo());
				}

				while ($row252471 = $stmt252471->fetch(PDO::FETCH_ASSOC)){
					$postscount[] = $row252471;
				}

				// POSTS COUNT

			// COUNTING

			$stmt2524 = $db->prepare("SELECT forumID, editcomID, id FROM topics WHERE forumID=:forumID ORDER by `editdate` DESC LIMIT 1");
			$stmt2524->execute(array(":forumID" => $row252["id"]));
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

		}
	}

	foreach($var2 as $var3){
		$avatarus["avatar"] = getavatar(100, $var3["userID"]);
		$varus[] = $var3 + $avatarus;
	}

	$smarty->assign("postscount", $postscount);
	$smarty->assign("threadscount", $threadscount);
	$smarty->assign("lastupdate", $var1);
	$smarty->assign("lastupdate2", $varus);
	$smarty->assign("categories", $category);
	$smarty->assign("forums", $rowchild);

  $smarty->display("forum.tpl");

?>
