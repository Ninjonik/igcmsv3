<?php

require_once("hdr.php");

$id = $_GET["id"];
isempty("forum?action=invalidid", $id);

// BASIC - FORUMS AND TOPICS

$forums = $db->prepare("SELECT id, title, `desc`, parent FROM forums WHERE id=:id ORDER BY `order`");
$forums->execute(array(":id" => htmlspecialchars($_GET["id"])));
$forumsrow = $forums->fetch(PDO::FETCH_ASSOC);

if(!$forums->execute()){
  print_r($forums->errorInfo());
}

if($forumsrow["parent"] == 0){
  header("Location: forum?action=invalidid");
}

$forum = $db->prepare("SELECT id, title, `desc`, parent FROM forums WHERE parent=:parent ORDER BY `order`");
  $forum->execute(array(":parent" => htmlspecialchars($_GET["id"])));
  $forumrow = $forum->fetch(PDO::FETCH_ASSOC);

  if(!$forum->execute()){
    print_r($forum->errorInfo());
  }

  while ($forumrow = $forum->fetch(PDO::FETCH_ASSOC)){
    $forumfinal[] = $forumrow;

    // STATISTICS

      // THREADCOUNT
        // PART ONE

          $threadscount = $db->prepare("SELECT COUNT(T.id) AS count1, COUNT(TC.id) AS count2 FROM topics as T INNER JOIN topics_comments as TC on T.id = TC.topicID WHERE forumID=:forumID");
          $threadscount->execute(array(":forumID" => $forumrow["id"]));
          $threads = $threadscount->fetch(PDO::FETCH_ASSOC);
          if(!$threadscount->execute()){
            print_r($threadscount->errorInfo());
          }

          $postcountarray[] = ["count" => $threads["count2"], "parentID" => $forumrow["id"]];


        // PART ... NEXT
          // MAYBE ONEDAY WILL BE COMPLETED


      // LAST UPDATE 
          // PART ONE
          
          $lastupdate = $db->prepare("SELECT TC.userID, TC.time, M.username, T.title, T.id AS countposts, topicID FROM topics as T INNER JOIN topics_comments as TC ON T.id = TC.topicID INNER JOIN members as M ON TC.userID = M.memberID WHERE forumID=:forumID ORDER BY `time` DESC LIMIT 1");
          $lastupdate->execute(array(":forumID" => $forumrow["id"]));
          $lastupdaterow = $lastupdate->fetch(PDO::FETCH_ASSOC);
          if(!$lastupdate->execute()){
            print_r($lastupdate->errorInfo());
          }
          $avatarlastupdate = getavatar(100, $lastupdaterow["userID"]);
          $lastupdatefinalised[] = ["parentID" => $forumrow["id"], "data" => $lastupdaterow, "avatar" => $avatarlastupdate];
        // PART ... NEXT
          // MAYBE ONEDAY WILL BE COMPLETED
      

  }

  $topics = $db->prepare("SELECT TC.userID, TC.time, M.username, T.title, T.id, COUNT(TC.id) AS countposts, topicID FROM topics as T INNER JOIN topics_comments as TC ON T.id = TC.topicID INNER JOIN members as M ON TC.userID = M.memberID WHERE forumID=:forumID ORDER BY `time` DESC");
  $topics->execute(array(":forumID" => htmlspecialchars($_GET["id"])));
  $topicsrow = $topics->fetch(PDO::FETCH_ASSOC);
  if(!$topics->execute()){
    print_r($topics->errorInfo());
  }
  $avatarlastupdatetopics = getavatar(100, $topicsrow["userID"]);
  $lastupdatefinalisedtopics[] = ["parentID" => $forumrow["id"], "data" => $topicsrow, "avatar" => $avatarlastupdatetopics];

$smarty->assign("threadscount", $countarray);
$smarty->assign("postscounts", $postcountarray);
$smarty->assign("lastupdates", $lastupdatefinalised);
$smarty->assign("topics", $lastupdatefinalisedtopics);
$smarty->assign("forums", $forumfinal);
$smarty->assign("catinfo", $forumsrow);

$smarty->display("viewforum.tpl");

?>
