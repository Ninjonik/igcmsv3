<?php

require_once("settings.php");
// GRAVATAR

function getAvatar($sizeav, $mmbrid) {

  global $db;

  $avatarinf = getfromDBw("avatar, email", "members", "memberID", $mmbrid);

  if($avatarinf["avatar"] == "gravatar"){
    if(empty($sizeav)){
      $sizeav = 100;
    }
    $defaultav = "igcms.igportals.ml/uploads/default.png";
    $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $avatarinf["email"] ) ) ) . "?d=" . urlencode( $defaultav ) . "&s=" . $sizeav;
  } else {
    $grav_url = "../../uploads/avatars/".$avatarinf['avatar']."";
  }

  return $grav_url;
}

?>
