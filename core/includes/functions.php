<?php

if (!defined('included')){
die('You cannot access this file directly!');
}

//log user in ---------------------------------------------------
function login($user, $pass){

   //strip all tags from varible
   $user = strip_tags(mysql_real_escape_string($user));
   $pass = strip_tags(mysql_real_escape_string($pass));

   $pass = md5($pass);

   // check if the user id and password combination exist in database
   $sql = "SELECT * FROM members WHERE username = '$user' AND password = '$pass'";
   $result = mysql_query($sql) or die('Query failed. ' . mysql_error());

   if (mysql_num_rows($result) == 1) {
      // the username and password match,
      // set the session
	  $_SESSION['authorized'] = true;

	  // direct to admin
      header('Location: '.DIRADMIN);
	  exit();
   } else {
	// define an error message
	$_SESSION['error'] = 'Sorry, wrong username or password';
   }
}

// Authentication
function logged_in() {
	if($_SESSION['authorized'] == true) {
		return true;
	} else {
		return false;
	}
}

function login_required() {
	if(logged_in()) {
		return true;
	} else {
		header('Location: ../user_panel/login.php');
		exit();
	}
}

function logout(){
	unset($_SESSION['authorized']);
	header('Location: '.DIRADMIN.'login.php');
	exit();
}

// Render error messages
function messages() {
    $message = '';
    if($_SESSION['success'] != '') {
        $message = '<div class="msg-ok">'.$_SESSION['success'].'</div>';
        $_SESSION['success'] = '';
    }
    if($_SESSION['error'] != '') {
        $message = '<div class="msg-error">'.$_SESSION['error'].'</div>';
        $_SESSION['error'] = '';
    }
    echo "$message";
}

function errors($error){
	if (!empty($error))
	{
			$i = 0;
			while ($i < count($error)){
			$showError.= "<div class=\"msg-error\">".$error[$i]."</div>";
			$i ++;}
			echo $showError;
	}// close if empty errors
} // close function

// CORE FUNCTIONS FOR CMS

function getfromDB($data, $table) {
	global $db;

	$stmt = $db->prepare('SELECT '.$data.' FROM `'.$table.'`');
	$stmt->execute(array());
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if (!$stmt->execute()) {
		print_r($stmt->errorInfo());
	}

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result = $row;
		return $result;
	}

	// $row = getfromDB("pageID, pageTitle", "pages");

}

function getfromDBm($data, $table) {
	global $db;

	$stmt = $db->prepare('SELECT '.$data.' FROM `'.$table.'`');
	$stmt->execute(array());
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if (!$stmt->execute()) {
		print_r($stmt->errorInfo());
	}

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[] = $row;
	}

  return $result;

	// $row = getfromDBm("pageID, pageTitle", "pages");

}

function getfromDBijWa($data, $table, $table2, $if1, $if2, $where, $is, $additional) {
	global $db;

	$stmt = $db->prepare('SELECT '.$data.' FROM `'.$table.'` AS T1 INNER JOIN `'.$table2.'` as T2 ON T2.'.$if2.' = T1.'.$if1.' WHERE '.$where.'='.$is.' '.$additional.'');
	$stmt->execute(array());
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if (!$stmt->execute()) {
		print_r($stmt->errorInfo());
	}

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result = $row;
	}

  return $result;

	// $rowtickets = getfromDBijM("T1.*, T2.*", "tickets", "categories", "catID", "catID");

}

function getfromDBija($data, $table, $table2, $if1, $if2, $additional) {
	global $db;

	$stmt = $db->prepare('SELECT '.$data.' FROM `'.$table.'` AS T1 INNER JOIN `'.$table2.'` as T2 ON T2.'.$if2.' = T1.'.$if1.' '.$additional.'');
	$stmt->execute(array());
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if (!$stmt->execute()) {
		print_r($stmt->errorInfo());
	}

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result = $row;
	}

  return $result;

	// $rowtickets = getfromDBijM("T1.*, T2.*", "tickets", "categories", "catID", "catID");

}

