<?php

	$sstatus = 0;

	require_once("../includes/config.php");

	// NAVBAR

	// PAGES

		 $rowpagelist = getfromDBm("*", "pages");
		$smarty->assign("pages", $rowpagelist);

	// END OF PAGES

	if(!$user->is_logged_in()){
		$navbarprofile = '

			 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
			 <a class="dropdown-item" href="login.php">
				Prihlásiť sa
			  </a>
			  <a class="dropdown-item" href="register.php">
				Zaregistrovať sa
			  </a>
			  <a class="dropdown-item" href="reset.php">
				Reset hesla
			  </a>
			</div>

		';
	} else {
		$navbarprofile = '

			 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
			 <a class="dropdown-item" href="profile.php?id='.$_SESSION["memberID"].'">
				Profil
			  </a>
			  <a class="dropdown-item" href="usettings.php">
				Upraviť profil
			  </a>
			  <a class="dropdown-item" href="logout.php">
				Odhlásiť sa
			  </a>
				<a class="dropdown-item" href="../admin_panel/index">
				 Administrácia
				 </a>
			</div>

		';
	}


	$smarty->assign("navbarprofile", $navbarprofile);

?>
