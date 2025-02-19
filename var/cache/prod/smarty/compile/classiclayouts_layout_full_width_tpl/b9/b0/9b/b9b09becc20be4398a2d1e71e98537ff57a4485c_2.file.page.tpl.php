<?php
/* Smarty version 4.3.4, created on 2025-02-18 14:58:19
  from '/Applications/MAMP/htdocs/TiendaAbel/themes/classic/templates/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67b491fb2cb312_90040064',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9b09becc20be4398a2d1e71e98537ff57a4485c' => 
    array (
      0 => '/Applications/MAMP/htdocs/TiendaAbel/themes/classic/templates/page.tpl',
      1 => 1697815446,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67b491fb2cb312_90040064 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_38255567067b491fb2bf938_98391591', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_118482321767b491fb2c1829_84825975 extends Smarty_Internal_Block
{
public $callsChild = 'true';
public $hide = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <header class="page-header">
          <h1><?php 
$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this);
?>
</h1>
        </header>
      <?php
}
}
/* {/block 'page_title'} */
/* {block 'page_header_container'} */
class Block_75486377167b491fb2c0717_93454070 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_118482321767b491fb2c1829_84825975', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_55931258867b491fb2c59f7_42988489 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_2516228567b491fb2c6c92_70900763 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_123950382867b491fb2c4df2_75233992 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <div id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_55931258867b491fb2c59f7_42988489', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2516228567b491fb2c6c92_70900763', 'page_content', $this->tplIndex);
?>

      </div>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_24576230767b491fb2c9362_65701274 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_206901833567b491fb2c86e9_18371172 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_24576230767b491fb2c9362_65701274', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_38255567067b491fb2bf938_98391591 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_38255567067b491fb2bf938_98391591',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_75486377167b491fb2c0717_93454070',
  ),
  'page_title' => 
  array (
    0 => 'Block_118482321767b491fb2c1829_84825975',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_123950382867b491fb2c4df2_75233992',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_55931258867b491fb2c59f7_42988489',
  ),
  'page_content' => 
  array (
    0 => 'Block_2516228567b491fb2c6c92_70900763',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_206901833567b491fb2c86e9_18371172',
  ),
  'page_footer' => 
  array (
    0 => 'Block_24576230767b491fb2c9362_65701274',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_75486377167b491fb2c0717_93454070', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_123950382867b491fb2c4df2_75233992', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_206901833567b491fb2c86e9_18371172', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}