function getfromDBijM($data, $table, $table2, $if1, $if2) {
	global $db;

	$stmt = $db->prepare('SELECT '.$data.' FROM `'.$table.'` AS T1 INNER JOIN `'.$table2.'` as T2 ON T2.'.$if2.' = T1.'.$if1.'');
	$stmt->execute(array());
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if (!$stmt->execute()) {
		print_r($stmt->errorInfo());
	}

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[] = $row;
	}

  return $result;

	// $rowtickets = getfromDBijM("T1.*, T2.*", "tickets", "categories", "catID", "catID");

}

function getfromDBijMw($data, $table, $table2, $if1, $if2, $where, $is) {
	global $db;

	$stmt = $db->prepare('SELECT '.$data.' FROM `'.$table.'` AS T1 INNER JOIN `'.$table2.'` as T2 ON T2.'.$if2.' = T1.'.$if1.' WHERE '.$where.' = '.$is.'');
	$stmt->execute(array());
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if (!$stmt->execute()) {
		print_r($stmt->errorInfo());
	}

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[] = $row;
	}

  return $result;

	// $rowtickets = getfromDBijM("T1.*, T2.*", "tickets", "categories", "catID", "catID", "id", "1");

}

function getfromDBijMwa($data, $table, $table2, $if1, $if2, $where, $is, $additional) {
	global $db;

	$stmt = $db->prepare('SELECT '.$data.' FROM `'.$table.'` AS T1 INNER JOIN `'.$table2.'` as T2 ON T2.'.$if2.' = T1.'.$if1.' WHERE '.$where.' = '.$is.' '.$additional.'');
	$stmt->execute(array());
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if (!$stmt->execute()) {
		print_r($stmt->errorInfo());
	}

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[] = $row;
	}

  return $result;

	// $rowtickets = getfromDBijM("T1.*, T2.*", "tickets", "categories", "catID", "catID", "id", "1");

}

function getfromDBijMa($data, $table, $table2, $if1, $if2, $additional) {
	global $db;

	$stmt = $db->prepare('SELECT '.$data.' FROM `'.$table.'` AS T1 INNER JOIN `'.$table2.'` as T2 ON T2.'.$if2.' = T1.'.$if1.' '.$additional.'');
	$stmt->execute(array());
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if (!$stmt->execute()) {
		print_r($stmt->errorInfo());
	}

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$result[] = $row;
	}

  return $result;

	// $rowtickets = getfromDBijM("T1.*, T2.*", "tickets", "categories", "catID", "catID", "id", "1");

}


function getfromDBw($data, $table, $where, $what) {
	global $db;

	$stmt = $db->prepare('SELECT '.$data.' FROM `'.$table.'` WHERE '.$where.'="'.$what.'"');
	$stmt->execute(array());
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if (!$stmt->execute()) {
		print_r($stmt->errorInfo());
	}

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		return $row;
	}

	// $row = getfromDBw("pageID, pageTitle", "pages", "pageID", $id);

}

function getfromDBmw($data, $table, $where, $what) {
	global $db;

	$stmt = $db->prepare('SELECT '.$data.' FROM `'.$table.'` WHERE '.$where.'="'.$what.'"');
	$stmt->execute(array());
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if (!$stmt->execute()) {
		print_r($stmt->errorInfo());
	}

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    	$result[] = $row;
	}

 	 return $result;

	// $row = getfromDBmw("pageID, pageTitle", "pages", "pageID", $id);

}



function getfromDBnw($data, $table) {
	global $db;

	$stmt = $db->prepare('SELECT '.$data.' FROM `'.$table.'`');
	$stmt->execute(array());
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if (!$stmt->execute()) {
		print_r($stmt->errorInfo());
	}

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		return $row;
	}

	// $row = getfromDBw("pageID, pageTitle", "pages", "pageID", $id);

}

function countrows($data, $table) {
	global $db;

	$stmt = $db->prepare('SELECT COUNT('.$data.') as count FROM `'.$table.'`');
	$stmt->execute(array());
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if (!$stmt->execute()) {
		print_r($stmt->errorInfo());
	}

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		return $row["count"];
	}

	// $row = getfromDBw("pageID, pageTitle", "pages", "pageID", $id);

}

function countrowsw($data, $table, $where, $what) {
	global $db;

	$stmt = $db->prepare('SELECT COUNT('.$data.') as count FROM `'.$table.'` WHERE '.$where.'="'.$what.'"');
	$stmt->execute(array());
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if (!$stmt->execute()) {
		print_r($stmt->errorInfo());
	}

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		return $row["count"];
	}

	// $row = getfromDBw("pageID, pageTitle", "pages", "pageID", $id);

}

