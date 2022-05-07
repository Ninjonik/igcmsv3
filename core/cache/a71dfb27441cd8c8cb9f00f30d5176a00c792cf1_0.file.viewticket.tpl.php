<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-07 10:48:12
  from '/var/www/html/igcms/custom/templates/default/viewticket.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6276405c698791_44417340',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a71dfb27441cd8c8cb9f00f30d5176a00c792cf1' => 
    array (
      0 => '/var/www/html/igcms/custom/templates/default/viewticket.tpl',
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
function content_6276405c698791_44417340 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/igcms/core/libs/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="section mt-5">
    <div class="container">
      <!-- <img src="../assets/img/shape-s.png" class="path path3"> -->
      <h2 class="title"><?php echo $_smarty_tpl->tpl_vars['ticket']->value["title"];?>
</h2>
      <div class="row flex-row">
        <div class="col-lg-12">
          <div class="card card-plain">

              <div class="card-header d-inline-block">
                <div class="row">
                  <div class="card  card-plain">
                   <div class="card-header">
                     <h4 class="card-title"></h4>
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
                           </tr>
                         </thead>
                         <tbody>
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
                             <td >
                              <?php echo $_smarty_tpl->tpl_vars['status']->value;?>

                             </td>
                             <td>
                              <?php echo $_smarty_tpl->tpl_vars['catname']->value;?>

                             </td>
                           </tr>
                         </tbody>
                       </table>
                     </div>
                   </div>
               </div>
                </div>
              </div>

            <div class="card-body">
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rowcom']->value, 'rowcoms');
$_smarty_tpl->tpl_vars['rowcoms']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['rowcoms']->value) {
$_smarty_tpl->tpl_vars['rowcoms']->do_else = false;
?>
                <?php if ($_smarty_tpl->tpl_vars['rowcoms']->value["type"] == 0) {?>
                <div class="row justify-content-end text-right">
                  <div class="col-auto">
                    <div class="card bg-primary text-white">
                      <div class="card-body p-2">
                        <p class="mb-1">
                          <?php echo $_smarty_tpl->tpl_vars['rowcoms']->value["desc"];?>

                        </p>
                        <div>
                          <?php echo $_smarty_tpl->tpl_vars['rowcoms']->value["username"];?>
 <small class="opacity-60"><i class="far fa-clock"></i> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['rowcoms']->value["time"],"%d.%m.%Y %H:%M");?>
</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } else { ?>
                <div class="row justify-content-start">
                  <div class="col-auto">
                    <div class="card ">
                      <div class="card-body p-2">
                        <p class="mb-1">
                            <?php echo $_smarty_tpl->tpl_vars['rowcoms']->value["desc"];?>

                        </p>
                        <div>
                          <?php echo $_smarty_tpl->tpl_vars['rowcoms']->value["username"];?>
 <small class="opacity-60"><i class="far fa-clock"></i> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['rowcoms']->value["time"],"%d.%m.%Y %H:%M");?>
</small>
                          <i class="tim-icons icon-check-2"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php }?>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <div class="card-footer d-block">
              <form class="align-items-center" method="post">
                <div class="input-group d-flex">
                  <div class="input-group-prepend d-flex">
                    <span class="input-group-text"><i class="tim-icons icon-pencil"></i></span>
                  </div>
                  <input type="text" name="desc" class="form-control form-control-lg" placeholder="Your message">
                  <button class="btn btn-simple btn-primary ml-2" type="submit" name="submit">
                    <i class="tim-icons icon-send"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
