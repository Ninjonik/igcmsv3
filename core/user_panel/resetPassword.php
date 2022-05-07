<?php

require_once("hdr.php");

isntlog();

$resetToken = hash('SHA256', ($_GET['key']));

$stmt = $db->prepare('SELECT resetToken, resetComplete FROM members WHERE resetToken = :token');
$stmt->execute(array(':token' => $resetToken));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

//if no token from db then kill the page
if(empty($row['resetToken'])){
	$error = 'Invalid token provided, please use the link provided in the reset email.';
    $smarty->assign('loginerrorecho', $error);
} elseif($row['resetComplete'] == 'Yes') {
	$error = 'Your password has already been changed!';
    $smarty->assign('loginerrorecho', $error);
}

//if form has been submitted process it
if(isset($_POST['submit'])){

	if (!isset($_POST['password']) || !isset($_POST['passwordConfirm'])){
		$error = 'Both Password fields are required to be entered';
        $smarty->assign('loginerrorecho', $error);
    }

	//basic validation
	if(strlen($_POST['password']) < 3){
		$error = 'Password is too short.';
        $smarty->assign('loginerrorecho', $error);
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error = 'Confirm password is too short.';
        $smarty->assign('loginerrorecho', $error);
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error = 'Passwords do not match.';
        $smarty->assign('loginerrorecho', $error);
	}

	//if no errors have been created carry on
	if(!isset($error)){

		//hash the password
		$hashedpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
        echo $hashedpassword;

	    try {

			$stmt = $db->prepare("UPDATE members SET password = :hashedpassword, resetComplete = 'Yes'  WHERE resetToken = :token");
			$stmt->execute(array(
				':hashedpassword' => $hashedpassword,
				':token' => $row['resetToken']
			));

			//redirect to index page
			header('Location: login.php?action=resetAccount');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

$smarty->display("resetPassword.tpl");

?>
