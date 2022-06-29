
<?php
define("DBHOST", "localhost");
define("DBUSER", "dbuser");
define("DBPASS", "password");
define("DBNAME", "igcmstest");

//application address
define("DIR","http://localhost/igcms");
define("SITEEMAIL","");

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