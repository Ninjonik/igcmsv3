<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-07 10:39:59
  from '/var/www/html/igcms/custom/panel_templates/default/forums.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62763e6fc35754_41173876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9525800f19a457af1e8339ded9b3471a24e8933' => 
    array (
      0 => '/var/www/html/igcms/custom/panel_templates/default/forums.tpl',
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
function content_62763e6fc35754_41173876 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="tools float-right">
                  <div class="dropdown">
                    <a href="createforum">Vytvoriť fórum</a>
                  </div>
                </div>
                <h4 class="card-title">Fóra a Kategórie</h4>
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
                          Poradie
                        </th>
                        <th>
                          # Rodiča
                        </th>
                        <th>
                          Ikona
                        </th>
                        <th>
                          Akcie
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['forums']->value, 'forums2');
$_smarty_tpl->tpl_vars['forums2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['forums2']->value) {
$_smarty_tpl->tpl_vars['forums2']->do_else = false;
?>
                      <tr>
                        <td>
                          <?php echo $_smarty_tpl->tpl_vars['forums2']->value["id"];?>

                        </td>
                        <td>
                          <?php echo $_smarty_tpl->tpl_vars['forums2']->value["title"];?>

                        </td>
                        <td>
                          <?php echo $_smarty_tpl->tpl_vars['forums2']->value["order"];?>

                        </td>
                        <td>
                          <?php echo $_smarty_tpl->tpl_vars['forums2']->value["parent"];?>

                        </td>
                        <td>
                          <?php echo $_smarty_tpl->tpl_vars['forums2']->value["icon"];?>

                        </td>
                        <td>
                          <a href="editforum?id=<?php echo $_smarty_tpl->tpl_vars['forums2']->value['id'];?>
"><button type="button" rel="tooltip" class="btn btn-success btn-link btn-sm btn-icon " data-original-title="Tooltip on top" title="Upraviť">
                            <i class="tim-icons icon-pencil"></i>
                          </button></a>
                          <a href="action.php?action=deleteforum&id=<?php echo $_smarty_tpl->tpl_vars['forums2']->value['id'];?>
&route=forums?action=forumdeleted"><button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm " data-original-title="Tooltip on top" title="Zmazať">
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
