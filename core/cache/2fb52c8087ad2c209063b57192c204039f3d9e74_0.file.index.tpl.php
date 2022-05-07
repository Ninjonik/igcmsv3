<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-07 10:47:22
  from '/var/www/html/igcms/custom/panel_templates/default/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6276402a002258_68954841',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2fb52c8087ad2c209063b57192c204039f3d9e74' => 
    array (
      0 => '/var/www/html/igcms/custom/panel_templates/default/index.tpl',
      1 => 1651916841,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6276402a002258_68954841 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/igcms/core/libs/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <div class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Posledných 7 dní</h5>
                    <h2 class="card-title">Vývoj počtu uživateľov</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <canvas id="line-chart" style="position: relative; height:20vh; width:80vw"></canvas>
                    <?php echo $_smarty_tpl->tpl_vars['chartmembers']->value;?>

              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card card-stats">
              <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <div class="info-icon text-center icon-warning">
                      <i class="far fa-newspaper"></i>
                    </div>
                  </div>
                  <div class="col-7">
                    <div class="numbers">
                      <p class="card-category">Príspevkov</p>
                      <h3 class="card-title"><?php echo $_smarty_tpl->tpl_vars['countposts']->value;?>
</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <hr>
                <div class="stats">
                  <i class="fas fa-check-square"></i>Zverejnených <?php echo $_smarty_tpl->tpl_vars['countpostsa']->value;?>

                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card card-stats">
              <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <div class="info-icon text-center icon-primary">
                      <i class="tim-icons icon-chat-33"></i>
                    </div>
                  </div>
                  <div class="col-7">
                    <div class="numbers">
                      <p class="card-category">Príspevkov na fóru</p>
                      <h3 class="card-title"><?php echo $_smarty_tpl->tpl_vars['countfposts']->value;?>
</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <hr>
                <div class="stats">
                  <i class="fas fa-quote-right"></i>Z toho citácií <?php echo $_smarty_tpl->tpl_vars['countfpostsq']->value;?>

                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card card-stats">
              <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <div class="info-icon text-center icon-success">
                      <i class="tim-icons icon-single-02"></i>
                    </div>
                  </div>
                  <div class="col-7">
                    <div class="numbers">
                      <p class="card-category">Uživatelia</p>
                      <h3 class="card-title"><?php echo $_smarty_tpl->tpl_vars['countmembers']->value;?>
</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <hr>
                <div class="stats">
                  <i class="fas fa-user-check"></i>Overených <?php echo $_smarty_tpl->tpl_vars['countmembersa']->value;?>

                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card card-stats">
              <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <div class="info-icon text-center icon-danger">
                      <i class="tim-icons icon-molecule-40"></i>
                    </div>
                  </div>
                  <div class="col-7">
                    <div class="numbers">
                      <p class="card-category">Najnovšia verzia</p>
                      <h3 class="card-title"><?php echo $_smarty_tpl->tpl_vars['jsonversion']->value;?>
</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <hr>
                <div class="stats">
                  <i class="tim-icons icon-watch-time"></i>Aktuálna nainštalovaná verzia <?php echo $_smarty_tpl->tpl_vars['assignedversion']->value;?>

                </div>
              </div>
            </div>
        </div>
          <div class="col-md-3">
            <div class="card card-tasks">
              <div class="card-header">
                <!-- <?php $_smarty_tpl->_assignInScope('counter', 0);?>  -->
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, smarty_modifier_rsort_array($_smarty_tpl->tpl_vars['assgnid']->value), 'assignments2');
$_smarty_tpl->tpl_vars['assignments2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['assignments2']->value) {
$_smarty_tpl->tpl_vars['assignments2']->do_else = false;
?>
                  <!--<?php echo $_smarty_tpl->tpl_vars['counter']->value++;?>
-->
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <h6 class="title d-inline">Zadania(<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
)</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, smarty_modifier_rsort_array($_smarty_tpl->tpl_vars['assgnid']->value), 'assignments2');
$_smarty_tpl->tpl_vars['assignments2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['assignments2']->value) {
$_smarty_tpl->tpl_vars['assignments2']->do_else = false;
?>
                      <tr>
                        <td>
                          <p class="title"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['assignments2']->value["title"],25);?>
</p>
                          <p class="text-muted full-width"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['assignments2']->value["description"],40);?>
</p>
                        </td>
                        <td class="td-actions text-right">
                          <a href="viewassignment?id=<?php echo $_smarty_tpl->tpl_vars['assignments2']->value['id'];?>
"><button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Zobraziť Zadanie">
                            <i class="tim-icons icon-pencil"></i>
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
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
