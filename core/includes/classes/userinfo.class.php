<?php 

class userinfo {
    public $userid;
    private $_db;
  
      function __construct($userid,$db) {
        $this->userid = $userid;
        $this->_db = $db;
      }
  
      public function usrgrpdetails($what){
  
        try {
            $stmt = $this->_db->prepare('SELECT members.groupID, '.$what.' FROM members INNER JOIN `groups` ON members.groupID=`groups`.id WHERE members.memberID=:memberID');
            $stmt->execute(array('memberID' => $this->userid));
    
            return $stmt->fetch();
    
        } catch(PDOException $e) {
            return '<p class="bg-danger">'.$e->getMessage().'</p>';
        }
  
     } 
}
  
  /* USE

  $userinfo = new userinfo(9,$db);
  $usergroupinfo = $userinfo->usrgrpdetails("groups.title");

  */

?>