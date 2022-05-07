<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-07 10:48:10
  from '/var/www/html/igcms/custom/templates/default/tickets.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6276405a4a6d21_53507617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8e7dce083d9ae3d975cad28016db8179edb2b10' => 
    array (
      0 => '/var/www/html/igcms/custom/templates/default/tickets.tpl',
      1 => 1651913522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6276405a4a6d21_53507617 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/igcms/core/libs/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="section mt-5">
    <div class="container">
      <!-- <img src="../assets/img/shape-s.png" class="path path3"> -->
      <h2 class="title">Tickety</h2>
      <div class="row flex-row">
        <div class="col-lg-12">
          <div class="card card-plain">

              <div class="card-header d-inline-block">
                <div class="row">
                  <div class="card  card-plain">
                    <div class="card-header">
                     <div class="tools float-right">
                       <div class="dropdown">
                         <a href="createticket">Vytvoriť Ticket</a>
                       </div>
                     </div>
                     <h4 class="card-title">Skupiny</h4>
                   </div>
                   <div class="card-body">
                     <div class="table-responsive">
                       <table class="table tablesorter " id="">
                         <thead class="">
                           <tr>
                             <th>
                               #
                             </th>
                             <th>
                               Názov
                             </th>
                             <th>
                               Dátum
                             </th>
                             <th>
                               Posledná Úprava
                             </th>
                             <th>
                               Stav
                             </th>
                             <th>
                               Kategória
                             </th>
                             <th class="text-right">
                               Actions
                             </th>
                           </tr>
                         </thead>
                         <tbody>
                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tickets']->value, 'ticket');
$_smarty_tpl->tpl_vars['ticket']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ticket']->value) {
$_smarty_tpl->tpl_vars['ticket']->do_else = false;
?>
                           <tr>
                             <td>
                               <?php echo $_smarty_tpl->tpl_vars['ticket']->value["id"];?>

                             </td>
                             <td>
                               <?php echo $_smarty_tpl->tpl_vars['ticket']->value["title"];?>

                             </td>
                             <td>
                               <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ticket']->value["date"],"%d.%m.%Y %H:%M");?>

                             </td>
                             <td>
                               <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ticket']->value["editdate"],"%d.%m.%Y %H:%M");?>

                             </td>
                             <td>
                              <?php echo $_smarty_tpl->tpl_vars['ticket']->value["statustitle"];?>

                             </td>
                             <td>
                              <?php echo $_smarty_tpl->tpl_vars['ticket']->value["name"];?>

                             </td>
                             <td class="text-right">
                               <a href="viewticket?id=<?php echo $_smarty_tpl->tpl_vars['ticket']->value['id'];?>
"><button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                                 <i class="tim-icons icon-settings"></i>
                               </button></a>
                             </td>
                           </tr>
                           <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
