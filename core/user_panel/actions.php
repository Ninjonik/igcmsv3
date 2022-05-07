<?php

	require_once("hdr.php");

	$id = $_GET["id"];
	$targetID = $_GET["targetID"];

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
		}
	}

?>
