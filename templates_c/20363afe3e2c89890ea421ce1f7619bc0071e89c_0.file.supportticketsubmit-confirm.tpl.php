<?php
/* Smarty version 3.1.36, created on 2022-04-17 07:07:44
  from 'C:\xampp7.4\htdocs\whmcs-8\templates\twenty-one\supportticketsubmit-confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_625ba0a09a6102_01776257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20363afe3e2c89890ea421ce1f7619bc0071e89c' => 
    array (
      0 => 'C:\\xampp7.4\\htdocs\\whmcs-8\\templates\\twenty-one\\supportticketsubmit-confirm.tpl',
      1 => 1650097687,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_625ba0a09a6102_01776257 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
    <div class="card-body extra-padding">

        <h3 class="card-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"createNewSupportRequest"),$_smarty_tpl ) );?>
</h3>

        <div class="alert alert-success text-center">
            <strong>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'supportticketsticketcreated'),$_smarty_tpl ) );?>

                <a id="ticket-number" href="viewticket.php?tid=<?php echo $_smarty_tpl->tpl_vars['tid']->value;?>
&amp;c=<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
" class="alert-link">#<?php echo $_smarty_tpl->tpl_vars['tid']->value;?>
</a>
            </strong>
        </div>

        <div class="row">
            <div class="col-10 offset-1">
                <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'supportticketsticketcreateddesc'),$_smarty_tpl ) );?>
</p>
            </div>
        </div>

        <br />

        <p class="text-center">
            <a href="viewticket.php?tid=<?php echo $_smarty_tpl->tpl_vars['tid']->value;?>
&amp;c=<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
" class="btn btn-default">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'continue'),$_smarty_tpl ) );?>

                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </p>

    </div>
</div>
<?php }
}
