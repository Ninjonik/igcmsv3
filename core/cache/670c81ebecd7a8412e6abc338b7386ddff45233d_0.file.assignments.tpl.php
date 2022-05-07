<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-07 10:39:55
  from '/var/www/html/igcms/custom/panel_templates/default/assignments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62763e6b54f9d5_67664125',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '670c81ebecd7a8412e6abc338b7386ddff45233d' => 
    array (
      0 => '/var/www/html/igcms/custom/panel_templates/default/assignments.tpl',
      1 => 1651913497,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_62763e6b54f9d5_67664125 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/igcms/core/libs/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'/var/www/html/igcms/core/libs/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="tools float-right">
                  <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle btn-link btn-icon" data-toggle="dropdown">
                      <i class="tim-icons icon-settings-gear-63"></i>
                    </button>
                    <a href="createassignment">Vytvoriť zadanie</a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#">Niečo</a>
                    </div>
                  </div>
                </div>
                <h4 class="card-title">Zadania</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="table" class="display">
                    <thead class="text-primary">
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Názov
                        </th>
                        <th>
                          Vytvorené
                        </th>
                        <th>
                          Deadline
                        </th>
                        <th>
                          Farba
                        </th>
                        <th>
                          Priorita
                        </th>
                        <th>
                          Akcie
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['assignments']->value, 'assignments2');
$_smarty_tpl->tpl_vars['assignments2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['assignments2']->value) {
$_smarty_tpl->tpl_vars['assignments2']->do_else = false;
?>
                      <tr>
                        <td>
                          <?php echo $_smarty_tpl->tpl_vars['assignments2']->value["id"];?>

                        </td>
                        <td>
                          <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['assignments2']->value["title"],80);?>

                        </td>
                        <td>
                          <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['assignments2']->value["time"],"%d.%m.%Y %H:%M");?>

                        </td>
                        <td>
                          <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['assignments2']->value["deadline"],"%d.%m.%Y %H:%M");?>

                        </td>
                        <td>
                          <?php echo $_smarty_tpl->tpl_vars['assignments2']->value["colour"];?>

                        </td>
                        <td>
                          <?php echo $_smarty_tpl->tpl_vars['assignments2']->value["status"];?>

                        </td>
                        <td>
                          <a href="viewassignment?id=<?php echo $_smarty_tpl->tpl_vars['assignments2']->value['id'];?>
"><button type="button" rel="tooltip" class="btn btn-success btn-link btn-sm btn-icon " data-original-title="Tooltip on top" title="Zobraziť">
                            <i class="tim-icons icon-pencil"></i>
                          </button></a>
                          <a href="action.php?action=deleteassignment&id=<?php echo $_smarty_tpl->tpl_vars['assignments2']->value['id'];?>
&route=assignments?action=assignmentsuccessfullydeleted"><button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm " data-original-title="Tooltip on top" title="Zmazať">
                            <i class="tim-icons icon-simple-remove"></i></a>
                          </button>
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
