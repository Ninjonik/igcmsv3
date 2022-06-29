<?php

	require_once("hdr.php");

	isempty("index?action=invalidid", $_GET["id"]);

    if(!empty($row["redirect"])){
        header("Location: ".$row['redirect']."");
      }
    

    $row = getfromDBijWa("T1.username, T1.first_name, T1.last_name, T1.descr, T1.location, T1.gender, T1.phone_number, T1.skills, T1.memberID, T1.joinTime, T2.title, T2.colour", "members", "groups", "groupID", "id", "memberID", htmlspecialchars($_GET['id']), "");
    $av = getAvatar("100", htmlspecialchars($_GET["id"]));

	$smarty->assign("profile", $row);
    $smarty->assign("avatar", $av);
	$smarty->display("profile.tpl");


?>
