<?php
	require_once("hdr.php");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);
    isempty("index?action=invalidid", $_GET["id"]);

    $moduleclass = new moduleinfo(5,$db);
    $modulestatus = $moduleclass->modulestatus();

    $MoneyData = getfromDBw(
        "*",
        "case_money",
        "memberID",
        $_SESSION["memberID"]
    )["money"];

    $WelcomeMessage = "<h2> Your balance is: %d ß" . "</h2> <br></br>";
    if (empty($MoneyData)) {
        insertDB("case_money", "memberID", "'".$_SESSION['memberID']."'");
        header("Location: opencase.php?action=accountcreated");
    } else {
        $smarty->assign("WelcomeMessage", sprintf($WelcomeMessage, $MoneyData));
    }

    function ManageAccountBalance($operation, $balance){
        global $db;
        $stmt = $db->prepare('UPDATE case_money SET money = money '.$operation.''.$balance.' WHERE memberID=:memberID');
        $stmt->execute(array(":memberID" => $_SESSION["memberID"]));
    }

    class OpenableCase {
        private $id;
        private $price;
        private $items;
        private $smarty;

        function __construct($id, $case_data, $smarty) {
            $this->id = $id;
            $this->price = $case_data["price"];
            $this->items = unserialize($case_data["items"]);
            $this->smarty = $smarty;
        }

        public function get_id() {
            return $this->id;
        }
        public function get_price() {
            return $this->price;
        }
        public function get_items() {
            return $this->items;
        }

        public function open($MONEY) {
            if ($MONEY >= ($this->get_price() - 1000)) {
                ManageAccountBalance("-", $this->get_price());
                
                foreach ($this->get_items() as $item) {
                    $random_num = random_int(1, 10000)/100;
                    if ($random_num <= $item["chance"]) {
                        $ItemCoSiVyhral = getfromDBw("*", "case_items", "id", $item["id"]);
                        ManageAccountBalance("+", $ItemCoSiVyhral["value"]);

                        $WinMessage = sprintf("<h2> Vyhra: %s (%d ß) </h2>", $ItemCoSiVyhral["title"], $ItemCoSiVyhral["value"]);
                        $this->smarty->assign("WinMessage", $WinMessage);

                        break;
                    } else {
                        //echo "Nothing";
                    }
                }
            } else {
                echo "ERROR: You are poor: " . $MONEY . " / " . $this->get_price();
            }
        }
    }

    $CaseData = getfromDBw("*", "case_cases", "id", $_GET["id"]);
    $CaseToOpen = new OpenableCase($_GET["id"], $CaseData, $smarty);

    if (isset($_POST["opencase"])){
        $CaseToOpen->open($MoneyData);
    }

    $smarty->assign("CaseToOpen", $CaseToOpen);
    $smarty->assign("CasePrice", $CaseToOpen->get_price());

    $smarty->display("opencase.tpl");
?>