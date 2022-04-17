<?php
/* Smarty version 3.1.36, created on 2022-04-17 07:07:03
  from 'C:\xampp7.4\htdocs\whmcs-8\templates\twenty-one\supportticketsubmit-customfields.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_625ba077e32846_76714311',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84258a6784433719710b333e07d777b6c22f8b38' => 
    array (
      0 => 'C:\\xampp7.4\\htdocs\\whmcs-8\\templates\\twenty-one\\supportticketsubmit-customfields.tpl',
      1 => 1650097687,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_625ba077e32846_76714311 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customfields']->value, 'customfield');
$_smarty_tpl->tpl_vars['customfield']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['customfield']->value) {
$_smarty_tpl->tpl_vars['customfield']->do_else = false;
?>
    <div class="form-group">
        <label for="customfield<?php echo $_smarty_tpl->tpl_vars['customfield']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['customfield']->value['name'];?>
</label>
        <?php echo $_smarty_tpl->tpl_vars['customfield']->value['input'];?>

        <?php if ($_smarty_tpl->tpl_vars['customfield']->value['description']) {?>
            <p class="form-text text-muted"><?php echo $_smarty_tpl->tpl_vars['customfield']->value['description'];?>
</p>
        <?php }?>
    </div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
