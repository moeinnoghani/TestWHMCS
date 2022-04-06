<?php
/* Smarty version 3.1.36, created on 2022-04-04 13:21:10
  from 'C:\xampp7.4\htdocs\whmcs-8\admin\templates\blend\client-paymethods.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_624ad4a6e79e50_63528670',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '031a9fdfd83e88c6e5a0b12f997ad991693f6c27' => 
    array (
      0 => 'C:\\xampp7.4\\htdocs\\whmcs-8\\admin\\templates\\blend\\client-paymethods.tpl',
      1 => 1625806722,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_624ad4a6e79e50_63528670 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    function reloadTablePayMethods() {
        WHMCS.http.jqClient.post(
            '<?php echo routePath('admin-client-paymethods-html-rows',$_smarty_tpl->tpl_vars['client']->value['id']);?>
',
            {
                token: csrfToken
            },
            function(data) {
                jQuery('#tablePayMethods').html(data.body);
            },
            'json'
    );
    }
<?php echo '</script'; ?>
>
<div class="clientssummarybox">
    <div class="title">Pay Methods</div>
    <table id="tablePayMethods" class="clientssummarystats" cellspacing="0" cellpadding="2">
        <?php echo $_smarty_tpl->tpl_vars['payMethodRows']->value;?>

    </table>
    <ul>
        <?php if ($_smarty_tpl->tpl_vars['addNewCardUrl']->value) {?>
            <li id="liAddCcPayMethod">
                <a id="btnAddCcPayMethod"
                   href="<?php echo $_smarty_tpl->tpl_vars['addNewCardUrl']->value;?>
"
                   data-modal-title="Add Pay Method - Credit Card"
                   data-btn-submit-id="btnSave"
                   data-btn-submit-label="Save"
                   onclick="return false;"
                   class="open-modal">
                    <img src="images/icons/add.png" border="0" align="absmiddle"/>
                    Add Credit Card
                </a>
            </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['addNewBankAccountUrl']->value) {?>
            <li id="liAddBankAccountPayMethod">
                <a id="btnAddBankAccountPayMethod"
                   href="<?php echo $_smarty_tpl->tpl_vars['addNewBankAccountUrl']->value;?>
"
                   data-modal-title="Add Pay Method - Bank Account"
                   data-btn-submit-id="btnSave"
                   data-btn-submit-label="Save"
                   onclick="return false;"
                   class="open-modal">
                    <img src="images/icons/add.png" border="0" align="absmiddle"/>
                    Add Bank Account
                </a>
            </li>
        <?php }?>
        <?php if (!$_smarty_tpl->tpl_vars['addNewCardUrl']->value && !$_smarty_tpl->tpl_vars['addNewBankAccountUrl']->value) {?>
            <li>
                <a id="btnNoGateways"
                   role="button"
                   data-toggle="tooltip"
                   data-container="body"
                   data-placement="right auto"
                   data-trigger="hover"
                   class="disabled"
                   title="You must activate at least one merchant gateway before you can add a credit card. For local card storage without a payment gateway, use the Offline Credit Card gateway."
                >
                    <img src="images/icons/add.png" border="0" align="absmiddle"/>
                    Add Credit Card
                </a>
            </li>
        <?php }?>
    </ul>
</div>
<?php }
}
