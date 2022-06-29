<?php 

	require_once("hdr.php");

	$moduleclass = new moduleinfo(2,$db);
 	 $modulestatus = $moduleclass->modulestatus();

	// BASIC - CATEGORIES AND FORUMS

	$category = $db->prepare("SELECT id, title, `desc` FROM forums WHERE parent=0 ORDER BY `order`");
	$category->execute();
	$categoryrow = $category->fetch(PDO::FETCH_ASSOC);

	if(!$category->execute()){
		print_r($category->errorInfo());
	}

	while ($categoryrow = $category->fetch(PDO::FETCH_ASSOC)){
		$categoryfinal[] = $categoryrow;
		$forum = $db->prepare("SELECT id, title, `desc`, parent FROM forums WHERE parent=:parent ORDER BY `order`");
		$forum->execute(array(":parent" => $categoryrow["id"]));
		$forumrow = $forum->fetch(PDO::FETCH_ASSOC);

		if(!$forum->execute()){
			print_r($forum->errorInfo());
		}

		while ($forumrow = $forum->fetch(PDO::FETCH_ASSOC)){
			$forumfinal[] = $forumrow;

			// STATISTICS

				// THREADCOUNT
					// PART ONE

						$threadscount = $db->prepare("SELECT COUNT(T.id) AS count1, COUNT(TC.id) AS count2 FROM topics as T INNER JOIN topics_comments as TC on T.id = TC.topicID WHERE forumID=:forumID");
						$threadscount->execute(array(":forumID" => $forumrow["id"]));
						$threads = $threadscount->fetch(PDO::FETCH_ASSOC);
						if(!$threadscount->execute()){
							print_r($threadscount->errorInfo());
						}

						$countarray[] = ["count" => $threads["count1"], "parentID" => $forumrow["id"]];
						$postcountarray[] = ["count" => $threads["count2"], "parentID" => $forumrow["id"]];


					// PART ... NEXT
						// MAYBE ONEDAY WILL BE COMPLETED


				// LAST UPDATE 
						// PART ONE
						
						$lastupdate = $db->prepare("SELECT TC.userID, TC.time, M.username, T.title, T.id AS topicID FROM topics as T INNER JOIN topics_comments as TC ON T.id = TC.topicID INNER JOIN members as M ON TC.userID = M.memberID WHERE forumID=:forumID ORDER BY `time` DESC LIMIT 1");
						$lastupdate->execute(array(":forumID" => $forumrow["id"]));
						$lastupdaterow = $lastupdate->fetch(PDO::FETCH_ASSOC);
						if(!$lastupdate->execute()){
							print_r($lastupdate->errorInfo());
						}
						$avatarlastupdate = getavatar(100, $lastupdaterow["userID"]);
						$lastupdatefinalised[] = ["parentID" => $forumrow["id"], "data" => $lastupdaterow, "avatar" => $avatarlastupdate];
					// PART ... NEXT
						// MAYBE ONEDAY WILL BE COMPLETED
				

		}
	}

	$smarty->assign("threadscount", $countarray);
	$smarty->assign("postscounts", $postcountarray);
	$smarty->assign("lastupdates", $lastupdatefinalised);
	$smarty->assign("categories", $categoryfinal);
	$smarty->assign("forums", $forumfinal);

	$smarty->display("forum.tpl");

?>