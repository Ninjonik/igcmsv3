<?php
if (!empty($_GET["action"]))
{
    switch ($_GET["action"])
    {
        case "invalidsubmittype":
            $erroraction = '

					<div class="alert alert-danger alert-with-icon">
						<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
						  <i class="tim-icons icon-simple-remove"></i>
						</button>
						<span data-notify="icon" class="tim-icons icon-support-17"></span>
						<span>
						  <b> Chyba! - </b> Nezadali ste, čo chcete pridať!</span>
					</div>

				';
        break;
        case "fillallfields":
            $erroraction = '

					<div class="alert alert-danger alert-with-icon">
						<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
						  <i class="tim-icons icon-simple-remove"></i>
						</button>
						<span data-notify="icon" class="tim-icons icon-support-17"></span>
						<span>
						  <b> Ajajaj! - </b> Zabudli ste vyplniť všetky políčka!</span>
					</div>

				';
        break;
        case "unsupfiletype":
            $erroraction = '

					<div class="alert alert-danger alert-with-icon">
						<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
						  <i class="tim-icons icon-simple-remove"></i>
						</button>
						<span data-notify="icon" class="tim-icons icon-support-17"></span>
						<span>
						  <b> Ajajaj! - </b> Nahrali ste nepodporovaný typ súboru! Aktuálny typ súboru: .' . $_GET["filetype"] . '</span>
					</div>

				';
        break;
        case "invalidresolution":
            $erroraction = '

				<div class="alert alert-danger alert-with-icon">
					<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
					<i class="tim-icons icon-simple-remove"></i>
					</button>
					<span data-notify="icon" class="tim-icons icon-support-17"></span>
					<span>
					<b> Ajajaj! - </b> Nahrali ste nepodporavané rozlíšenie súboru, aktuálne rozlíšenie: ' . $_GET["height"] . 'x' . $_GET["width"] . '</span>
				</div>

				';
        break;
        case "assignmentsuccessfullydeleted":
            $erroraction = '
			<div class="alert alert-success alert-with-icon">
			<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
				<i class="tim-icons icon-simple-remove"></i>
			</button>
			<span data-notify="icon" class="tim-icons icon-support-17"></span>
			<span>
				<b> Výborne! - </b>Zadanie úspešne vymazané</span>
				</div>
				';
        break;
        case "invalidid":
            $erroraction = '
				<div class="alert alert-danger alert-with-icon">
					<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
					<i class="tim-icons icon-simple-remove"></i>
					</button>
					<span data-notify="icon" class="tim-icons icon-support-17"></span>
					<span>
					<b> Ajajaj! - </b>Nesprávne id</span>
				</div>
				';
        break;
        case "groupsuccesfullyedited":
            $erroraction = '
			<div class="alert alert-success alert-with-icon">
			<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
				<i class="tim-icons icon-simple-remove"></i>
			</button>
			<span data-notify="icon" class="tim-icons icon-support-17"></span>
			<span>
				<b> Výborne! - </b>Skupina úspešne upravená</span>
				</div>
				';
        break;
        case "groupsuccesfullycreated":
            $erroraction = '
			<div class="alert alert-success alert-with-icon">
			<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
				<i class="tim-icons icon-simple-remove"></i>
			</button>
			<span data-notify="icon" class="tim-icons icon-support-17"></span>
			<span>
				<b> Výborne! - </b>Skupina úspešne vytvorená
					</span>
				</div>
				';
        break;
		case "categorysuccessfullycreated":
            $erroraction = '
			<div class="alert alert-success alert-with-icon">
			<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
				<i class="tim-icons icon-simple-remove"></i>
			</button>
			<span data-notify="icon" class="tim-icons icon-support-17"></span>
			<span>
				<b> Výborne! - </b>
						Kategória úspešne vytvorená
					</span>
				</div>
				';
        break;
		case "assignmentssuccessfullycreated":
            $erroraction = '
				<div class="alert alert-success alert-with-icon">
					<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
						<i class="tim-icons icon-simple-remove"></i>
					</button>
					<span data-notify="icon" class="tim-icons icon-support-17"></span>
					<span>
						<b> Výborne! - </b>
						Zadanie úspešne vytvorené
					</span>
				</div>
				';
        break;
		case "actionnotdefined":
            $erroraction = '
				class="alert alert-success alert-with-icon">
					<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
					<i class="tim-icons icon-simple-remove"></i>
					</button>
					<span data-notify="icon" class="tim-icons icon-support-17"></span>
					<span>
						<b> Ajajaj! - </b>
						Akcia neni definovaná
					</span>
				</div>
				';
        break;
		case "invalidreview":
            $erroraction = '
				<div class="alert alert-danger alert-with-icon">
					<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
						<i class="tim-icons icon-simple-remove"></i>
					</button>
					<span data-notify="icon" class="tim-icons icon-support-17"></span>
					<span>
						<b> Ajajaj! - </b>
						Neplatná recenzia
					</span>
				</div>
				';
        break;
		case "needlogin":
            $erroraction = '
				<div class="alert alert-danger alert-with-icon">
					<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
					<i class="tim-icons icon-simple-remove"></i>
					</button>
					<span data-notify="icon" class="tim-icons icon-support-17"></span>
					<span>
						<b> Ajajaj! - </b>
						Musíte byť prihlásení
					</span>
				</div>
				';
        break;
		case "imgreviewed":
            $erroraction = '
				<div class="alert alert-success alert-with-icon">
					<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
						<i class="tim-icons icon-simple-remove"></i>
					</button>
					<span data-notify="icon" class="tim-icons icon-support-17"></span>
					<span>
						<b> Výborne! - </b>
						Recenzia bola vytvorená!
					</span>
				</div>
				';
        break;
		case "imgunreviewed":
            $erroraction = '
				<div class="alert alert-success alert-with-icon">
					<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
					<i class="tim-icons icon-simple-remove"></i>
					</button>
					<span data-notify="icon" class="tim-icons icon-support-17"></span>
					<span>
					<span>
						<b> Úspešne! - </b>
						Recenzia bola odstránená
					</span>
				</div>
				';
        break;
		case "active":
            $erroraction = '
				<div class="alert alert-success alert-with-icon">
					<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
					<i class="tim-icons icon-simple-remove"></i>
					</button>
					<span data-notify="icon" class="tim-icons icon-support-17"></span>
					<span>
						<b> Úspešne! - </b>
						Váš účet bol aktivovaný, môžete sa prihlásiť
					</span>
				</div>
				';
        break;
		case "fileuploaded":
            $erroraction = '
				<div class="alert alert-success alert-with-icon">
					<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
					<i class="tim-icons icon-simple-remove"></i>
					</button>
					<span data-notify="icon" class="tim-icons icon-support-17"></span>
					<span>
						<b> Úspešne! - </b>
						Obrázok nahraný
					</span>
				</div>
				';
        break;
		case "postcreated":
            $erroraction = '
				<div class="alert alert-danger alert-with-icon">
					<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
					<i class="tim-icons icon-simple-remove"></i>
					</button>
					<span data-notify="icon" class="tim-icons icon-support-17"></span>
					<span>
						<b> Ajajaj! - </b>
						Príspevok vytvorený nahraný
					</span>
				</div>
				';
        break;
		case "loggedout":
            $erroraction = '
				<div class="alert alert-success alert-with-icon">
					<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
					<i class="tim-icons icon-simple-remove"></i>
					</button>
					<span data-notify="icon" class="tim-icons icon-support-17"></span>
					<span>
						<b> Úspech! - </b>
						Boli ste odhlásení
					</span>
				</div>
				';
        break;
		case "notedited":
            $erroraction = '
				<div class="alert alert-danger alert-with-icon">
					<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
					<i class="tim-icons icon-simple-remove"></i>
					</button>
					<span data-notify="icon" class="tim-icons icon-support-17"></span>
					<span>
						<b> Ajajaj! - </b>
						Akcia nebola upravená
					</span>
				</div>
				';
        break;
		case "succesfullyeditedprofile":
            $erroraction = '
				<div class="alert alert-success alert-with-icon">
					<button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
					<i class="tim-icons icon-simple-remove"></i>
					</button>
					<span data-notify="icon" class="tim-icons icon-support-17"></span>
					<span>
						<b> Výborne! - </b>
						Profil bol úspešne upravený
					</span>
				</div>
				';
        break;
    case "joined":
    $erroraction = '
      <div class="alert alert-success alert-with-icon">
        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
        <i class="tim-icons icon-simple-remove"></i>
        </button>
        <span data-notify="icon" class="fas fa-check"></span>
        <span>
          <b> Účet úspešne vytvorený! - </b>
          Pozrite si váš e-mail pre potvrdzovací link.
        </span>
      </div>
      ';
    }
    $smarty->assign("erroraction", $erroraction);
}

?>
