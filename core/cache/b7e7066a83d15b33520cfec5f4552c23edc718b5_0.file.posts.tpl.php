<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-07 10:48:05
  from '/var/www/html/igcms/custom/templates/default/posts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62764055d71f83_19470915',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7e7066a83d15b33520cfec5f4552c23edc718b5' => 
    array (
      0 => '/var/www/html/igcms/custom/templates/default/posts.tpl',
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
function content_62764055d71f83_19470915 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/igcms/core/libs/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['row2s']->value, 'rowsmarty2');
$_smarty_tpl->tpl_vars['rowsmarty2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['rowsmarty2']->value) {
$_smarty_tpl->tpl_vars['rowsmarty2']->do_else = false;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<div class="section">
        <div class="container">
          <div class="space-70"></div>
          <div id="contentAreas" class="cd-section">
            <div id="tables">
              <div class="row">
                    <div class="col-md-12 ml-auto mr-auto">
                      <h6>Články</h6>
                      <div class="card  card-plain">
                        <div class="card-header">
                          <h4 class="card-title"></h4>
                        </div>
                        <div class="section section-comments">
                          <div class="container">
                            <div class="row">
                              <div class="col-md-8 ml-auto mr-auto">
                                <div class="media-area">
                                  <h3 class="title text-center">Najnovšie články</h3>

                                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'posts2');
$_smarty_tpl->tpl_vars['posts2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['posts2']->value) {
$_smarty_tpl->tpl_vars['posts2']->do_else = false;
?>
                                  <p>
                                    <div class="col-md-12 ml-auto mr-auto">
                                      <div class="card card-blog card-plain blog-horizontal">
                                        <div class="row">
                                          <div class="col-lg-12">
                                            <div class="card-image">
                                              <a href="viewpost?id=<?php echo $_smarty_tpl->tpl_vars['posts2']->value['id'];?>
">
                                                <img class="img rounded" src="../../uploads/backgrounds/<?php echo $_smarty_tpl->tpl_vars['posts2']->value["background"];?>
" />
                                              </a>
                                            </div>
                                          </div>
                                          <div class="col-lg-12">
                                            <div class="card-body">
                                              <h3 class="card-title">
                                                <a href="viewpost?id=<?php echo $_smarty_tpl->tpl_vars['posts2']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['posts2']->value["title"];?>
</a>
                                              </h3>
                                              <p class="card-description">
                                                <?php echo mb_substr($_smarty_tpl->tpl_vars['posts2']->value["text"],0,300);?>
 ...
                                                <a href="viewpost?id=<?php echo $_smarty_tpl->tpl_vars['posts2']->value['id'];?>
"> Čítať viac </a>
                                              </p>
                                              <div class="author">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['posts2']->value['avataruser'];?>
" alt="..." class="avatar img-raised">
                                                <div class="text">
                                                  <span class="name"><?php echo $_smarty_tpl->tpl_vars['posts2']->value["username"];?>
</span>
                                                  <div class="meta"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['posts2']->value["editdate"],"%d.%m.%Y %H:%M");?>
</div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </p>
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
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
