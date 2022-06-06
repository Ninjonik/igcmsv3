<?php

	$sstatus = 0;

	require_once("../includes/config.php");

	// NAVBAR

	// PAGES

		 $rowpagelist = getfromDBm("*", "pages");
		$smarty->assign("pages", $rowpagelist);

	// END OF PAGES


	$smarty->assign("navbarprofile", $navbarprofile);

?>
