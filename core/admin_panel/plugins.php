<?php

  require_once("hdr.php");

  getperm(8);

  $stmt2 = $db->prepare("SELECT * FROM plugins ORDER BY id");
	$stmt2->execute(array());
	$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

	if (!$stmt2->execute())
	{
		print_r($stmt2->errorInfo());
	}

  $scan = scandir('../');
  foreach($scan as $file) {
     if($file != "admin_panel" && $file != "cache" && $file != "includes" && $file != "libs" && $file != "user_panel" && $file != "." && $file != ".."){
       $plugindirectories[] = $file;
     }
  }

  while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
  {
    $plugins[] = $row2;
  }


	$smarty->assign("plugins", $plugins);
  $smarty->assign("plugindirectories", $plugindirectories);

  if(isset($_POST["submit"])){
    header("Location: ../".$_POST['path']."/install.php?action=install");
  }

  $smarty->display("plugins.tpl");

?>
