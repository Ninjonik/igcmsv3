<?php
/* Smarty version 3.1.34-dev-7, created on 2022-05-07 10:38:32
  from '/var/www/html/igcms/custom/panel_templates/plugins/ticketsystem.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62763e18874366_78331130',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6e2c93ad1ff89ae5444c821d78053e20bb129f4' => 
    array (
      0 => '/var/www/html/igcms/custom/panel_templates/plugins/ticketsystem.tpl',
      1 => 1651913522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62763e18874366_78331130 (Smarty_Internal_Template $_smarty_tpl) {
?>        <li <?php echo smarty_function_getactivemenuitem(array('string'=>"tickets.php"),$_smarty_tpl);
echo smarty_function_getactivemenuitem(array('string'=>"viewticket.php"),$_smarty_tpl);?>
>
            <a href="tickets">
              <i class="fas fa-clipboard-list"></i>
              <p>Tickety</p>
            </a>
          </li>
<?php }
}
