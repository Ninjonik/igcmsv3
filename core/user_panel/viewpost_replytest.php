<?php

	require_once("hdr.php");

  $row = getfromDBw("*", "posts", "id", htmlspecialchars($_GET['id']));

  $row2 = getfromDBw("name", "categories", "id", $row["sectionID"]);

	$row3 = getfromDBw("*", "members", "memberID", $row["authorID"]);


  // AVATAR

  $avatar["avatar"] = getavatar(100, $row["authorID"]);

  $rowfinal = $row + $row2 + $avatar + $row3;

  $smarty->assign("row", $rowfinal);

	// COMMENTS

	// ASSIGNMENT COMMENTS
	$stmt4 = $db->prepare("SELECT * FROM posts_comments WHERE postID=:postID AND replyID=0 ORDER BY time");
	$stmt4->execute(array(":postID" => htmlspecialchars($_GET["id"])));
	$row4 = $stmt4->fetch(PDO::FETCH_ASSOC);

	if (!$stmt4->execute())
	{
		print_r($stmt4->errorInfo());
	}

	while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC))
	{
		$imgtop[] = $row4;

		// REPLIES TO COMMENTS

		$stmt40 = $db->prepare("SELECT * FROM posts_comments WHERE replyID=:replyID");
		$stmt40->execute(array(":replyID" => $row4["id"]));
		$row40 = $stmt40->fetch(PDO::FETCH_ASSOC);

		if (!$stmt40->execute())
		{
			print_r($stmt40->errorInfo());
		}

		while ($row40 = $stmt40->fetch(PDO::FETCH_ASSOC))
		{
			$imgtop0[] = $row40;
		}

			foreach($imgtop0 as $imgtop20){
				if(!empty($imgtop20["id"])){
					$stmt30 = $db->prepare("SELECT username FROM members WHERE memberID=:memberID");
					$stmt30->execute(array(":memberID" => $imgtop20["userID"]));
					$row30 = $stmt30->fetch(PDO::FETCH_ASSOC);
					if (!$stmt30->execute())
					{
						print_r($stmt30->errorInfo());
					}

					$retarder0["avatar"] = getAvatar(100, $imgtop20['userID']);

					$reply["reply"] = '<div class="media">
						<a class="pull-left" href="#pablo">
							<div class="avatar">
								<img class="media-object img-raised" src="'.$retarder0["avatar"].'" alt="..." />
							</div>
						</a>
						<div class="media-body">
							<h5 class="media-heading"> '.$row30["username"].'
								<small class="text-muted">&middot; '.$imgtop20["time"].'</small>
							</h5>
							<p>'.$imgtop20['desc'].'</p>
							<div class="media-footer">
								<a href="#pablo" class="btn btn-primary btn-simple btn-sm pull-right" rel="tooltip" title="Reply to Comment">
									<i class="tim-icons icon-send"></i> Reply
								</a>
								<a href="#pablo" class="btn btn-danger btn-simple btn-sm pull-right">
									<i class="tim-icons icon-heart-2"></i> 243
								</a>
							</div>
						</div>
					</div>';
					$reply["replID"] = $imgtop20["replyID"];
				} else {
					$reply["reply"] = "";
					$reply["replID"] = "";
				}
			}
	}

	foreach($imgtop as $imgtop2){
		$stmt3 = $db->prepare("SELECT username FROM members WHERE memberID=:memberID");
		$stmt3->execute(array(":memberID" => $imgtop2["userID"]));
		$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
		if (!$stmt3->execute())
		{
			print_r($stmt3->errorInfo());
		}

		$retarder["avatar"] = getAvatar(100, $imgtop2['userID']);

		$arrayfinal[] = $imgtop2 + $row3 + $retarder + $reply;

	}

	$smarty->assign("rowcom", $arrayfinal);

	// CREATE COMMENT
	if (isset($_POST['submit'])) {

				$stmt = $db->prepare('INSERT INTO posts_comments (userID,`desc`,`time`,postID) VALUES (:userID, :desc, :time, :postID)');
				$stmt->execute(array(
						':userID' => $_SESSION["memberID"],
						':desc' => $_POST["desc"],
						':time' => time(),
						':postID' => htmlspecialchars($_GET["id"])
				));

				header("Location: viewpost?id=".htmlspecialchars($_GET['id'])."&action=commentadded");
	}

