<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-21 12:25:06
  from '/var/www/html/igcms/custom/templates/default/profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6288cc127004a5_56864942',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13ccbc38bdaec9c4c8e99259101e6ce24e7dfbac' => 
    array (
      0 => '/var/www/html/igcms/custom/templates/default/profile.tpl',
      1 => 1651913523,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6288cc127004a5_56864942 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/igcms/core/libs/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <div class="wrapper">
         <div class="page-header">
            <img src="../../custom/templates/default/assets/img/dots.png" class="dots">
            <img src="../../custom/templates/default/assets/img/path4.png" class="path">
            <div class="container align-items-center">
               <div class="row">
                  <div class="col-lg-6 col-md-6">
                     <h1 class="profile-title text-left"><?php echo $_smarty_tpl->tpl_vars['profile']->value["username"];?>
</h1>
                     <h3 class="profile-title text-left"><?php echo $_smarty_tpl->tpl_vars['profile']->value["first_name"];?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value["last_name"];?>
</h3>
                     <h1 class="text-on-back">BIO</h1>
                     <p class="profile-description"><?php echo $_smarty_tpl->tpl_vars['profile']->value["descr"];?>
</p>
                  </div>
                  <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                     <div class="card card-coin card-plain">
                        <div class="card-header">
                           <img src="<?php echo $_smarty_tpl->tpl_vars['avatar']->value;?>
" class="img-center img-fluid rounded-circle">
                           <h4 class="title">Transactions</h4>
                        </div>
                        <div class="card-body">
                           <ul class="nav nav-tabs nav-tabs-primary justify-content-center">
                              <li class="nav-item">
                                 <a class="nav-link active" data-toggle="tab" href="#linka">
                                 Basic
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" data-toggle="tab" href="#linkb">
                                 Skills
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" data-toggle="tab" href="#linkc">
                                 Other
                                 </a>
                              </li>
                           </ul>
                           <div class="tab-content tab-subcategories">
                              <div class="tab-pane active" id="linka">
                                 <div class="table-responsive">
                                    <table class="table tablesorter " id="plain-table">
                                       <thead class=" text-primary">
                                          <tr>
                                             <th class="header">
                                                Location
                                             </th>
                                             <th class="header">
                                                Phone Number
                                             </th>
                                             <th class="header">
                                                Gender
                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td>
                                                <?php echo $_smarty_tpl->tpl_vars['profile']->value["location"];?>

                                             </td>
                                             <td>
                                                <?php echo $_smarty_tpl->tpl_vars['profile']->value["phone_number"];?>

                                             </td>
                                             <td>
                                                <?php if ($_smarty_tpl->tpl_vars['profile']->value["gender"] == 0) {?>
                                                    Male
                                                <?php } else { ?>
                                                    Female
                                                <?php }?>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                              <div class="tab-pane" id="linkb">
                                 <?php echo $_smarty_tpl->tpl_vars['profile']->value["skills"];?>

                              </div>
                              <div class="tab-pane" id="linkc">
                                 <div class="table-responsive">
                                   <div class="table-responsive">
                                    <table class="table tablesorter " id="plain-table">
                                       <thead class=" text-primary">
                                          <tr>
                                             <th class="header">
                                                Join Time
                                             </th>
                                             <th class="header">
                                                Group
                                             </th>
                                             <th class="header">
                                                User's ID
                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td>
                                                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['profile']->value["joinTime"],"%d.%m.%Y %H:%M");?>

                                             </td>
                                             <td>
                                                <span class="badge badge-primary"><strong><i class="fas fa-crown"></i><?php echo $_smarty_tpl->tpl_vars['profile']->value["title"];?>
</strong></span>
                                             </td>
                                             <td>
                                                <?php echo $_smarty_tpl->tpl_vars['profile']->value["memberID"];?>

                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
