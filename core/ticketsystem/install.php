<?php

  require_once("../includes/config.php");

  // Set basic configuration

  // title
  $title = "Ticket System NO2";
  // description
  $desc = "Ultimate ticket system created from NNTWorks.";
  // version of the plugin
  $version = 2;
  // plugin's api for getting version
  $api = "igportals.eu/ticketsystemapi/";
  // path to plugin's folder
  $path = "ticketsystem";
  // pages that plugin has in user panel
  $pagesplugin = array("tickets", "createticket", "viewticket");
  // pages that plugin has in admin panel
  $adminpagesplugin = array("tickets", "viewticket");

  // check if plugin already is in database
  $stmt = $db->prepare('SELECT id FROM plugins WHERE `path`=:path');
  $stmt->execute(array(":path" => $path));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$stmt->execute()) {
    print_r($stmt->errorInfo());
  }

  // Initialize
  $pluginmain = new PluginMain($title, $desc, $version, $api, $path, $pagesplugin, $adminpagesplugin, $db, $row);

  // Get action information
  switch($_GET["action"]){

    case "install":
        // check if plugin is already installed, if not install it
        if(empty($row["id"])){
            $pluginmain->install();
        } else {
            header("Location: ../admin_panel/plugins?action=pluginwasnotinstalled");
        }
    break;

    case "update":
        // check if plugin is already installed, if not give error message
        if(empty($row["id"])){
            header("Location: ../admin_panel/plugins?action=pluginwasnotunninstalled");
        } else {
            $pluginmain->update();
        }
    break;

    case "uninstall":
        // check if plugin is already installed, if not give error message
        if(empty($row["id"])){
            header("Location: ../admin_panel/plugins?action=pluginwasnotupdated");
        } else {
            $pluginmain->uninstall();
        }
    break;

  }

  class PluginMain {

    private $title;
    private $desc;
    private $version;
    private $api;
    private $path;
    private $pagesplugin;
    private $adminpagesplugin;
    private $rowdata;
    private $db;

      function __construct($title, $desc, $version, $api, $path, $pagesplugin, $adminpagesplugin, $db, $rowdata){
        $this->title = $title;
        $this->desc = $desc;
        $this->version = $version;
        $this->api = $api;
        $this->path = $path;
        $this->pagesplugin = $pagesplugin;
        $this->adminpagesplugin = $adminpagesplugin;
        $this->db = $db;
      }

      function install(){
        // get sql database structure
        $sql12 = file_get_contents('sql.sql');

        $mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

        // insert it into database
        $mysqli->multi_query($sql12);

        // insert plugin info into database
        $stmt = $this->db->prepare('INSERT INTO plugins (title,`desc`,version,api,`path`) VALUES (:title, :desc, :version, :api, :path)');
        $stmt->execute(array(":title" => $this->title, ":desc" => $this->desc, ":version" => $this->version, ":api" => $this->api, ":path" => $this->path));

        // copy user_panel pages
        foreach($this->pagesplugin as $pageplugin){
            copy("core/user_panel/".$this->pageplugin.".php","../user_panel/".$this->pageplugin.".php");
            copy("custom/templates/default/".$this->pageplugin.".tpl", "../../custom/templates/default/".$this->pageplugin.".tpl");
        }

        // copy admin_panel pages
        foreach($this->adminpagesplugin as $adminpageplugin){
            copy("core/admin_panel/".$adminpageplugin.".php","../admin_panel/".$adminpageplugin.".php");
            copy("custom/panel_templates/default/".$adminpageplugin.".tpl", "../../custom/panel_templates/default/".$this->adminpageplugin.".tpl");
        }

        // set navbar links

        copy("custom/templates/plugins/".$this->path.".tpl", "../../custom/templates/plugins/".$this->path.".tpl");
        copy("custom/panel_templates/plugins/".$this->path.".tpl", "../../custom/panel_templates/plugins/".$this->path.".tpl");

        header("Location: ../admin_panel/plugins?action=pluginsuccessfullyinstalled");
      }

      function update(){
        // update plugin information
        $stmt = $this->db->prepare('UPDATE plugins SET title=:title, `desc`=:desc, version=:version, api=:api WHERE id=:id');
        $stmt->execute(array(":title" => $this->title, ":desc" => $this->desc, ":version" => $this->version, ":api" => $this->api, ":id" => $this->row["id"]));

        // delete old files
        foreach($this->pagesplugin as $pageplugin){
            unlink('../user_panel/'.$pageplugin.'.php');
            unlink('../../custom/templates/default/'.$pageplugin.'.tpl');
        }
        unlink('../../custom/templates/default/plugins/'.$this->path.'.tpl');

        // copy new files
        foreach($this->pagesplugin as $pageplugin){
            copy("core/user_panel/".$pageplugin.".php","../user_panel/".$pageplugin.".php");
            copy("custom/templates/default/".$pageplugin.".tpl", "../../custom/templates/default/".$pageplugin.".tpl");
        }
        foreach($this->adminpagesplugin as $adminpageplugin){
            copy("core/admin_panel/".$adminpageplugin.".php","../admin_panel/".$adminpageplugin.".php");
            copy("custom/panel_templates/default/".$adminpageplugin.".tpl", "../../custom/panel_templates/default/".$adminpageplugin.".tpl");
        }
        copy("custom/templates/plugins/".$this->path.".tpl", "../../custom/templates/plugins/".$this->path.".tpl");
        copy("custom/panel_templates/plugins/".$this->path.".tpl", "../../custom/panel_templates/plugins/".$this->path.".tpl");

        header("Location: ../admin_panel/plugins?action=pluginupdated");
      }

      function uninstall(){
        // delete plugin information from database
        $stmt = $this->db->prepare('DELETE FROM plugins WHERE id=:id');
        $stmt->execute(array(":id" => $this->rowdata["id"]));
  
        // remove plugin's data from database
        $stmt2 = $this->db->prepare('DROP TABLE tickets');
        $stmt2->execute();
        $stmt3 = $this->db->prepare('DROP TABLE tickets_comments');
        $stmt3->execute();
  
        // remove plugin's pages
        foreach($this->pagesplugin as $pageplugin){
          unlink('../user_panel/'.$pageplugin.'.php');
          unlink('../../custom/templates/default/'.$pageplugin.'.tpl');
        }
  
        foreach($this->adminpagesplugin as $adminpageplugin){
          unlink('../admin_panel/'.$tadminpageplugin.'.php');
          unlink('../../custom/panel_templates/default/'.$dminpageplugin.'.tpl');
        }
  
        unlink('../../custom/panel_templates/default/plugins/'.$this->path.'.tpl');
  
        header("Location: ../admin_panel/plugins?action=pluginunninstalled");
      }

  }

?>
