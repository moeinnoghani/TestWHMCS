<?php
/* Smarty version 3.1.36, created on 2022-04-17 07:06:59
  from 'C:\xampp7.4\htdocs\whmcs-8\templates\twenty-one\supportticketsubmit-stepone.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_625ba073c65f98_52075056',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3419e0abcf9ceca585276037b6317cdbe3f454f' => 
    array (
      0 => 'C:\\xampp7.4\\htdocs\\whmcs-8\\templates\\twenty-one\\supportticketsubmit-stepone.tpl',
      1 => 1650097687,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_625ba073c65f98_52075056 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
    <div class="card-body extra-padding">

        <div class="mb-4">
            <h3 class="card-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"createNewSupportRequest"),$_smarty_tpl ) );?>
</h3>
            <p class="text-muted mb-0"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'supportticketsheader'),$_smarty_tpl ) );?>
</p>
        </div>

        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['departments']->value, 'department', false, 'num');
$_smarty_tpl->tpl_vars['department']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['department']->value) {
$_smarty_tpl->tpl_vars['department']->do_else = false;
?>
                    <p class="h5">
                        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?step=2&amp;deptid=<?php echo $_smarty_tpl->tpl_vars['department']->value['id'];?>
">
                            <i class="fas fa-envelope"></i>
                            &nbsp;<?php echo $_smarty_tpl->tpl_vars['department']->value['name'];?>

                        </a>
                    </p>
                    <?php if ($_smarty_tpl->tpl_vars['department']->value['description']) {?>
                        <p class="text-muted"><?php echo $_smarty_tpl->tpl_vars['department']->value['description'];?>
</p>
                    <?php }?>
                <?php
}
if ($_smarty_tpl->tpl_vars['department']->do_else) {
?>
                    <?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'nosupportdepartments'),$_smarty_tpl ) );
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>$_prefixVariable1,'textcenter'=>true), 0, true);
?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>

    </div>
</div>
<?php }
}
