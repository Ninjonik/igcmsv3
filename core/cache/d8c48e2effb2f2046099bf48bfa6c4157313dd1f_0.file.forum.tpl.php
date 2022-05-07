<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-07 10:51:56
  from '/var/www/html/igcms/custom/templates/default/forum.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6276413c7ddf06_84566556',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8c48e2effb2f2046099bf48bfa6c4157313dd1f' => 
    array (
      0 => '/var/www/html/igcms/custom/templates/default/forum.tpl',
      1 => 1651917063,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6276413c7ddf06_84566556 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/igcms/core/libs/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'/var/www/html/igcms/core/libs/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="wrapper">
    <div class="page-header page-header-small header-filter">
      <div class="page-header-image" data-parallax="true" style="background-image: url('../../uploads/backgrounds/<?php echo $_smarty_tpl->tpl_vars['siteinfo']->value["background"];?>
');">
      </div>
      <div class="content-center">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto text-center">
            <h1 class="title">
      				Fórum
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
                <div class="col-md-12">
                    <div class="card mb-3">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'categories2');
$_smarty_tpl->tpl_vars['categories2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categories2']->value) {
$_smarty_tpl->tpl_vars['categories2']->do_else = false;
?>
                        <div class="card-header pr-0 pl-0">
                            <div class="row no-gutters align-items-center w-100">
                                <div class="col font-weight-bold pl-3"><?php echo $_smarty_tpl->tpl_vars['categories2']->value["title"];?>
</div>
                                <div class="d-none d-md-block col-6 text-muted">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-3">Threads</div>
                                        <div class="col-3">Replies</div>
                                        <div class="col-6">Last update</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['forums']->value, 'forums2');
$_smarty_tpl->tpl_vars['forums2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['forums2']->value) {
$_smarty_tpl->tpl_vars['forums2']->do_else = false;
?>
                            <?php if ($_smarty_tpl->tpl_vars['categories2']->value["id"] == $_smarty_tpl->tpl_vars['forums2']->value["parent"]) {?>
                            <div class="card-body py-3">
                                <div class="row no-gutters align-items-center">
                                    <div class="col"><a href="viewforum?id=<?php echo $_smarty_tpl->tpl_vars['forums2']->value['id'];?>
" class="text-big font-weight-semibold" data-abc="true"><?php echo $_smarty_tpl->tpl_vars['forums2']->value["title"];?>
</a></div>
                                    <div class="d-none d-md-block col-6">
                                        <div class="row no-gutters align-items-center">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['threadscount']->value, 'thrcou');
$_smarty_tpl->tpl_vars['thrcou']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['thrcou']->value) {
$_smarty_tpl->tpl_vars['thrcou']->do_else = false;
?>
                                              <?php if ($_smarty_tpl->tpl_vars['forums2']->value["id"] == $_smarty_tpl->tpl_vars['thrcou']->value["threadforumID"]) {?>
                                                <div class="col-3">
                                                  <?php echo $_smarty_tpl->tpl_vars['thrcou']->value["threadscount"];?>

                                                </div>
                                              <?php }?>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['postscount']->value, 'pocou');
$_smarty_tpl->tpl_vars['pocou']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pocou']->value) {
$_smarty_tpl->tpl_vars['pocou']->do_else = false;
?>
                                              <?php if ($_smarty_tpl->tpl_vars['forums2']->value["id"] == $_smarty_tpl->tpl_vars['pocou']->value["forumID"]) {?>
                                                <div class="col-3">
                                                  <?php echo $_smarty_tpl->tpl_vars['pocou']->value["postscount"];?>

                                                </div>
                                              <?php }?>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lastupdate']->value, 'lastupd');
$_smarty_tpl->tpl_vars['lastupd']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lastupd']->value) {
$_smarty_tpl->tpl_vars['lastupd']->do_else = false;
?>
                                          <?php if ($_smarty_tpl->tpl_vars['forums2']->value["id"] == $_smarty_tpl->tpl_vars['lastupd']->value["forumID"]) {?>
                                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lastupdate2']->value, 'lastupd2');
$_smarty_tpl->tpl_vars['lastupd2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lastupd2']->value) {
$_smarty_tpl->tpl_vars['lastupd2']->do_else = false;
?>
                                            <?php if ($_smarty_tpl->tpl_vars['lastupd']->value["editcomID"] == $_smarty_tpl->tpl_vars['lastupd2']->value["id"]) {?>
                                              <div class="media col-6 align-items-center"> <img src="<?php echo $_smarty_tpl->tpl_vars['lastupd2']->value['avatar'];?>
" alt="" class="d-block ui-w-30 rounded-circle">
                                                  <div class="media-body flex-truncate ml-2"> <a href="viewtopic?id=<?php echo $_smarty_tpl->tpl_vars['lastupd']->value['id'];?>
" class="d-block text-truncate" data-abc="true"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['lastupd2']->value["desc"],15);?>
</a>
                                                      <div class="text-muted small text-truncate"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['lastupd2']->value["time"],"%d.%m.%Y %H:%M");?>
 &nbsp;·&nbsp; <a href="profile?id=<?php echo $_smarty_tpl->tpl_vars['lastupd2']->value['userID'];?>
" class="text-muted" data-abc="true"><?php echo $_smarty_tpl->tpl_vars['lastupd2']->value["username"];?>
</a></div>
                                                  </div>
                                              </div>
                                            <?php }?>
                                          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                          <?php }?>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
