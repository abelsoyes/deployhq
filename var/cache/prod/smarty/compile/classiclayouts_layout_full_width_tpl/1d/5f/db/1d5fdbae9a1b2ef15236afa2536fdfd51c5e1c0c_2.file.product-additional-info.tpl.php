<?php
/* Smarty version 4.3.4, created on 2025-02-19 07:21:18
  from '/Applications/MAMP/htdocs/TiendaAbel/themes/classic/templates/catalog/_partials/product-additional-info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67b5785e6f8c34_39586189',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d5fdbae9a1b2ef15236afa2536fdfd51c5e1c0c' => 
    array (
      0 => '/Applications/MAMP/htdocs/TiendaAbel/themes/classic/templates/catalog/_partials/product-additional-info.tpl',
      1 => 1697815446,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67b5785e6f8c34_39586189 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="product-additional-info js-product-additional-info">
  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductAdditionalInfo','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

</div>
<?php }
}
