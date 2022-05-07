<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-07 10:48:08
  from '/var/www/html/igcms/custom/templates/default/viewpage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_627640586f1386_71211532',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd966b51ec58b236f9e820a4a992d2a7c87c2eadf' => 
    array (
      0 => '/var/www/html/igcms/custom/templates/default/viewpage.tpl',
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
function content_627640586f1386_71211532 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="wrapper">
    <div class="page-header page-header-small header-filter">
      <div class="page-header-image" data-parallax="true" style="background-image: url('../../uploads/pagebackgrounds/<?php echo $_smarty_tpl->tpl_vars['page']->value["backgroundimg"];?>
');">
      </div>
      <div class="content-center">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto text-center">
            <h1 class="title">
      				<?php echo $_smarty_tpl->tpl_vars['page']->value["title"];?>

      			</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="main main-raised">
      <div class="container">
        <div class="row">
          <div class="container-fluid mt-100">
            <div class="row">
              <?php echo $_smarty_tpl->tpl_vars['page']->value["text"];?>

            </div>
          </div>
        </div>
      </div>
    </div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
