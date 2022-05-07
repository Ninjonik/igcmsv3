<?php

  require_once("../includes/config.php");

  $title = "Ticket System NO2";
  $desc = "Ultimate ticket system created from NNTWorks.";
  $version = 2;
  $api = "igportals.eu/ticketsystemapi/";
  $path = "ticketsystem";
  $pagesplugin = array("tickets", "createticket", "viewticket");
  $adminpagesplugin = array("tickets", "viewticket");

  $stmt = $db->prepare('SELECT id FROM plugins WHERE `path`=:path');
  $stmt->execute(array(":path" => $path));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$stmt->execute()) {
    print_r($stmt->errorInfo());
  }

if($_GET["action"] == "install"){
    if(empty($row["id"])){

      $sql12 = file_get_contents('sql.sql');

			$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

			/* execute multi query */
			$mysqli->multi_query($sql12);

      $stmt = $db->prepare('INSERT INTO plugins (title,`desc`,version,api,`path`) VALUES (:title, :desc, :version, :api, :path)');
      $stmt->execute(array(":title" => $title, ":desc" => $desc, ":version" => $version, ":api" => $api, ":path" => $path));

      foreach($pagesplugin as $pageplugin){
        copy("core/user_panel/".$pageplugin.".php","../user_panel/".$pageplugin.".php");
        copy("custom/templates/default/".$pageplugin.".tpl", "../../custom/templates/default/".$pageplugin.".tpl");
      }

      foreach($adminpagesplugin as $adminpageplugin){
        copy("core/admin_panel/".$adminpageplugin.".php","../admin_panel/".$adminpageplugin.".php");
        copy("custom/panel_templates/default/".$adminpageplugin.".tpl", "../../custom/panel_templates/default/".$adminpageplugin.".tpl");
      }

      copy("custom/templates/plugins/".$path.".tpl", "../../custom/templates/plugins/".$path.".tpl");
      copy("custom/panel_templates/plugins/".$path.".tpl", "../../custom/panel_templates/plugins/".$path.".tpl");

      header("Location: ../admin_panel/plugins?action=pluginsuccessfullyinstalled");
    } else {
      header("Location: ../admin_panel/plugins?action=pluginwasnotinstalled");
    }
} else if($_GET["action"] == "uninstall") {
    if(empty($row["id"])){
      header("Location: ../admin_panel/plugins?action=pluginwasnotunninstalled");
    } else {
      $stmt = $db->prepare('DELETE FROM plugins WHERE id=:id');
      $stmt->execute(array(":id" => $row["id"]));

      $stmt2 = $db->prepare('DROP TABLE tickets');
      $stmt2->execute();
      $stmt3 = $db->prepare('DROP TABLE tickets_comments');
      $stmt3->execute();

      foreach($pagesplugin as $pageplugin){
        unlink('../user_panel/'.$pageplugin.'.php');
        unlink('../../custom/templates/default/'.$pageplugin.'.tpl');
      }

      foreach($adminpagesplugin as $adminpageplugin){
        unlink('../admin_panel/'.$adminpageplugin.'.php');
        unlink('../../custom/panel_templates/default/'.$adminpageplugin.'.tpl');
      }

      unlink('../../custom/panel_templates/default/plugins/'.$path.'.tpl');

      header("Location: ../admin_panel/plugins?action=pluginunninstalled");
    }
} else if($_GET["action"] == "update") {
    if(empty($row["id"])){
      header("Location: ../admin_panel/plugins?action=pluginwasnotupdated");
    } else {

      $stmt = $db->prepare('UPDATE plugins SET title=:title, `desc`=:desc, version=:version, api=:api WHERE id=:id');
      $stmt->execute(array(":title" => $title, ":desc" => $desc, ":version" => $version, ":api" => $api, ":id" => $row["id"]));

      foreach($pagesplugin as $pageplugin){
        unlink('../user_panel/'.$pageplugin.'.php');
        unlink('../../custom/templates/default/'.$pageplugin.'.tpl');
      }
      unlink('../../custom/templates/default/plugins/'.$path.'.tpl');
      foreach($pagesplugin as $pageplugin){
        copy("core/user_panel/".$pageplugin.".php","../user_panel/".$pageplugin.".php");
        copy("custom/templates/default/".$pageplugin.".tpl", "../../custom/templates/default/".$pageplugin.".tpl");
      }
      foreach($adminpagesplugin as $adminpageplugin){
        copy("core/admin_panel/".$adminpageplugin.".php","../admin_panel/".$adminpageplugin.".php");
        copy("custom/panel_templates/default/".$adminpageplugin.".tpl", "../../custom/panel_templates/default/".$adminpageplugin.".tpl");
      }
      copy("custom/templates/plugins/".$path.".tpl", "../../custom/templates/plugins/".$path.".tpl");
      copy("custom/panel_templates/plugins/".$path.".tpl", "../../custom/panel_templates/plugins/".$path.".tpl");

      header("Location: ../admin_panel/plugins?action=pluginupdated");
    }
} else {
  header("Location: ../admin_panel/plugins?action=accessforbidden");
}

?>
