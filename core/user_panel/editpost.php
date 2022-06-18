<?php

require_once("hdr.php");

islog("editpost.php&id=".$_GET['id']."");

$getdata = $db->prepare("SELECT P.*, M.memberID, C.name FROM posts as P INNER JOIN members as M ON M.memberID=P.authorID INNER JOIN categories as C ON C.catID=sectionID WHERE id=:id");
$getdata->execute(array(":id" => htmlspecialchars($_GET["id"])));
$getdatarow = $getdata->fetch(PDO::FETCH_ASSOC);

if(!$getdata->execute()){
    print_r($getdata->errorInfo());
}

if($getdatarow["memberID"] != $_SESSION["memberID"]){
    header("Location: index?action=notenoughpermissions");
}

$smarty->assign("dataform", $getdatarow);

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

      isempty("editpost?action=fillallfields&id=".$_GET['id']."", $_POST["category"]);
      isempty("editpost?action=fillallfields&id=".$_GET['id']."", $_POST["title"]);
      isempty("editpost?action=fillallfields&id=".$_GET['id']."", $_POST["desc"]);
/* FILE */
      $file = $_FILES["file"];

    	$name = $_FILES["file"]["name"];
    	$ext = end((explode(".", $name))); # extra () to prevent notice
    if(!empty($_FILES["file"]["name"])){
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
      				header("Location: editpost?action=invalidresolution&width=".$width."&height=".$height."&id=".$_GET['id']."");
      		}
      	} else {
      		header("Location: editpost?action=unsupfiletype&filetype=".$ext."&id=".$_GET['id']);
      	}
      } else {
        header("Location: editpost?action=invalidresolution&id=".$_GET['id']."");
      }
    } else {
        $newfilename = $getdatarow["background"];
    }

/* END OF FILES */

            $stmt = $db->prepare('UPDATE posts SET title=:title, sectionID=:sectionID, text=:text, editdate=:editdate, background=:background WHERE id=:id');
			$stmt->execute(array(
					':title' => $_POST["title"],
					':sectionID' => $_POST['category'],
					':text' => $_POST['desc'],
					':editdate' => time(),
                    ':background' => $newfilename,
                    ':id' => htmlspecialchars($_GET["id"])
			));


			header("Location: viewpost?id=".$_GET['id']."&postedited");
}

$smarty->display("editpost.tpl");
?>
