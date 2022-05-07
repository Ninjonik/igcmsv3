<?php

  require_once("hdr.php");

  getperm(10);

  $stmt2 = $db->prepare("SELECT * FROM settings");
  $stmt2->execute(array());
  $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

  if (!$stmt2->execute())
  {
    print_r($stmt2->errorInfo());
  }

  $smarty->assign("settings", $row2);

  if (isset($_POST['submitbg'])) {

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
							header("Location: sitesettings?action=invalidresolution&width=".$width."&height=".$height."");
					}
				} else {
					header("Location: sitesettings?action=unsupfiletype&filetype=".$ext."");
				}
			} else {
			header("Location: sitesettings?action=invalidresolution");
			}


        updateDBnw("settings", "background='".$newfilename."'");

        $id = $db->lastInsertId('id');

        header("Location: sitesettings?action=sitesettingschanged");
  }


  if(isset($_POST["submit"])){
    isempty("sitesettings?action=fillallfields", $_POST["title"]);

    updateDBnw("settings", "siteTitle='".$_POST['title']."', siteDesc='".$_POST['desc']."', defaultsite='".$_POST['defaultsite']."'");

    header("Location: sitesettings?action=sitesuccessfullyedited");

  }

  $smarty->display("sitesettings.tpl");

?>
