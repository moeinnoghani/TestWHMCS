<?php
/* Smarty version 3.1.36, created on 2022-04-09 11:36:37
  from 'C:\xampp7.4\htdocs\whmcs-8\templates\twenty-one\error\page-not-found.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_625153a56fd359_79747062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd81b65c28b0a15631f64cb8838dd4c2664d34e4' => 
    array (
      0 => 'C:\\xampp7.4\\htdocs\\whmcs-8\\templates\\twenty-one\\error\\page-not-found.tpl',
      1 => 1625806722,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_625153a56fd359_79747062 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <div class="text-center p-5">

        <i class="fas fa-exclamation-circle display-1 font-weight-bold text-primary"></i>
        <h1 class="display-1 font-weight-bold text-primary line-height-reduced mb-5">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"errorPage.404.title"),$_smarty_tpl ) );?>

        </h1>
        <h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"errorPage.404.subtitle"),$_smarty_tpl ) );?>
</h3>
        <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"errorPage.404.description"),$_smarty_tpl ) );?>
</p>

        <div class="buttons">
            <a href="<?php echo $_smarty_tpl->tpl_vars['systemurl']->value;?>
" class="btn btn-primary px-4">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"errorPage.404.home"),$_smarty_tpl ) );?>

            </a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['systemurl']->value;?>
contact.php" class="btn btn-info px-4">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"errorPage.404.submitTicket"),$_smarty_tpl ) );?>

            </a>
        </div>

    </div>
</div>
<?php }
}
