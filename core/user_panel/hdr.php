<?php

	$sstatus = 0;

	require_once("../includes/config.php");

	// NAVBAR

	// PAGES

		 $rowpagelist = getfromDBm("*", "pages");
		 if(!empty($rowpagelist)){
			 $pagestart = '
			 <li class="dropdown nav-item">
				 <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
					 <i class="fa fa-cogs d-lg-none d-xl-none"></i> Stránky
				 </a>
				 <div class="dropdown-menu dropdown-with-icons">
			 ';
			 $pageend = '</div>
		 </li>';
		 	 $smarty->assign("pagestart", $pagestart);
			 $smarty->assign("pageend", $pageend);
			 $smarty->assign("pagelist", $rowpagelist);
		 } else {
			 $smarty->assign("pagestart", "");
			 $smarty->assign("pageend", "");
			 $smarty->assign("pagelist", array());
		 }

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
