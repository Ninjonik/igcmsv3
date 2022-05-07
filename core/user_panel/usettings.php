<?php

	require_once("hdr.php");

  $stmt2 = $db->prepare('SELECT * FROM members WHERE memberID=:memberID');
  $stmt2->execute(array(':memberID' => $_SESSION['memberID']));
  $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

  if (!$stmt2->execute())
	{
		print_r($stmt2->errorInfo());
	}

  while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
	{
		$row2smarty[] = $row2;
		if($row2["gender"] == 0){
			$gender = "Male";
			$female = "";
			$male = "selected";
		} else {
			$gender = "Female";
			$female = "selected";
			$male = "";
		}
		$smarty->assign("gender", $gender);
		$smarty->assign("female", $female);
		$smarty->assign("male", $male);
	}
  $smarty->assign("row2s", $row2smarty);

if(isset($_POST['submit'])){

	$username = htmlspecialchars($_POST['username']);
	$description = htmlspecialchars($_POST['descr']);
	$location = htmlspecialchars($_POST['location']);
	$skills = htmlspecialchars($_POST['skills']);
	$fname = htmlspecialchars($_POST["firstName"]);
	$lname = htmlspecialchars($_POST["lastName"]);
	$pn = htmlspecialchars($_POST["phone"]);

	if(!$_POST["genderselect"]){
		if($_POST["genderselect"] == "0"){
			$genderinsert = 0;
		} else {
			$genderinsert = 1;
		}
	}

	if(preg_match('/^\w{3,}$/', $username)) { // \w equals "[0-9A-Za-z_]"
		$error[] = $l["numeric3"];
		$stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
		$stmt->execute(array(':username' => $username));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['username'])){
			$error[] = "This username is already used by someone else.";
		}

	}

  $email = htmlspecialchars_decode($_POST['email'], ENT_QUOTES);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error[] = "This email is not valid. Please try again with correct email.";
  } else {
    $stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
    $stmt->execute(array(':email' => $email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!empty($row['email'])){
      $error[] = "This email is already used by someone else.";
    }

  }


	if(!isset($error)){
		header("Location: usettings?action=notedited");
	} else {

		//insert into database with a prepared statement
			$stmt = $db->prepare('UPDATE members SET username=:username, descr=:descr, location=:location, skills=:skills, email=:email, first_name=:fname, last_name=:lname, phone_number=:pn, gender=:gender WHERE username="'.$_SESSION['username'].'"');
			$stmt->execute(array(
				':username' => $username,
				':descr' => $description,
				':location' => $location,
				':skills' => $skills,
				':email' => $email,
        ':fname' => $fname,
				':lname' => $lname,
				':pn' => $pn,
				':gender' => $genderinsert
			));

		header("Location: logout?route=login.php?action=succesfullyeditedprofile");
	}

}

// AVATAR
if (isset($_POST['submita'])) {

	$file = $_FILES["file"];

	$name = $_FILES["file"]["name"];
	$ext = end((explode(".", $name))); # extra () to prevent notice

	if($_FILES['file']['size']< 10485760){
		if (in_array($ext, array('png', 'jpg', 'gif'))) {

			$temp = explode(".", $_FILES["file"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);
			move_uploaded_file($_FILES["file"]["tmp_name"], "../../uploads/avatars/" . $newfilename);
			list($width, $height) = getimagesize("../../uploads/avatars/".$newfilename."");
			if ($width > 99 && $height > 99) {
				if ($width / $height == 1) {
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

							$stmt = $db->prepare('UPDATE members SET avatar=:avatar WHERE memberID="'.$_SESSION['memberID'].'"');
							$stmt->execute(array(
								':avatar' => $newfilename
							));
					header("Location: usettings?action=profileedited");
				} else {
					header("Location: usettings?action=invalidresolution&width=".$width."&height=".$height."");
				}
			} else {
					header("Location: usettings?action=invalidresolution&width=".$width."&height=".$height."");
			}
		} else {
			header("Location: usettings?action=unsupfiletype&filetype=".$ext."");
		}
	}
}

// BACKGROUND
if(isset($_POST["submitbg"])){
	/* BACKGROUND */
	      $file2 = $_FILES["file2"];

	    	$name2 = $_FILES["file2"]["name"];
	    	$ext2 = end((explode(".", $name2))); # extra () to prevent notice

	      if($_FILES['file2']['size']< 10485760){
	      	if (in_array($ext2, array('png', 'jpg', 'gif'))) {

	      		$temp2 = explode(".", $_FILES["file2"]["name"]);
	      		$newfilename2 = round(microtime(true)) . '.' . end($temp2);
	      		move_uploaded_file($_FILES["file2"]["tmp_name"], "../../uploads/backgroundsprofile/" . $newfilename2);
	      		list($width2, $height2) = getimagesize("../../uploads/backgroundsprofile/".$newfilename2."");
	      		if ($width2 > 799 && $height2 > 599) {
	      			$file2 = $newfilename2;

	      			function download($file2){
	      			  header('Content-Description: File Transfer');
	      			  header('Content-Type: application/octet-stream');
	      			  header('Content-Disposition: attachment; filename='.basename($file2));
	      			  header('Content-Transfer-Encoding: binary');
	      			  header('Expires: 0');
	      			  header('Cache-Control: must-revalidate');
	      			  header('Pragma: public');
	      			  header('Content-Length: '.filesize($file2));

	      			  ob_clean();
	      			  flush();
	      			  readfile($file2);
	      			}

	      				$file2 = $_FILES['file2']['name'];

								$stmt = $db->prepare('UPDATE members SET backgroundprofile=:backgroundprofile WHERE memberID="'.$_SESSION['memberID'].'"');
								$stmt->execute(array(
									':backgroundprofile' => $newfilename2
								));

								header("Location: usettings?action=profileedited");

	      		} else {
	      				header("Location: usettings?action=invalidresolution&width=".$width2."&height=".$height2."");
	      		}
	      	} else {
	      		header("Location: usettings?action=unsupfiletype&filetype=".$ext2."");
	      	}
	      } else {
	        header("Location: usettings?action=invalidresolution");
	      }

	/* END OF BACKGROUND */
}

$smarty->display("settings.tpl");

?>
