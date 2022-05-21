<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-21 14:13:17
  from '/var/www/html/igcms/custom/panel_templates/plugins/ticketsystem.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6288e56dc6dc16_84870367',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6e2c93ad1ff89ae5444c821d78053e20bb129f4' => 
    array (
      0 => '/var/www/html/igcms/custom/panel_templates/plugins/ticketsystem.tpl',
      1 => 1653138797,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6288e56dc6dc16_84870367 (Smarty_Internal_Template $_smarty_tpl) {
?>        <li <?php echo smarty_function_getactivemenuitem(array('string'=>"tickets.php"),$_smarty_tpl);
echo smarty_function_getactivemenuitem(array('string'=>"viewticket.php"),$_smarty_tpl);?>
>
            <a href="tickets">
              <i class="tim-icons icon-puzzle-10"></i>
              <p>Tickety</p>
            </a>
          </li>
<?php }
}