$smarty->display("viewpost.tpl");

?>

{include file="header.tpl"}
<div class="wrapper">
 <div class="page-header header-filter">
   <div class="page-header-image" data-parallax="true" style="background-image: url('../../uploads/backgrounds/{$row["background"]}');"></div>
   <div class="container">
     <div class="row">
       <div class="col-md-8 ml-auto mr-auto text-center">
         <h1 class="title">{$row["title"]}</h1>
         <div class="author">
           <h1 class="description">{$row["username"]}</h1>
           <img src="{$row['avatar']}" alt="..." class="avatar img-raised">
         </div>
         <br/>
         <h4 class="description"></h4>
       </div>
     </div>
   </div>
 </div>
 <div class="section">
   <div class="container">
     <div class="row">
       <div class="col-md-8 ml-auto mr-auto">
         {$row["text"]}
       </div>
     </div>
   </div>
 </div>
 <div class="section section-blog-info">
   <div class="container">
     <div class="row">
       <div class="col-md-8 ml-auto mr-auto">
         <div class="row">
           <div class="col-md-10">
             <div class="blog-tags">
               Sekcia:&nbsp;
               <a href="search?action=searchcategory&name={$row["name"]}"><span class="badge badge-primary">{$row["name"]}</span></a>
             </div>
           </div>
           <hr />
           <div class="col-md-8 ml-auto mr-auto">
             <div class="card card-profile profile-bg">
               <div class="card-header" style="background-image: url('../../uploads/backgroundsprofile/{$row["backgroundprofile"]}');">
                 <div class="card-avatar">
                   <a href="#pablo">
                     <img class="img img-raised" src="{$row["avatar"]}" />
                   </a>
                 </div>
               </div>
               <div class="card-body">
                 <h3 class="card-title">{$row["username"]}</h3>
                 <h6 class="category text-primary">SKupina KUKW</h6>
                 <p class="card-description" style="hyphens: auto;">
                   {$row["descr"]}
                 </p>
               </div>
               <div class="card-footer">
                 <div class="follow float-left">
                   <a class="btn btn-primary btn-sm" href="javascript:;">Profil </a>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <div class="section section-comments">
   <div class="container">
     <div class="row">
       <div class="col-md-8 ml-auto mr-auto">
         <div class="media-area">
           <h3 class="title text-center">3 Comments</h3>

           {foreach from=$rowcom item=$rowcoms}
           <div class="media">
             <a class="pull-left" href="#pablo">
               <div class="avatar">
                 <img class="media-object img-raised" src="{$rowcoms['avatar']}" alt="..." />
               </div>
             </a>
             <div class="media-body">
               <h5 class="media-heading"> {$rowcoms["username"]}
                 <small class="text-muted">&middot; {$rowcoms["time"]|date_format:"%d.%m.%Y %H:%M"}</small>
               </h5>
               <p>{$rowcoms['desc']}</p>
               <div class="media-footer">
                 <a href="#pablo" class="btn btn-primary btn-simple btn-sm pull-right" rel="tooltip" title="Reply to Comment">
                   <i class="tim-icons icon-send"></i> Reply
                 </a>
                 <a href="#pablo" class="btn btn-danger btn-simple btn-sm pull-right">
                   <i class="tim-icons icon-heart-2"></i> 243
                 </a>

                 {if $rowcoms["replID"] == $rowcoms["id"]}
                     {$rowcoms["reply"]}
                {/if}

               </div>
             </div>
           </div>
           {/foreach}

           <div class="media">
             <a class="pull-left" href="#pablo">
               <div class="avatar">
                 <img class="media-object img-raised" alt="Tim Picture" src="../../custom/templates/default/assets/img/michael.jpg">
               </div>
             </a>
             <div class="media-body">
               <h5 class="media-heading">John Camber
                 <small class="text-muted">&middot; Yesterday</small>
               </h5>
               <p></p>
               <div class="media-footer">
                 <a href="#pablo" class="btn btn-primary btn-simple btn-sm pull-right" rel="tooltip" title="Reply to Comment">
                   <i class="tim-icons icon-send"></i> Reply
                 </a>
                 <a href="#pablo" class="btn btn-danger btn-simple btn-sm pull-right">
                   <i class="tim-icons icon-heart-2"></i> 243
                 </a>
               </div>

               <div class="media">
                 <a class="pull-left" href="#pablo">
                   <div class="avatar">
                     <img class="media-object img-raised" alt="64x64" src="../../custom/templates/default/assets/img/julie.jpg">
                   </div>
                 </a>
                 <div class="media-body">
                   <h5 class="media-heading">Tina Andrew
                     <small class="text-muted">· 2 Days Ago</small>
                   </h5>
                   <p>Hello guys, nice to have you on the platform! There will be a lot of great stuff coming soon. We will keep you posted for the latest news.</p>
                   <p> Don't forget, You're Awesome!</p>
                   <div class="media-footer">
                     <a href="#pablo" class="btn btn-primary btn-simple btn-sm pull-right" rel="tooltip" title="Reply to Comment">
                       <i class="tim-icons icon-send"></i> Reply
                     </a>
                     <a href="#pablo" class="btn btn-danger btn-simple btn-sm pull-right">
                       <i class="tim-icons icon-heart-2"></i> 243
                     </a>
                   </div>

                   <div class="media">
                     <a class="pull-left" href="#pablo">
                       <div class="avatar">
                         <img class="media-object img-raised" alt="64x64" src="../../custom/templates/default/assets/img/julie.jpg">
                       </div>
                     </a>
                     <div class="media-body">
                       <h5 class="media-heading">Tina Andrew
                         <small class="text-muted">· 2 Days Ago</small>
                       </h5>
                       <p>Hello guys, nice to have you on the platform! There will be a lot of great stuff coming soon. We will keep you posted for the latest news.</p>
                       <p> Don't forget, You're Awesome!</p>
                       <div class="media-footer">
                         <a href="#pablo" class="btn btn-primary btn-simple btn-sm pull-right" rel="tooltip" title="Reply to Comment">
                           <i class="tim-icons icon-send"></i> Reply
                         </a>
                         <a href="#pablo" class="btn btn-danger btn-simple btn-sm pull-right">
                           <i class="tim-icons icon-heart-2"></i> 243
                         </a>
                       </div>
                       <!-- ANOTHER COMMENT HERE -->
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <form method="post">
         <h3 class="title text-center">Post your comment</h3>
         <div class="media media-post">
           <a class="pull-left author" href="#pablo">
             <div class="avatar">
               <img class="media-object img-raised" alt="64x64" src="{$avataruser}">
             </div>
           </a>
           <div class="media-body">
             <textarea class="form-control" rows="4" id="editor1" name="desc"></textarea>
             <script>
                 // Replace the <textarea id="editor1"> with a CKEditor 4
                 // instance, using default configuration.
                 CKEDITOR.replace( 'editor1', {
                   skin: 'prestige'
                 } );
             </script>
             <div class="media-footer">
               <button class="btn btn-primary pull-right" type="submit" name="submit"> Reply </a>
             </div>
           </div>
         </div>
        </form>
         <!-- end media-post -->
       </div>
     </div>
   </div>
 </div>
 <div class="section">
   <div class="container">
     <div class="col-md-12">
       <h2 class="title text-center">Najviac populárne články</h2>
       <br />
       <div class="blogs-1">
         <div class="row">
           <div class="col-md-12 ml-auto mr-auto">
             <div class="card card-blog card-plain blog-horizontal">
               <div class="row">
                 <div class="col-lg-4">
                   <div class="card-image">
                     <a href="#pablo">
                       <img class="img rounded" src="../../custom/templates/default/assets/img/trae-gould.jpg" />
                     </a>
                   </div>
                 </div>
                 <div class="col-lg-8">
                   <div class="card-body">
                     <h3 class="card-title">
                       <a href="#pablo">MateLabs mixes machine learning with IFTTT</a>
                     </h3>
                     <p class="card-description">
                       If you’ve ever wanted to train a machine learning model and integrate it with IFTTT, you now can with a new offering from MateLabs. MateVerse, a platform where novices can spin out machine...If you’ve ever wanted to train a machine learning model and integrate it with IFTTT, you now can with a new offering from MateLabs. MateVerse, a platform where novices can spin out machine...
                       <a href="#pablo"> Read More </a>
                     </p>
                     <div class="author">
                       <img src="../../custom/templates/default/assets/img/james.jpg" alt="..." class="avatar img-raised">
                       <div class="text">
                         <span class="name">Tom Hanks</span>
                         <div class="meta">Drawn on 23 Jan</div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>

{include file="footer.tpl"}
