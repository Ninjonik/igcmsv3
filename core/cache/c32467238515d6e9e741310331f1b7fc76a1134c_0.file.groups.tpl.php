<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-07 10:41:27
  from '/var/www/html/igcms/custom/panel_templates/default/groups.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62763ec749a9a5_87333236',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c32467238515d6e9e741310331f1b7fc76a1134c' => 
    array (
      0 => '/var/www/html/igcms/custom/panel_templates/default/groups.tpl',
      1 => 1651913496,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_62763ec749a9a5_87333236 (Smarty_Internal_Template $_smarty_tpl) {
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
                    <a href="creategroup">Vytvoriť skupinu</a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#">Niečo</a>
                    </div>
                  </div>
                </div>
                <h4 class="card-title">Skupiny</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="text-primary">
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Názov
                        </th>
                        <th>
                          Farba
                        </th>
                        <th>
                          Akcie
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'groups2');
$_smarty_tpl->tpl_vars['groups2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['groups2']->value) {
$_smarty_tpl->tpl_vars['groups2']->do_else = false;
?>
                      <tr>
                        <td>
                          <?php echo $_smarty_tpl->tpl_vars['groups2']->value["id"];?>

                        </td>
                        <td>
                          <?php echo $_smarty_tpl->tpl_vars['groups2']->value["title"];?>

                        </td>
                        <td>
                          <?php echo $_smarty_tpl->tpl_vars['groups2']->value["colour"];?>

                        </td>
                        <td>
                          <a href="editgroup?id=<?php echo $_smarty_tpl->tpl_vars['groups2']->value['id'];?>
"><button type="button" rel="tooltip" class="btn btn-success btn-link btn-sm btn-icon " data-original-title="Tooltip on top" title="Upraviť">
                            <i class="tim-icons icon-pencil"></i>
                          </button></a>
                          <a href="action.php?action=deletegroup&id=<?php echo $_smarty_tpl->tpl_vars['groups2']->value['id'];?>
&route=groups?action=groupdeleted"><button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm " data-original-title="Tooltip on top" title="Zmazať">
                            <i class="tim-icons icon-simple-remove"></i>
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
      </div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
