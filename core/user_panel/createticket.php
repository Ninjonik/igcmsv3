<?php



require_once("hdr.php");



islog("createpost.php");





$stmt2 = $db->prepare("SELECT * FROM categories WHERE type=:type ORDER BY catID");

$stmt2->execute(array(":type" => 1));

$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);



if (!$stmt2->execute())

{

  print_r($stmt2->errorInfo());

}



while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))

{

  $cats[] = $row2;

}

$smarty->assign("cats", $cats);



if (isset($_POST['submit'])) {



      isempty("createticket?action=fillallfields", $_POST["title"]);

      isempty("createticket?action=fillallfields", $_POST["desc"]);

      isempty("createticket?action=fillallfields", $_POST["category"]);



      if(empty($_POST["category"])){

        $category = 0;

      } else {

        $category = $_POST["category"];

      }



      $stmt = $db->prepare('INSERT INTO tickets (authorID,`date`,catID,title,editdate) VALUES (:authorID, :date, :catID, :title, :editdate)');

			$stmt->execute(array(

					':authorID' => $_SESSION["memberID"],

					':date' => time(),

          ':catID' => $category,

          ':title' => $_POST["title"],

          ':editdate' => time()

			));



      $id = $db->lastInsertId('id');



      $stmt3 = $db->prepare('INSERT INTO tickets_comments (userID,`desc`,`time`,ticketID) VALUES (:userID, :desc, :time, :ticketID)');

			$stmt3->execute(array(

					':userID' => $_SESSION["memberID"],

					':desc' => $_POST["desc"],

					':time' => time(),

          ':ticketID' => $id

			));



      $idno2 = $db->lastInsertId('id');



      $stmt4 = $db->prepare('UPDATE tickets SET editcomID=:editcomID WHERE id=:id');

			$stmt4->execute(array(

					':editcomID' => $idno2,

          ':id' => $id

			));







			header("Location: viewticket?id=".$id."&ticketcreated");

}



$smarty->display("createticket.tpl");

?>

