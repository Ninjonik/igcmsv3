<?php

class moduleinfo {
    public $moduleid;
    private $_db;

      function __construct($moduleid,$db) {
        $this->moduleid = $moduleid;
        $this->_db = $db;
      }

      public function modulestatus(){

        try {
            $stmt = $this->_db->prepare('SELECT value FROM settings_modules WHERE id=:id');
            $stmt->execute(array('id' => $this->moduleid));
            $row = $stmt->fetch();

            if($row["value"] == 0){
              header("Location: ../user_panel/404-page.php");
            }


        } catch(PDOException $e) {
            return '<p class="bg-danger">'.$e->getMessage().'</p>';
        }

     }

     public function modulevisibility(){

      try {
          $stmt = $this->_db->prepare('SELECT value FROM settings_modules WHERE id=:id');
          $stmt->execute(array('id' => $this->moduleid));
          $row = $stmt->fetch();

          if($row["value"] == 0){
            $value = "hidden";
          } else {
            $value = "";
          }

          return $value;


      } catch(PDOException $e) {
          return '<p class="bg-danger">'.$e->getMessage().'</p>';
      }

   }


}

  /* USE

  $moduleclass = new moduleinfo(9,$db);
  $modulestatus = $moduleclass->modulestatus();

  */

?>