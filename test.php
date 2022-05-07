<?php

	$a = ["asd" => 1, "ase" => 2];
	var_dump($a);
	$b = serialize($a);
	echo(unserialize($b));


?>