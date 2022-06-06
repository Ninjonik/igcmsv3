<?php

	require_once("hdr.php");

	$id = $_GET["id"];
	$targetID = $_GET["targetID"];
	$add = htmlspecialchars($_GET["add"]);
  	$add2 = htmlspecialchars($_GET["add2"]);

	function removea($what, $idd){
			global $db;

			$stmt = $db->prepare('DELETE FROM '.$what.' WHERE id=:id');
			$stmt->execute(array("id" => $idd));
	}

	if(!empty($_GET["action"])){
 		switch($_GET["action"]) {
			case "likent":
				likeornot(0, "index?d=0", "img", "");
				break;
			case "likentpc":
				likeornot(1, "viewpost?id=".$targetID."", "posts_comments", htmlspecialchars($_GET["secondaryroute"]));
				break;
			case "likentp":
				likeornot(2, "viewpost?id=".$targetID."", "posts", "");
				break;
			case "likenttc":
				likeornot(3, "viewtopic?id=".$targetID."", "topics_comments", htmlspecialchars($_GET["secondaryroute"]));
				break;
			case "removepost":
				$row = getfromDBw("authorID", "posts", "id", $id);
				if($row["authorID"] == $_SESSION["memberID"]){
					removea("posts", $id);
					header("Location: index?action=success");
				} else {
					getperm(7);
					removea("posts", $id);
					header("Location: index?action=success");
				}
				break;
			case "modifytopic":
				getperm(7);
				$stmt = $db->prepare("UPDATE topics SET ".$add."=:add2 WHERE id=:id");
				$stmt->execute(array(
					':add2' => intval($add2),
					':id' => $id
				));
				header("Location: viewtopic?id=".$id."&action=topicmodified");
				break;
		}
	}

?>
