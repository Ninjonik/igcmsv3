<?php

  // REGISTRATIONS DOWN

  $stmt52 = $db->prepare('SELECT * FROM members ORDER BY joinTime');
	$stmt52->execute(array());
	$row52 = $stmt52->fetch(PDO::FETCH_ASSOC);

	if (!$stmt52->execute()) {
		print_r($stmt52->errorInfo());
	}

  $test2 = 0;
  $monday2 = 0;
  $tuesday2 = 0;
  $wednesday2 = 0;
  $thursday2 = 0;
  $friday2 = 0;
  $saturday2 = 0;
  $sunday2 = 0;

  while ($row52 = $stmt52->fetch(PDO::FETCH_ASSOC)) {
    $array12 = $row52;

    $echo25 = getdate($row52["joinTime"]);

    $currenttime = time();
    $echo225 = getdate($currenttime);

    $stmt22 = $db->prepare('SELECT * FROM members WHERE joinTime=:joinTime');
    $stmt22->execute(array(":joinTime" => $row52["joinTime"]));
    $row22 = $stmt22->fetch(PDO::FETCH_ASSOC);

    if (!$stmt22->execute()) {
      print_r($stmt22->errorInfo());
    }

    $array122 = $row22;

    $echo232 = getdate($row22["joinTime"]);

    $valueDay2 = date('z', $row22["joinTime"]);
    $valueCDay2 = date('z', time());

    $valueDfinal2 = $valueDay2 + 1;
    $valueCDayfinal2 = $valueCDay2 + 1;

    $value2 = $valueDfinal2 - $valueCDayfinal2;

    if($value2 <= 0 AND $value2 >= -6){

      switch ($echo232["weekday"]) {
        case "Monday":
            $monday2 = $monday2 + 1;
            break;
        case "Tuesday":
            $tuesday2 = $tuesday2 + 1;
            break;
        case "Wednesday":
            $wednesday2 = $wednesday2 + 1;
            break;
        case "Thursday":
            $thursday2 = $thursday2 + 1;
            break;
        case "Friday":
            $friday2 = $friday2 + 1;
            break;
        case "Saturday":
            $saturday2 = $saturday2 + 1;
            break;
        case "Sunday":
            $sunday2 = $sunday2 + 1;
            break;
        }
    }

	}

    switch ($echo225["weekday"]) {
      case "Monday":
            $on2 = "Sunday";
            $onn2 = $sunday2;
            $tw2 = "Saturday";
            $twn2 = $saturday2;
            $th2 = "Friday";
            $thn2 = $friday2;
            $fo2 = "Thursday";
            $fon2 = $thursday2;
            $fi2 = "Wednesday";
            $fin2 = $wednesday2;
            $si2 = "Tuesday";
            $sin2 = $tuesday2;
            $se2 = "Monday";
            $sen2 = $monday2;
          break;
      case "Tuesday":
            $on2 = "Monday";
            $tw2 = "Sunday";
            $th2 = "Saturday";
            $fo2 = "Friday";
            $fi2 = "Thursday";
            $si2 = "Wednesday";
            $se2 = "Tuesday";
            $onn2 = $monday2;
            $twn2 = $sunday2;
            $thn2 = $saturday2;
            $fon2 = $friday2;
            $fin2 = $thursday2;
            $sin2 = $wednesday2;
            $sen2 = $tuesday2;
          break;
      case "Wednesday":
            $on2 = "Tuesday";
            $tw2 = "Monday";
            $th2 = "Sunday";
            $fo2 = "Saturday";
            $fi2 = "Friday";
            $si2 = "Thursday";
            $se2 = "Wednesday";
            $onn2 = $tuesday2;
            $twn2 = $monday2;
            $thn2 = $sunday2;
            $fon2 = $saturday2;
            $fin2 = $friday2;
            $sin2 = $thursday2;
            $sen2 = $wednesday2;
          break;
      case "Thursday":
            $on2 = "Wednesday";
            $tw2 = "Tuesday";
            $th2 = "Monday";
            $fo2 = "Sunday";
            $fi2 = "Saturday";
            $si2 = "Friday";
            $se2 = "Thursday";
            $onn2 = $wednesday2;
            $twn2 = $tuesday2;
            $thn2 = $monday2;
            $fon2 = $sunday2;
            $fin2 = $saturday2;
            $sin2 = $friday2;
            $sen2 = $thursday2;
          break;
      case "Friday":
            $on2 = "Thursday";
            $tw2 = "Wednesday";
            $th2 = "Tuesday";
            $fo2 = "Monday";
            $fi2 = "Sunday";
            $si2 = "Saturday";
            $se2 = "Friday";
            $onn2 = $thursday2;
            $twn2 = $wednesday2;
            $thn2 = $tuesday2;
            $fon2 = $monday2;
            $fin2 = $sunday2;
            $sin2 = $saturday2;
            $sen2 = $friday2;
          break;
      case "Saturday":
            $on2 = "Friday";
            $tw2 = "Thursday";
            $th2 = "Wednesday";
            $fo2 = "Tuesday";
            $fi2 = "Monday";
            $si2 = "Sunday";
            $se2 = "Saturday";
            $onn2 = $friday2;
            $twn2 = $thursday2;
            $thn2 = $wednesday2;
            $fon2 = $tuesday2;
            $fin2 = $monday2;
            $sin2 = $sunday2;
            $sen2 = $saturday2;
          break;
      case "Sunday":
            $on2 = "Saturday";
            $tw2 = "Friday";
            $th2 = "Thursday";
            $fo2 = "Wednesday";
            $fi2 = "Tuesday";
            $si2 = "Monday";
            $se2 = "Sunday";
            $onn2 = $saturday2;
            $twn2 = $friday2;
            $thn2 = $thursday2;
            $fon2 = $wednesday2;
            $fin2 = $tuesday2;
            $sin2 = $monday2;
            $sen2 = $sunday2;
          break;
      }
$datausl7d = "
    <script>
      new Chart(document.getElementById('line-chart'), {
      type: 'line',
      data: {
        labels: ['".$si2."', '".$fi2."', '".$fo2."', '".$th2."', '".$tw2."', '".$on2."', 'Today'],
        datasets: [{
            data: [".$sin2.", ".$fin2.", ".$fon2.", ".$thn2.", ".$twn2.", ".$onn2.", ".$sen2."],
            label: 'Zaregistrovaní uživatelia za posledných 7 dní',
            borderColor: '#c45850',
            fill: false
          }
        ]
      },
      options: {
        title: {
          display: true,
          text: 'Počet zaregistrovaných uživateľov (Posledných 7 dní)'
        }
      }
      });
    </script>
    ";
?>
