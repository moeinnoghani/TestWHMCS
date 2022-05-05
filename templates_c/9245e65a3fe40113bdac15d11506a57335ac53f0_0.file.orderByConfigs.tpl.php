<?php
/* Smarty version 3.1.36, created on 2022-04-25 13:06:46
  from 'C:\xampp7.4\htdocs\whmcs-8\modules\addons\orderByConfigs\Views\orderByConfigs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_626680c65577b0_77378267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9245e65a3fe40113bdac15d11506a57335ac53f0' => 
    array (
      0 => 'C:\\xampp7.4\\htdocs\\whmcs-8\\modules\\addons\\orderByConfigs\\Views\\orderByConfigs.tpl',
      1 => 1650884804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_626680c65577b0_77378267 (Smarty_Internal_Template $_smarty_tpl) {
?><div>


    <?php if (!(isset($_smarty_tpl->tpl_vars['operatingSystems']->value))) {?>

    <form method="post" action="#">
        <select class=btn btn-default dropdown-toggle stylebackground: #b4dbed;font-size: 20px name=region
                id=inlineFormCustomSelect>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['regions']->value, 'region');
$_smarty_tpl->tpl_vars['region']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['region']->value) {
$_smarty_tpl->tpl_vars['region']->do_else = false;
?>
                <option class=none value=<?php echo $_smarty_tpl->tpl_vars['region']->value;?>
> <?php echo $_smarty_tpl->tpl_vars['region']->value;?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
        <input name="step1" type="submit" value="next" style="width: 100px;font-size: larger">
    </form>
</div>
<?php }?>


<?php if ((isset($_smarty_tpl->tpl_vars['operatingSystems']->value))) {?>
    <label>Choose Hard Disk</label>
    <form method="post" action="#">
        <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['operatingSystems']->value, 'os');
$_smarty_tpl->tpl_vars['os']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['os']->value) {
$_smarty_tpl->tpl_vars['os']->do_else = false;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['os']->value;?>
</li>
                <label>
                    <input name="HDD" type="radio" value="<?php echo $_smarty_tpl->tpl_vars['os']->value;?>
">
                </label>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
        <input name="step2" type="submit" value="Next">
    </form>
<?php }?>

<?php }
}
