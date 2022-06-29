<!--
 =========================================================
* Black Dashboard PRO - v1.1.1
=========================================================

* Product Page: https://themes.getbootstrap.com/product/black-dashboard-pro-premium-bootstrap-4-admin/
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../custom/panel_templates/default/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../custom/panel_templates/default/assets/img/favicon.png">
  <title>
    {$siteTitle}
  </title>
  <!--     Fonts and icons     -->

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/8fe68ee7cd.js" crossorigin="anonymous"></script>
  <link href="../../../../use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../../custom/panel_templates/default/assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../../custom/panel_templates/default/assets/css/black-dashboard.min3f71.css?v=1.1.1" rel="stylesheet" />

  <script src="../../custom/panel_templates/default/ckeditor/ckeditor.js"></script>
  <script src="../../custom/panel_templates/default/assets/chartjs/chart.js"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <link href="../../custom/panel_templates/default/viewtable.css" rel="stylesheet" />


</head>

<body class="sidebar-mini ">
  <div class="wrapper">
    <div class="navbar-minimize-fixed">
      <button class="minimize-sidebar btn btn-link btn-just-icon">
        <i class="tim-icons icon-align-center visible-on-sidebar-regular text-muted"></i>
        <i class="tim-icons icon-bullet-list-67 visible-on-sidebar-mini text-muted"></i>
      </button>
    </div>
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="index" class="simple-text logo-mini">
            DB
          </a>
          <a href="index" class="simple-text logo-normal">
            {$siteTitle}
          </a>
        </div>
        <ul class="nav">
          <li {getactivemenuitem string="index.php"}>
            <a href="index">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Nástenka</p>
            </a>
          </li>
          <li {getactivemenuitem string="groups.php"} {getactivemenuitem string="creategroup.php"}>
            <a data-toggle="collapse" href="#groups">
              <i class="tim-icons icon-molecule-40"></i>
              <p>
                Skupiny
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="groups">
              <ul class="nav">
                <li>
                  <a href="groups">
                    <span class="sidebar-mini-icon">S</span>
                    <span class="sidebar-normal"> Skupiny </span>
                  </a>
                </li>
                <li>
                  <a href="creategroup">
                    <span class="sidebar-mini-icon">VS</span>
                    <span class="sidebar-normal"> Vytvoriť skupinu </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li {getactivemenuitem string="cats.php"} {getactivemenuitem string="createcat.php"}>
            <a data-toggle="collapse" href="#posts">
              <i class="tim-icons icon-paper"></i>
              <p>
                Kategórie
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="posts">
              <ul class="nav">
                <li>
                  <a href="cats">
                    <span class="sidebar-mini-icon">K</span>
                    <span class="sidebar-normal"> Kategórie </span>
                  </a>
                </li>
                <li>
                  <a href="createcat">
                    <span class="sidebar-mini-icon">VK</span>
                    <span class="sidebar-normal"> Vytvoriť kategóriu </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li {getactivemenuitem string="pages.php"} {getactivemenuitem string="createpage.php"} {getactivemenuitem string="editpage.php"} {getmodulestatus id=6}>
            <a data-toggle="collapse" href="#pages">
              <i class="tim-icons icon-single-copy-04"></i>
              <p>
                Stránky
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="pages">
              <ul class="nav">
                <li>
                  <a href="pages">
                    <span class="sidebar-mini-icon">S</span>
                    <span class="sidebar-normal"> Stránky </span>
                  </a>
                </li>
                <li>
                  <a href="createpage">
                    <span class="sidebar-mini-icon">VS</span>
                    <span class="sidebar-normal"> Vytvoriť stránku </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li {getactivemenuitem string="assignments.php"} {getactivemenuitem string="createassignment.php"} {getactivemenuitem string="myassignments.php"} {getmodulestatus id=4}>
            <a data-toggle="collapse" href="#assignments">
              <i class="tim-icons icon-pin"></i>
              <p>
                Zadania
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="assignments">
              <ul class="nav">
                <li>
                  <a href="assignments">
                    <span class="sidebar-mini-icon">Z</span>
                    <span class="sidebar-normal"> Zadania </span>
                  </a>
                </li>
                <li>
                  <a href="createassignment">
                    <span class="sidebar-mini-icon">VZ</span>
                    <span class="sidebar-normal"> Vytvoriť zadanie </span>
                  </a>
                </li>
                <li>
                  <a href="myassignments">
                    <span class="sidebar-mini-icon">MZ</span>
                    <span class="sidebar-normal"> Moje zadania </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li {getactivemenuitem string="forums.php"} {getactivemenuitem string="createforum.php"} {getmodulestatus id=2}>
            <a data-toggle="collapse" href="#forums">
              <i class="tim-icons icon-notes"></i>
              <p>
                Fóra
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="forums">
              <ul class="nav">
                <li>
                  <a href="forums">
                    <span class="sidebar-mini-icon">F</span>
                    <span class="sidebar-normal"> Fóra </span>
                  </a>
                </li>
                <li>
                  <a href="createforum">
                    <span class="sidebar-mini-icon">VF</span>
                    <span class="sidebar-normal"> Vytvoriť fórum </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li {getactivemenuitem string="plugins.php"} {getactivemenuitem string="settings_modules.php"}>
            <a data-toggle="collapse" href="#plugins">
              <i class="tim-icons icon-puzzle-10""></i>
              <p>
                Moduly & Pluginy
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="plugins">
              <ul class="nav">
                <li>
                  <a href="settings_modules">
                    <span class="sidebar-mini-icon">M</span>
                    <span class="sidebar-normal"> Moduly </span>
                  </a>
                </li>
                <li>
                  <a href="plugins">
                    <span class="sidebar-mini-icon">P</span>
                    <span class="sidebar-normal"> Pluginy </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li {getactivemenuitem string="cases.php"} {getactivemenuitem string="createcase.php"} {getactivemenuitem string="items.php"} {getactivemenuitem string="createitem.php"} {getmodulestatus id=5}>
            <a data-toggle="collapse" href="#cases">
              <i class="fas fa-briefcase"></i>
              <p>
                Bedne
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="cases">
              <ul class="nav">
                <li>
                  <a href="cases">
                    <span class="sidebar-mini-icon">B</span>
                    <span class="sidebar-normal"> Bedne </span>
                  </a>
                </li>
                <li>
                  <a href="items">
                    <span class="sidebar-mini-icon">P</span>
                    <span class="sidebar-normal"> Predmety </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
           {foreach from=$pluginpath item=$pluginspath}
            {include file="../plugins/$pluginspath.tpl"}
          {/foreach}
          <li {getactivemenuitem string="sitesettings.php"} {getactivemenuitem string="members.php"} {getactivemenuitem string="settings_modules.php"}>
            <a data-toggle="collapse" href="#settings">
              <i class="fas fa-cogs"></i>
              <p>
                Nastavenia
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="settings">
              <ul class="nav">
                <li>
                  <a href="sitesettings">
                    <span class="sidebar-mini-icon">N</span>
                    <span class="sidebar-normal"> Nastavenie </span>
                  </a>
                </li>
                <li>
                  <a href="members">
                    <span class="sidebar-mini-icon">U</span>
                    <span class="sidebar-normal"> Užívatelia </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize d-inline">
              <button class="minimize-sidebar btn btn-link btn-just-icon" rel="tooltip" data-original-title="Sidebar toggle" data-placement="right">
                <i class="tim-icons icon-align-center visible-on-sidebar-regular"></i>
                <i class="tim-icons icon-bullet-list-67 visible-on-sidebar-mini"></i>
              </button>
            </div>
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="../user_panel/index">Back to main site</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <!--
              <li class="dropdown nav-item">
                <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="notification d-none d-lg-block d-xl-block"></div>
                  <i class="tim-icons icon-sound-wave"></i>
                  <p class="d-lg-none">
                    Notifications
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                  <li class="nav-link">
                    <a href="#" class="nav-item dropdown-item">Mike John responded to your email</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">You have 5 more tasks</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Your friend Michael is in town</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Another notification</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Another one</a>
                  </li>
                </ul>
              </li>
                -->
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="{$avataruser}" alt="Profile Photo">,
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link">
                    <a href="../user_panel/profile?id={$membercurrentID}" class="nav-item dropdown-item">Profile</a>
                  </li>
                  <li class="nav-link">
                    <a href="../user_panel/usettings" class="nav-item dropdown-item">Settings</a>
                  </li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link">
                    <a href="../user_panel/logout.php" class="nav-item dropdown-item">Log out</a>
                  </li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
