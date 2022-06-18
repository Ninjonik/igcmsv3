<?php

    $sstatus = 0;
	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	if(!empty($_GET["step"])){
		$step = $_GET["step"];
	}
	
	if(!empty($_GET["action"])){
		$action = $_GET["action"];
		
		if($action == 'badcredentials'){
        echo '
        <div class="alert alert-danger" role="alert">
            The credentials which you have entered are not correct. Please enter correct credentials for your database.
        </div>
        ';
    }
	}


?>
<head>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Installation</div>
                        
                                    
                            <?php 
                                if(empty($step)){

                                    echo '
                                    <div class="panel-title">Enter your database credentials.</div>
                                    </div>     
                                    <div style="padding-top:30px" class="panel-body" >
                                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                                            
                                        <form method="post">
                                                    
                                            <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-cloud"></i></span>
                                                <input type="text" class="form-control" name="host" value="" placeholder="Database host">                                        
                                            </div>
                                                
                                            <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input type="text" class="form-control" name="user" value="" placeholder="User">                                        
                                            </div>
                            
                                            <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                <input type="text" class="form-control" name="pass" value="" placeholder="User password">                                        
                                            </div>
                            
                                            <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-folder-open"></i></span>
                                                <input type="text" class="form-control" name="db" placeholder="Database">
                                            </div>
                                    ';
                            
                                    if(isset($_POST["submit"])){
                                        define('DBHOST', $_POST["host"]);
                                        define('DBUSER', $_POST["user"]);
                                        define('DBPASS', $_POST["pass"]);
                                        define('DBNAME', $_POST["db"]);
                            
                                        class Connect extends PDO
                                        {
                                            public function construct()
                                            {
                                                try {
                            
                                                    //create PDO connection
                                                    $db = new PDO("mysql:host=".DBHOST.";charset=utf8mb4;dbname=".DBNAME, DBUSER, DBPASS);
                                                    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);//Suggested to uncomment on production websites
                                                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Suggested to comment on production websites
                                                    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                            
                                                } catch(PDOException $e) {
                                                    //show error
                                                    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
													header("Location: install.php?action=badcredentials");
                                                }
                            
                                            }
                            
                                        }
                                        try {
                            
                                            //create PDO connection
                                            $db = new PDO("mysql:host=".DBHOST.";charset=utf8mb4;dbname=".DBNAME, DBUSER, DBPASS);
                                            //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);//Suggested to uncomment on production websites
                                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Suggested to comment on production websites
                                            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
											
											$sql = file_get_contents('sql.sql');

											$mysqli = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["db"]);

											/* execute multi query */
											$mysqli->multi_query($sql);
											
                                            header("Location: install.php?step=2&host=".DBHOST."&user=".DBUSER."&pass=".DBPASS."&db=".DBNAME."");
                                        
                                        } catch(PDOException $e) {
                                            //show error
                                            echo '<p class="bg-danger">'.$e->getMessage().'</p>';
											header("Location: install.php?action=badcredentials");
                                        }
                                    }
                                } else if ($step == '2'){
                                    echo '
                                    <div class="panel-title">Enter your main site settings.</div>
                                    </div>     
                                    <div style="padding-top:30px" class="panel-body" >
                                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                                            
                                        <form method="post">
                                                    
                                            <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-cloud"></i></span>
                                                <input type="text" class="form-control" name="sitename" value="" placeholder="Site name">                                        
                                            </div>

                                            <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-cloud"></i></span>
                                                <input type="text" class="form-control" name="siteslogan" value="" placeholder="Site slogan">                                        
                                            </div>
                                                
                                            <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input type="text" class="form-control" name="siteurl1" value="" placeholder="Site URL (eg. http://igportals.eu)">                                        
                                            </div>
                            
                                            <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-folder-open"></i></span>
                                                <input type="email" class="form-control" name="
						" placeholder="Site Email (eg. noreply@igportals.eu)*">
                                            </div>
											* Leave empty if you dont have configured phpmailer.
                                    ';

                                    if(isset($_POST["submit"])){

                                        $sname = $_POST["sitename"];
                                        $sslogan = $_POST["siteslogan"];
										
										$fp=fopen('core/includes/settings.php','w');
										fwrite($fp, '
										<?php
										define("DBHOST", "'.$_GET["host"].'");
										define("DBUSER", "'.$_GET["user"].'");
										define("DBPASS", "'.$_GET["pass"].'");
										define("DBNAME", "'.$_GET["db"].'");
										
										//application address
										define("DIR","'.$_POST["siteurl1"].'");
										define("SITEEMAIL","'.$_POST["siteemail"].'");
										
										$siteemail = "".SITEEMAIL."";
                                        $siteurl = "".DIR."/";

                                        class Connect extends PDO
                                        {
                                            public function construct()
                                            {
                                                try {

                                                    //create PDO connection
                                                    $db = new PDO("mysql:host=".DBHOST.";charset=utf8mb4;dbname=".DBNAME, DBUSER, DBPASS);
                                                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);//Suggested to uncomment on production websites
                                                    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

                                                } catch(PDOException $e) {
                                                    //show error
                                                    echo "<p>".$e->getMessage()."</p>";
                                                    exit;
                                                }

                                            }

                                        }
										
										?>
										
										');
										fclose($fp);
										
                                        header("Location: install.php?step=3&name=".$sname."&slogan=".$sslogan."");
                                    }
                                } else if ($step == '3'){
                                    
                                    // CONFIG


                                    session_save_path("uploads/sessions");

                                    ob_start();
                                    session_start();

                                    ini_set('display_errors', '1');
                                    ini_set('display_startup_errors', '1');
                                    error_reporting(E_ERROR || E_WARNING);



                                    //set timezone
                                    date_default_timezone_set('Europe/London');

                                    require_once("core/includes/version.php");
                                    require_once("core/includes/settings.php");

                                    try {

                                        //create PDO connection
                                        $db = new PDO("mysql:host=".DBHOST.";charset=utf8mb4;dbname=".DBNAME, DBUSER, DBPASS);
                                        //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);//Suggested to uncomment on production websites
                                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Suggested to comment on production websites
                                        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

                                    } catch(PDOException $e) {
                                        //show error
                                        echo '<p class="bg-danger">'.$e->getMessage().'</p>';
                                        exit;
                                    }
                                    //include classes
                                    require_once('core/includes/classes/userinfo.class.php');
                                    require_once('core/includes/classes/modules.class.php');
                                    require_once('core/includes/classes/user.php');
                                    require_once('core/includes/classes/phpmailer/mail.php');
                                    $user = new User($db);
                                    //define include checker
                                    define('included', 1);
                                    require_once('core/includes/functions.php');
                                    require_once("core/includes/api.php");
                                    require_once("core/includes/errors.php");



                                    // END CONFIG

                                    echo '
                                    <div class="panel-title">Register first (administrator) user.</div>
                                    </div>     
                                    <div style="padding-top:30px" class="panel-body" >
                                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                                            
                                        <form method="post">
                                                    
                                                
                                            <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input type="text" class="form-control" name="username" value="" placeholder="Username (only A-z, 1-9, without spaces)">                                        
                                            </div>

                                            <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-folder-open"></i></span>
                                                <input type="email" class="form-control" name="email" placeholder="Email">
                                            </div>
                            
                                            <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                <input type="password" class="form-control" name="password" value="" placeholder="Password">                                        
                                            </div>
                                            <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                <input type="password" class="form-control" name="passwordConfirm" value="" placeholder="Password">                                        
                                            </div>

                                    ';
                                    if(isset($_POST['submit'])){

                                        if (!isset($_POST['username'])) $error[] = $l['pleasefillalla'];
                                        if (!isset($_POST['email'])) $error[] = $l['pleasefillalla'];
                                        if (!isset($_POST['password'])) $error[] = $l['pleasefillalla'];
                                        echo "a";
                                        echo $_POST["username"];
                                        $username = $_POST["username"];

                                        //very basic validation
                                        if(!$user->isValidUsername($username)){
                                            $error[] = "Username is not valid";
                                        }

                                        if(strlen($_POST['password']) < 3){
                                            $error[] = "Password is too short";
                                        }

                                        if(strlen($_POST['passwordConfirm']) < 3){
                                            $error[] = "Password is too short";
                                        }

                                        if($_POST['password'] != $_POST['passwordConfirm']){
                                            $error[] = "Passwords are not the same";
                                        }

                                        echo "a";

                                        //email validation
                                        $email = htmlspecialchars_decode($_POST['email'], ENT_QUOTES);
                                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                            $error[] = $l['notvalidemail'];
                                        }
                                        echo "a";
                                        //if no errors have been created carry on
                                        if(!isset($error)){

                                            //hash the password
                                            $hashedpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

                                            //create the activasion code
                                            $activasion = md5(uniqid(rand(),true));

                                            $date = time();

                                            try {
                                                
                                                //insert into database with a prepared statement
                                                $stmt = $db->prepare('INSERT INTO members (username,password,email,active,avatar,joinTime,groupID) VALUES (:username, :password, :email, :active, :avatar, :joinTime, :groupID)');
                                                $stmt->execute(array(
                                                    ':username' => $username,
                                                    ':password' => $hashedpassword,
                                                    ':email' => $email,
                                                    ':active' => 'Yes',
                                                    ':avatar' => 'gravatar',
                                                    ':joinTime' => $date,
                                                    ':groupID' => 1
                                                ));

                                                $stmt2 = $db->prepare('UPDATE settings SET siteTitle=:siteTitle, siteDesc=:siteDesc');
                                                $stmt2->execute(array(
                                                    ':siteTitle' => $_GET["name"],
                                                    ':siteDesc' => $_GET["slogan"],
                                                ));
												
												unlink("index.php");
												unlink("sql.sql");
												$fp=fopen('index.php','w');
												fwrite($fp, '
													
													<?php 

													    header("Location: core/user_panel/index");
													
													?>
													
												
													
												');
												fclose($fp);
												
                                                $id = $db->lastInsertId('memberID');
                                                        // unset cookies
                                                        if (isset($_SERVER['HTTP_COOKIE'])) {
                                                            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
                                                            foreach($cookies as $cookie) {
                                                                $parts = explode('=', $cookie);
                                                                $name = trim($parts[0]);
                                                                setcookie($name, '', time()-1000);
                                                                setcookie($name, '', time()-1000, '/');
                                                            }
                                                        }
                                                        //redirect to index page
														header('Location: core/user_panel/index.php?action=installed');
														exit;

													//else catch the exception and show the error.
												} catch(PDOException $e) {
													$error[] = $e->getMessage();
												}

										}

                                                
										if(isset($error)){
											foreach($error as $error){
												echo '<p class="bg-danger">'.$error.'</p>';
											}
										}

                                    }
                                } else {
                                    header("Location: install.php?action=unknownstep");
                                }
                            ?>

                                
                            <div class="input-group">


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                    <button type="submit" name="submit">Submit</button>
                                    </div>
                                </div>  
                        </form>     



                        </div>                     
                    </div>  
        </div>
    <!--<endora></endora>-->
