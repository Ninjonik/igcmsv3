<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-07 10:48:04
  from '/var/www/html/igcms/custom/panel_templates/default/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_627640543d5570_47092615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5560e24781de220e1fe8d28361d24464ec15f5e5' => 
    array (
      0 => '/var/www/html/igcms/custom/panel_templates/default/header.tpl',
      1 => 1651916883,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../plugins/".((string)$_smarty_tpl->tpl_vars[\'pluginspath\']->value).".tpl' => 1,
  ),
),false)) {
function content_627640543d5570_47092615 (Smarty_Internal_Template $_smarty_tpl) {
?><!--
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
    <?php echo $_smarty_tpl->tpl_vars['siteTitle']->value;?>

  </title>
  <!--     Fonts and icons     -->

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <?php echo '<script'; ?>
 src="https://kit.fontawesome.com/8fe68ee7cd.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <link href="../../../../use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../../custom/panel_templates/default/assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../../custom/panel_templates/default/assets/css/black-dashboard.min3f71.css?v=1.1.1" rel="stylesheet" />

  <?php echo '<script'; ?>
 src="../../custom/panel_templates/default/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../../custom/panel_templates/default/assets/chartjs/chart.js"><?php echo '</script'; ?>
>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <?php echo '<script'; ?>
 type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
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
            <?php echo $_smarty_tpl->tpl_vars['siteTitle']->value;?>

          </a>
        </div>
        <ul class="nav">
          <li <?php echo smarty_function_getactivemenuitem(array('string'=>"index.php"),$_smarty_tpl);?>
>
            <a href="index">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Nástenka</p>
            </a>
          </li>
          <li <?php echo smarty_function_getactivemenuitem(array('string'=>"groups.php"),$_smarty_tpl);?>
 <?php echo smarty_function_getactivemenuitem(array('string'=>"creategroup.php"),$_smarty_tpl);?>
>
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

          <li <?php echo smarty_function_getactivemenuitem(array('string'=>"cats.php"),$_smarty_tpl);?>
 <?php echo smarty_function_getactivemenuitem(array('string'=>"createcat.php"),$_smarty_tpl);?>
>
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
          <li <?php echo smarty_function_getactivemenuitem(array('string'=>"pages.php"),$_smarty_tpl);?>
 <?php echo smarty_function_getactivemenuitem(array('string'=>"createpage.php"),$_smarty_tpl);?>
 <?php echo smarty_function_getactivemenuitem(array('string'=>"editpage.php"),$_smarty_tpl);?>
>
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
          <li <?php echo smarty_function_getactivemenuitem(array('string'=>"assignments.php"),$_smarty_tpl);?>
 <?php echo smarty_function_getactivemenuitem(array('string'=>"createassignment.php"),$_smarty_tpl);?>
 <?php echo smarty_function_getactivemenuitem(array('string'=>"myassignments.php"),$_smarty_tpl);?>
>
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
          <li <?php echo smarty_function_getactivemenuitem(array('string'=>"forums.php"),$_smarty_tpl);?>
 <?php echo smarty_function_getactivemenuitem(array('string'=>"createforum.php"),$_smarty_tpl);?>
>
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
          <li <?php echo smarty_function_getactivemenuitem(array('string'=>"plugins.php"),$_smarty_tpl);?>
>
            <a href="plugins">
              <i class="tim-icons icon-puzzle-10"></i>
              <p>Pluginy</p>
            </a>
          </li>
          <li <?php echo smarty_function_getactivemenuitem(array('string'=>"cases.php"),$_smarty_tpl);?>
 <?php echo smarty_function_getactivemenuitem(array('string'=>"createcase.php"),$_smarty_tpl);?>
 <?php echo smarty_function_getactivemenuitem(array('string'=>"items.php"),$_smarty_tpl);?>
 <?php echo smarty_function_getactivemenuitem(array('string'=>"createitem.php"),$_smarty_tpl);?>
>
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
           <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pluginpath']->value, 'pluginspath');
$_smarty_tpl->tpl_vars['pluginspath']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pluginspath']->value) {
$_smarty_tpl->tpl_vars['pluginspath']->do_else = false;
?>
            <?php $_smarty_tpl->_subTemplateRender("file:../plugins/".((string)$_smarty_tpl->tpl_vars['pluginspath']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          <li <?php echo smarty_function_getactivemenuitem(array('string'=>"sitesettings.php"),$_smarty_tpl);?>
 <?php echo smarty_function_getactivemenuitem(array('string'=>"members.php"),$_smarty_tpl);?>
>
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
                    <img src="<?php echo $_smarty_tpl->tpl_vars['avataruser']->value;?>
" alt="Profile Photo">,
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link">
                    <a href="../user_panel/profile?id=<?php echo $_smarty_tpl->tpl_vars['membercurrentID']->value;?>
" class="nav-item dropdown-item">Profile</a>
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
<?php }
}
