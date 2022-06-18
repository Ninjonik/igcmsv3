<?php



  require_once("hdr.php");



  $id = $_GET["id"];

  isempty("tickets?action=invalidticket", $id);



  $rowtickets = getfromDBw("*", "tickets", "id", $id);

  $smarty->assign("ticket", $rowtickets);



  $rowcatname = getfromDBw("name", "categories", "catID", $rowtickets["catID"]);

  $smarty->assign("catname", $rowcatname["name"]);



  switch($rowtickets["status"]){

    case 0:

      $status = '<button type="button" class="btn btn-primary">Čaká sa na podporu</button>';

      break;

    case 1:

      $status = '<button type="button" class="btn btn-info">Rieši sa</button>';

      break;

    case 2:

      $status = '<button type="button" class="btn btn-success">Vyriešené</button>';

      break;

    case 3:

      $status = '<button type="button" class="btn btn-danger">Uzavreté</button>';

      break;

    case 4:

      $status = '<button type="button" class="btn btn-warning">Odložené</button>';

      break;

    case 5:

      $status = '<button type="button" class="btn btn-default">Čaká sa na uživateľa</button>';

      break;

  }

  $smarty->assign("status", $status);



  // COMMENTS (REPLIES)



  // COMMENTS



  $stmt252 = $db->prepare("SELECT

    C.id,

    C.userID,

    C.desc,

    C.time,

    C.ticketID,

    C.quoteID,

    C.review,

    C.ticketID,

    C.type,

    M.joinTime,

    M.username

  FROM

    tickets_comments AS C

     INNER JOIN members AS M

     ON

      M.memberID = C.userID

  WHERE C.ticketID=:id

  ORDER BY C.id

  ");

  $stmt252->execute(array(":id" => htmlspecialchars($_GET["id"])));

  $row252 = $stmt252->fetch(PDO::FETCH_ASSOC);



  if (!$stmt252->execute())

  {

    print_r($stmt252->errorInfo());

  }



  while ($row252 = $stmt252->fetch(PDO::FETCH_ASSOC))

  {

    $rowfirst2[] = $row252;

  }



  foreach($rowfirst2 as $rowsecond2){



    /*if($rowsecond2["quoteID"] != 0){



      $stmt2522 = $db->prepare("SELECT

        C.id,

        C.userID,
        C.desc,

        C.time,

        C.ticketID,

        C.quoteID,

        C.review,

        C.type,

        M.joinTime,

        M.username

        FROM

          tickets_comments AS C

        INNER JOIN members AS M

        ON

          M.memberID = C.userID

      WHERE C.id=:id

      ");

      $stmt2522->execute(array(":id" => $rowsecond2["quoteID"]));

      $row2522 = $stmt2522->fetch(PDO::FETCH_ASSOC);



      if (!$stmt2522->execute())

      {

        print_r($stmt2522->errorInfo());

      }



      while ($row2522 = $stmt2522->fetch(PDO::FETCH_ASSOC))

      {

        $rowfirst22[] = $row2522;



        $avatarus["avatar"] = getavatar(100, $row2522["userID"]);

        $avatarusfinal = "'".$avatarus['avatar']."'";



        $quotefinal["quotefinal"] = '



        <p><blockquote>

         <p>'.$row2522["desc"].'</p>

         <cite>'.$row2522["username"].' '.date('d.m.Y H:i:s', $row2522["time"]).'</cite>

         <div class="blockquote-author-image" style="--image: url('.$avatarusfinal.')"></div>

       </blockquote></p>



        ';

      }



    } else {

      $quotefinal["quotefinal"] = "";

    }



    $avatar22["avatar"] = getavatar(100, $rowsecond2["userID"]);*/

    $rowfinal32[] = $rowsecond2/* + $avatar22 + $quotefinal*/;

  }





  $smarty->assign("rowcom", $rowfinal32);



  // CREATE COMMENT

  if (isset($_POST['submit'])) {



        $stmt = $db->prepare('INSERT INTO tickets_comments (userID,`desc`,`time`,ticketID,quoteID) VALUES (:userID, :desc, :time, :ticketID, :quoteID)');

        $stmt->execute(array(

            ':userID' => $_SESSION["memberID"],

            ':desc' => $_POST["desc"],

            ':time' => time(),

            ':ticketID' => htmlspecialchars($_GET["id"]),

            ':quoteID' => htmlspecialchars($_GET["quote"])

        ));



        $idstmato = $db->lastInsertId('id');



        $stmt = $db->prepare('UPDATE tickets SET editdate=:editdate, editcomID=:editcomID WHERE id=:id');

        $stmt->execute(array(

            ':editdate' => time(),

            ':editcomID' => $idstmato,

            ':id' => $_GET["id"]

        ));



        header("Location: viewticket?id=".htmlspecialchars($_GET['id'])."&action=commentadded");

  }

/*

  // QUOTES



  $quote = "";



  if(!empty($_GET["quote"])){

       $stmtci = $db->prepare('SELECT * FROM tickets_comments WHERE id=:id');

       $stmtci->execute(array(':id' => htmlspecialchars($_GET["quote"])));

       $rowci = $stmtci->fetch(PDO::FETCH_ASSOC);



       $stmtcim = $db->prepare('SELECT * FROM members WHERE memberID=:id');

       $stmtcim->execute(array(':id' => $rowci["userID"]));

       $rowcim = $stmtcim->fetch(PDO::FETCH_ASSOC);



       $r2mdate = date("d.m.Y H:i", $rowci["time"]);



       $quote = '<p><a href="profile?id='.$rowcim["memberID"].'"><span style="color:#ff00ff">@'.$rowcim["username"].'</span></a><span>&nbsp;</span></p>';



       // ADD NOTIFICATION HERE



  }

  $smarty->assign("quote", $quote);

*/

  $smarty->display("viewticket.tpl");



?>

