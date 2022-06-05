<?php

  require_once("hdr.php");

  $moduleclass = new moduleinfo(6,$db);
  $modulestatus = $moduleclass->modulestatus();
  getperm(12);

  $stmt2 = $db->prepare("SELECT * FROM pages WHERE id=:id");
  $stmt2->execute(array(":id" => $_GET["id"]));
  $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

  if (!$stmt2->execute())
  {
    print_r($stmt2->errorInfo());
  }

  while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
  {
    $editinfo[] = $row2;
  }
  $smarty->assign("editinfo", $editinfo);

  if (isset($_POST['submit'])) {

        isempty("createpage?action=fillallfields", $_POST["title"]);

        /* FILE */
              $file = $_FILES["file"];

            	$name = $_FILES["file"]["name"];
            	$ext = end((explode(".", $name))); # extra () to prevent notice

              if($_FILES['file']['size']< 10485760){
              	if (in_array($ext, array('png', 'jpg', 'gif'))) {

              		$temp = explode(".", $_FILES["file"]["name"]);
              		$newfilename = round(microtime(true)) . '.' . end($temp);
              		move_uploaded_file($_FILES["file"]["tmp_name"], "../../uploads/pagebackgrounds/" . $newfilename);
              		list($width, $height) = getimagesize("../../uploads/pagebackgrounds/".$newfilename."");
              		if ($width > 1919 && $height > 1079) {
              			$file = $newfilename;

              			function download($file){
              			  header('Content-Description: File Transfer');
              			  header('Content-Type: application/octet-stream');
              			  header('Content-Disposition: attachment; filename='.basename($file));
              			  header('Content-Transfer-Encoding: binary');
              			  header('Expires: 0');
              			  header('Cache-Control: must-revalidate');
              			  header('Pragma: public');
              			  header('Content-Length: '.filesize($file));

              			  ob_clean();
              			  flush();
              			  readfile($file);
              			}

              				$file = $_FILES['file']['name'];
              		} else {
              				header("Location: createpage?action=invalidresolution&width=".$width."&height=".$height."");
              		}
              	} else {
              		header("Location: createpage?action=unsupfiletype&filetype=".$ext."");
              	}
              } else {
                header("Location: createpage?action=invalidresolution");
              }

        /* END OF FILES */

  			$file = $_FILES['file']['name'];

  			$stmt = $db->prepare('INSERT INTO pages (title,redirect,text,backgroundimg,icon) VALUES (:title, :redirect, :text, :backgroundimg, :icon)');
  			$stmt->execute(array(
  					':title' => $_POST["title"],
  					':redirect' => $_POST["redirect"],
  					':text' => $_POST['desc'],
  					':text' => $_POST['desc'],
					':icon' => $_POST['icon'],
  					':backgroundimg' => $newfilename
  			));

  			$id = $db->lastInsertId('id');

  			header("Location: pages?action=pagecreated");
  }

  $smarty->display("createpage.tpl")

?>