function getperm($perm) {
	global $db;
	global $usergroupID;
	global $user;
	
	if( !$user->is_logged_in() )
	{
		if($_COOKIE["loggedin"] == true){
			if(!$user->login($_COOKIE['username'],$_COOKIE['password'],true)){
				header('Location: ../user_panel/login?action=needlogin&route='.$redirect.''); 
			}
		} else {
			if(empty($redirect)){
				header('Location: ../user_panel/login?action=needlogin'); 
			} else {
				header('Location: ../user_panel/login?action=needlogin&route='.$redirect.''); 
			}
		}
	}
	
	$stmtg = $db->prepare('SELECT perms FROM `groups` WHERE id=:usergroupID');
	$stmtg->execute(array(":usergroupID" => $usergroupID));
	$rowg = $stmtg->fetch(PDO::FETCH_ASSOC);

	if (!$stmtg->execute()) {
		print_r($stmtg->errorInfo());
	}

	while ($rowg = $stmtg->fetch(PDO::FETCH_ASSOC)) {
		$rdyperms = unserialize($rowg["perms"]);
		foreach($rdyperms as $perms){
			if($perms["id"] == $perm){
				if($perms["value"] == 0) {
					header("Location: ../user_panel/index?action=notenoughpermissions");
				}
			}
		}
	}

	// getperm(1);

}

function insertDB($table, $data, $values2) {
	global $db;

	$stmt = $db->prepare('INSERT INTO `'.$table.'` ('.$data.') VALUES ('.$values2.')');
	$stmt->execute(array());
	$idget = $db->lastInsertId();
	return $idget;

}

function updateDB($table, $values, $where) {
	global $db;

	$stmt = $db->prepare('UPDATE `'.$table.'` SET '.$values.' WHERE '.$where.'');
	$stmt->execute(array());

	// $row = updateDB("members", "memberID='".$memberID."'", username='".$username."');

}

function updateDBnw($table, $values) {
	global $db;

	$stmt = $db->prepare('UPDATE `'.$table.'` SET '.$values.'');
	$stmt->execute(array());

	// $row = updateDB("members", "memberID='".$memberID."'");

}

function napis($data) {
  echo htmlspecialchars($data);
}

function islog($redirect){
	global $user;
	if( !$user->is_logged_in() )
	{
		if($_COOKIE["loggedin"] == true){
			if(!$user->login($_COOKIE['username'],$_COOKIE['password'],true)){
				header('Location: ../user_panel/login?action=needlogin&route='.$redirect.''); 
			}
		} else {
			header('Location: ../user_panel/login?action=needlogin&route='.$redirect.''); 
		}
		
	} 
}

function isntlog(){
	global $user;
	if( $user->is_logged_in() ){ header('Location: index?action=alreadyloggedin'); } else { echo ''; }
}

function isempty($redirect, $premenna){
	if (empty($premenna)){
		header("Location: ".$redirect."");
	} else {
		echo '';
	}
}

