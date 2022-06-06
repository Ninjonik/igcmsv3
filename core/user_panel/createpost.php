<?php

require_once("hdr.php");

$moduleclass = new moduleinfo(1,$db);
$modulestatus = $moduleclass->modulestatus();

islog("createpost.php");

$stmt2 = $db->prepare("SELECT * FROM categories WHERE type=:type ORDER BY catID");
$stmt2->execute(array(":type" => 0));
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

if (!$stmt2->execute())
{
  print_r($stmt2->errorInfo());
}

while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
{
  $cats[] = $row2;
}
$smarty->assign("cats", $cats);

if (isset($_POST['submit'])) {

      isempty("createpost?action=fillallfields", $_POST["category"]);
      isempty("createpost?action=fillallfields", $_POST["title"]);
      isempty("createpost?action=fillallfields", $_POST["desc"]);
/* FILE */
      $file = $_FILES["file"];

    	$name = $_FILES["file"]["name"];
    	$ext = end((explode(".", $name))); # extra () to prevent notice

      if($_FILES['file']['size']< 10485760){
      	if (in_array($ext, array('png', 'jpg', 'gif'))) {

      		$temp = explode(".", $_FILES["file"]["name"]);
      		$newfilename = round(microtime(true)) . '.' . end($temp);
      		move_uploaded_file($_FILES["file"]["tmp_name"], "../../uploads/backgrounds/" . $newfilename);
      		list($width, $height) = getimagesize("../../uploads/backgrounds/".$newfilename."");
      		if ($width > 799 && $height > 599) {
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
      				header("Location: createpost?action=invalidresolution&width=".$width."&height=".$height."");
      		}
      	} else {
      		header("Location: createpost?action=unsupfiletype&filetype=".$ext."");
      	}
      } else {
        header("Location: createpost?action=invalidresolution");
      }

/* END OF FILES */

			$stmt = $db->prepare('INSERT INTO posts (title,authorID,sectionID,text,date,editdate,isallowed,isuser,background) VALUES (:title, :authorID, :sectionID, :text, :date, :editdate, :isallowed, :isuser, :background)');
			$stmt->execute(array(
					':title' => $_POST["title"],
					':authorID' => $_SESSION["memberID"],
					':sectionID' => $_POST['category'],
					':text' => $_POST['desc'],
					':date' => time(),
					':editdate' => time(),
					':isallowed' => 0,
          ':isuser' => 1,
          ':background' => $newfilename
			));

			$id = $db->lastInsertId('id');

			header("Location: viewpost?id=".$id."&postcreated");
}

$smarty->display("createpost.tpl");
?>
