<?php 

	require_once("hdr.php");

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
		}
	}
	
	$smarty->assign("categories", $categoryfinal);
	$smarty->assign("forums", $forumfinal);


	$smarty->display("forum.tpl");

?>