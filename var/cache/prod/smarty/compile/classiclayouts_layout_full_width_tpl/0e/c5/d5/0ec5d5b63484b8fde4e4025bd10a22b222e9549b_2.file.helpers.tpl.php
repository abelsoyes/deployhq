<?php
/* Smarty version 4.3.4, created on 2025-02-18 14:58:19
  from '/Applications/MAMP/htdocs/TiendaAbel/themes/classic/templates/_partials/helpers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67b491fb332f75_66027466',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ec5d5b63484b8fde4e4025bd10a22b222e9549b' => 
    array (
      0 => '/Applications/MAMP/htdocs/TiendaAbel/themes/classic/templates/_partials/helpers.tpl',
      1 => 1697815446,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67b491fb332f75_66027466 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'renderLogo' => 
  array (
    'compiled_filepath' => '/Applications/MAMP/htdocs/TiendaAbel/var/cache/prod/smarty/compile/classiclayouts_layout_full_width_tpl/0e/c5/d5/0ec5d5b63484b8fde4e4025bd10a22b222e9549b_2.file.helpers.tpl.php',
    'uid' => '0ec5d5b63484b8fde4e4025bd10a22b222e9549b',
    'call_name' => 'smarty_template_function_renderLogo_30912307967b491fb3261d0_60084261',
  ),
));
?> 

<?php }
/* smarty_template_function_renderLogo_30912307967b491fb3261d0_60084261 */
if (!function_exists('smarty_template_function_renderLogo_30912307967b491fb3261d0_60084261')) {
function smarty_template_function_renderLogo_30912307967b491fb3261d0_60084261(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

  <a href="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['urls']->value['pages']['index'], ENT_QUOTES, 'UTF-8');?>
">
    <img
      class="logo img-fluid"
      src="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['logo_details']['src'], ENT_QUOTES, 'UTF-8');?>
"
      alt="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
"
      width="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['logo_details']['width'], ENT_QUOTES, 'UTF-8');?>
"
      height="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['logo_details']['height'], ENT_QUOTES, 'UTF-8');?>
">
  </a>
<?php
}}
/*/ smarty_template_function_renderLogo_30912307967b491fb3261d0_60084261 */
}