// LIKE FUNCTION
function likeornot($form, $route, $dbtarget, $secondaryroute){

  global $user;
  global $db;
  $id = htmlspecialchars($_GET["id"]);

  if(!$user->is_logged_in() ){
    header("Location: ../user_panel/login?action=needlogin");
  } else {
    $stmtr = $db->prepare('SELECT imgID, type FROM likent WHERE likeAID=:likeAID AND imgID=:imgID AND form=:form');
    $stmtr->execute(array(':likeAID' => $_SESSION['memberID'], ':imgID' => $id, 'form' => $form));
    $rowr = $stmtr->fetch(PDO::FETCH_ASSOC);

    if(empty($_GET["type"])){
      header("Location: ".$route."&action=invalidreview#".$secondaryroute."");
    } else {
      if($_GET["type"] == "like"){
        $pm = "+";
        $type = 1;
      } else if ($_GET["type"] == "unlike"){
        $pm = "-";
        $type = 0;
      } else {
        header("Location: ".$route."&action=invalidreview#".$secondaryroute."");
      }
    }

    if(empty($rowr['imgID'])){
          $stmtl = $db->prepare('INSERT INTO likent (imgID,likeAID,date,type,form) VALUES (:imgID, :likeAID, :date, :type, :form)');
          $stmtl->execute(array(
            ':imgID' => $id,
            ':likeAID' => $_SESSION['memberID'],
            ':date' => time(),
            ':type' => $type,
            ':form' => $form
          ));

          $stmt222 = $db->prepare('UPDATE '.$dbtarget.' SET review = review '.$pm.' 1 WHERE id=:id');
          $stmt222->execute(array(
              ':id' => $id
          ));

          header("Location: ".$route."?action=imgreviewed#".$secondaryroute);

    } else {
      echo $rowr["type"];
      if($rowr["type"] == $type){
        $stmtd = $db->prepare("DELETE FROM likent WHERE imgID=:imgID AND likeAID=:likeAID AND form=:form");
        $stmtd->execute(array(
          ':imgID' => $id,
          ':likeAID' => $_SESSION['memberID'],
          ':form' => $form
        ));

        if($rowr["type"] == 0){
          $pm3 = "+";
        } else if ($rowr["type"] == 1){
          $pm3 = "-";
        }

        $stmt444 = $db->prepare('UPDATE '.$dbtarget.' SET review = review '.$pm3.' 1 WHERE id=:id');
          $stmt444->execute(array(
              ':id' => $id
          ));

          header ("Location: ".$route."&action=imgunreviewed#".$secondaryroute);

      } else {
        $stmtd = $db->prepare("UPDATE likent SET type=:type WHERE imgID=:imgID AND likeAID=:likeAID AND form=:form");
        $stmtd->execute(array(
          ':type' => $type,
          ':imgID' => $id,
          ':likeAID' => $_SESSION['memberID'],
          ':form' => $form
        ));

        $stmt444 = $db->prepare('UPDATE '.$dbtarget.' SET review = review '.$pm.' 2 WHERE id=:id');
          $stmt444->execute(array(
              ':id' => $id
          ));

          header("Location: ".$route."&action=imgreviewed#".$secondaryroute);
      }
    }
  }
}

// SMARTY FUNCTIONS

function smarty_modifier_rsort_array($array)
{
	if(empty($array)){
		return null;
	}
    rsort($array);
    return $array;
}

function smarty_modifier_sort_array($array)
{
	if(empty($array)){
		return null;
	}
    sort($array);
    return $array;
}

function smarty_function_getactivemenuitem($name, &$smarty){
  if($name["string"] == basename($_SERVER['PHP_SELF'])){
    return 'class="active"';
  } else {
    return '';
  }
}

function smarty_function_getmodulestatus($moduleid, &$smarty){
	global $db;
	$moduleclass = new moduleinfo($moduleid["id"],$db);
  	return $modulestatus = $moduleclass->modulevisibility();
}

function smarty_function_getpermVisibility($perm, &$smarty) {
	global $db;
	global $usergroupID;
	global $user;
	
	$stmtg = $db->prepare('SELECT perms FROM `groups` WHERE id=:usergroupID');
	$stmtg->execute(array(":usergroupID" => $usergroupID));
	$rowg = $stmtg->fetch(PDO::FETCH_ASSOC);

	if (!$stmtg->execute()) {
		print_r($stmtg->errorInfo());
	}

	while ($rowg = $stmtg->fetch(PDO::FETCH_ASSOC)) {
		$rdyperms = unserialize($rowg["perms"]);
		foreach($rdyperms as $perms){
			if($perms["id"] == $perm["id"]){
				if($perms["value"] == 0) {
					return "hidden";
				}
			}
		}
	}

}

function smarty_function_getpermValue($perm, &$smarty) {
	global $db;
	global $usergroupID;
	global $user;
	
	$stmtg = $db->prepare('SELECT perms FROM `groups` WHERE id=:usergroupID');
	$stmtg->execute(array(":usergroupID" => $usergroupID));
	$rowg = $stmtg->fetch(PDO::FETCH_ASSOC);

	if (!$stmtg->execute()) {
		print_r($stmtg->errorInfo());
	}

	while ($rowg = $stmtg->fetch(PDO::FETCH_ASSOC)) {
		$rdyperms = unserialize($rowg["perms"]);
		foreach($rdyperms as $perms){
			if($perms["id"] == $perm["id"]){
				return $perms["value"];
			}
		}
	}

}


?>
