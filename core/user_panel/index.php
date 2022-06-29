<?php

	require_once("hdr.php");

    $row = getfromdb("defaultsite", "settings");

    require($row['defaultsite'].".php");

?>
