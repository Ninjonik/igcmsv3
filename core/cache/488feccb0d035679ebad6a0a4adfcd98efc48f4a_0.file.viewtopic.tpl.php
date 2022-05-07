<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-07 10:57:41
  from '/var/www/html/igcms/custom/templates/default/viewtopic.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62764295b6ca07_80645083',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '488feccb0d035679ebad6a0a4adfcd98efc48f4a' => 
    array (
      0 => '/var/www/html/igcms/custom/templates/default/viewtopic.tpl',
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
function content_62764295b6ca07_80645083 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/igcms/core/libs/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
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
               Fórum - <?php echo $_smarty_tpl->tpl_vars['topicinfo']->value["title"];?>

            </h1>
         </div>
      </div>
   </div>
</div>
<div class="main main-raised">
<div class="container">
   <div class="container-fluid mt-100">
      <div class="row">
        <a href="forum">Fórum</a> &nbsp; / &nbsp;<a href="viewforum?id=<?php echo $_smarty_tpl->tpl_vars['topicinfo']->value['forumID'];?>
"><?php echo $_smarty_tpl->tpl_vars['topicinfo']->value["titleforum"];?>
</a>&nbsp; / &nbsp;<?php echo $_smarty_tpl->tpl_vars['topicinfo']->value["title"];?>

         <div class="col-md-12">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rowcom']->value, 'rowcoms');
$_smarty_tpl->tpl_vars['rowcoms']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['rowcoms']->value) {
$_smarty_tpl->tpl_vars['rowcoms']->do_else = false;
?>
            <div class="card mb-4" id="com<?php echo $_smarty_tpl->tpl_vars['rowcoms']->value['id'];?>
">
               <div class="card-header">
                  <div class="media flex-wrap w-100 align-items-center">
                     <img src="<?php echo $_smarty_tpl->tpl_vars['rowcoms']->value['avatar'];?>
" class="d-block ui-w-40 rounded-circle" alt="<?php echo $_smarty_tpl->tpl_vars['rowcoms']->value['username'];?>
">
                     <div class="media-body ml-3">
                        <a href="profile?id=<?php echo $_smarty_tpl->tpl_vars['rowcoms']->value['userID'];?>
" data-abc="true"><?php echo $_smarty_tpl->tpl_vars['rowcoms']->value['html']["html"];?>
 <?php echo $_smarty_tpl->tpl_vars['rowcoms']->value["username"];?>
</a>
                        <div class="text-muted small"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['rowcoms']->value["time"],"%d.%m.%Y %H:%M");?>
</div>
                     </div>
                     <div class="text-muted small ml-3">
                        <div>Member since <strong><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['rowcoms']->value["joinTime"],"%d.%m.%Y %H:%M");?>
</strong></div>
                        <!--<div><strong>134</strong> posts</div>-->
                     </div>
                  </div>
               </div>
               <div class="card-body">
                 <?php echo $_smarty_tpl->tpl_vars['rowcoms']->value["quotefinal"];?>

                  <p><?php echo $_smarty_tpl->tpl_vars['rowcoms']->value["desc"];?>
</p>
                  <div class="media-footer">
                    <a href="viewtopic?id=<?php echo $_smarty_tpl->tpl_vars['getID']->value;?>
&quote=<?php echo $_smarty_tpl->tpl_vars['rowcoms']->value['id'];?>
" class="btn btn-primary btn-simple btn-sm pull-right" rel="tooltip" title="Reply to Comment">
                      <i class="tim-icons icon-send"></i> Reply
                    </a>
                    <a href="#" class="btn btn-danger btn-simple btn-sm pull-right">
                      <i class="tim-icons icon-heart-2"></i> <?php echo $_smarty_tpl->tpl_vars['rowcoms']->value["review"];?>

                    </a>
                    <a href="actions?action=likenttc&type=unlike&id=<?php echo $_smarty_tpl->tpl_vars['rowcoms']->value['id'];?>
&targetID=<?php echo $_smarty_tpl->tpl_vars['getID']->value;?>
&secondaryroute=com<?php echo $_smarty_tpl->tpl_vars['rowcoms']->value['id'];?>
" class="btn btn-danger btn-simple btn-sm pull-right"><i class="fas fa-thumbs-down"></i></a>
                    <a href="actions?action=likenttc&type=like&id=<?php echo $_smarty_tpl->tpl_vars['rowcoms']->value['id'];?>
&targetID=<?php echo $_smarty_tpl->tpl_vars['getID']->value;?>
&secondaryroute=com<?php echo $_smarty_tpl->tpl_vars['rowcoms']->value['id'];?>
" class="btn btn-danger btn-simple btn-sm pull-right"><i class="far fa-thumbs-up"></i></a>
                  </div>
               </div>
             </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <form method="post">
            <div class="card mb-4">
               <div class="card-header">
                  <div class="media flex-wrap w-100 align-items-center">
                     <img src="<?php echo $_smarty_tpl->tpl_vars['avataruser']->value;?>
" class="d-block ui-w-40 rounded-circle" alt="">
                  </div>
               </div>
               <div class="card-body">
                  <p>

                    <textarea class="form-control" rows="4" id="editor1" name="desc"><?php echo $_smarty_tpl->tpl_vars['quote']->value;?>
</textarea>
                    <?php echo '<script'; ?>
>
                        // Replace the <textarea id="editor1"> with a CKEditor 4
                        // instance, using default configuration.
                        CKEDITOR.replace( 'editor1', {
                          skin: 'prestige'
                        } );
                    <?php echo '</script'; ?>
>

                  </p>
                  <div class="media-footer">
                    <button class="btn btn-primary pull-right btn-simple" type="submit" name="submit"> Reply </a>
                  </div>
               </div>
             </div>
           </form>
         </div>
      </div>
   </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
