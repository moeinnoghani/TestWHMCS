<?php
/* Smarty version 3.1.36, created on 2022-04-15 20:40:47
  from 'C:\xampp7.4\htdocs\whmcs-8\templates\twenty-one\user-password.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6259bc2fcfc2e1_72105514',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb50c61386f977cfd6adfe1152ee3fca16c4bb6f' => 
    array (
      0 => 'C:\\xampp7.4\\htdocs\\whmcs-8\\templates\\twenty-one\\user-password.tpl',
      1 => 1649276122,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6259bc2fcfc2e1_72105514 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
    <div class="card-body">
        <h3 class="card-title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'sidebars.viewAccount.changePassword'),$_smarty_tpl ) );?>
</h3>

        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/flashmessage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        <form class="using-password-strength" method="post" action="<?php echo routePath('user-password');?>
" role="form">
            <input type="hidden" name="submit" value="true" />
            <div class="form-group row">
                <label for="inputExistingPassword" class="col-xl-4 col-form-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'existingpassword'),$_smarty_tpl ) );?>
</label>
                <div class="col-xl-5">
                    <input type="password" class="form-control" name="existingpw" id="inputExistingPassword" autocomplete="off" />
                </div>
            </div>
            <div id="newPassword1" class="form-group has-feedback row">
                <label for="inputNewPassword1" class="col-xl-4 col-form-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'newpassword'),$_smarty_tpl ) );?>
</label>
                <div class="col-xl-5">
                    <input type="password" class="form-control" name="newpw" id="inputNewPassword1" autocomplete="off" />
                    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pwstrength.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                </div>
                <div class="col-xl-3">
                    <button type="button" class="btn btn-default btn-block generate-password" data-targetfields="inputNewPassword1,inputNewPassword2">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'generatePassword.btnLabel'),$_smarty_tpl ) );?>

                    </button>
                </div>
            </div>
            <div id="newPassword2" class="form-group has-feedback row">
                <label for="inputNewPassword2" class="col-xl-4 col-form-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'confirmnewpassword'),$_smarty_tpl ) );?>
</label>
                <div class="col-xl-5">
                    <input type="password" class="form-control" name="confirmpw" id="inputNewPassword2" autocomplete="off" />
                    <div id="inputNewPassword2Msg"></div>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'clientareasavechanges'),$_smarty_tpl ) );?>
" />
            <input class="btn btn-default" type="reset" value="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'cancel'),$_smarty_tpl ) );?>
" />
        </form>

    </div>
</div>
<?php }
}
