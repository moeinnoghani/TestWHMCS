<?php
/* Smarty version 3.1.36, created on 2022-05-02 01:18:18
  from 'C:\xampp7.4\htdocs\whmcs-8\modules\addons\custom_register\views\client_custom_register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_626f153ab6bce4_38289495',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a5a61ffa95ca5a2859a08357cd75ae0c142da1f' => 
    array (
      0 => 'C:\\xampp7.4\\htdocs\\whmcs-8\\modules\\addons\\custom_register\\views\\client_custom_register.tpl',
      1 => 1651447095,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_626f153ab6bce4_38289495 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
      integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css"
      integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
        crossorigin="anonymous"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"><?php echo '</script'; ?>
>

<div class="container">

    <form class="well form-horizontal" id="contact_form">
        <fieldset>

            <!-- Form Name -->
            <legend>
                <center><h2><b>Registration Form</b></h2></center>
            </legend>
            <br>



            <!-- Text input-->

            <br>
            <div class="form-group submit-form-params">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="first_name" placeholder="First Name" class="form-control" type="text">
                    </div>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group submit-form-params">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="last_name" placeholder="Last Name" class="form-control" type="text">
                    </div>
                </div>
            </div>


            <!-- Text input-->

            <div class="form-group submit-form-params" id="div4">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input name="user_password" placeholder="Password" class="form-control" type="password">
                    </div>
                </div>
            </div>

            <div id="div5">

            </div>

            <!-- Text input-->

            <div class="form-group submit-form-params">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input name="confirm_password" placeholder="Confirm Password" class="form-control"
                               type="password">
                    </div>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group submit-form-params">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" placeholder="E-Mail Address" class="form-control" type="text">
                    </div>
                </div>
            </div>


            <!-- Text input-->

            <div class="form-group verify-form-params" id="div7">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input id="phone_number" placeholder="Phone Number" class="form-control form-params"
                               type="text">
                    </div>
                </div>
            </div>

            <div id="submitted-before-button" class="form-group" style="margin-left: 5px;margin-top: 30px">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4 inputGroupContainer">
                    <button class="btn btn-primary" type="button">
                        <span class="badge">Click Here if you submitted before<br> and you have verify code</span>
                    </button>
                </div>
            </div>

            <div class="form-group submit-form-params">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4"><br>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <button id="submit" type="submit" value="submit" name="submit" class="btn btn-warning">
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    </button>
                </div>
            </div>



        </fieldset>
    </form>
</div>


<?php echo '<script'; ?>
>

    $('#submitted-before-button').click(function () {
            $('.submit-form-params').remove();
            $('#submitted-before-button').remove();

            $('#div7')
                .after(function () {
                    return "<div class='form-group verify-form-params' id='div8'>" +
                        "<label class='col-md-4 control-label'></label>" +
                        "<div class='col-md-4 inputGroupContainer'>" +
                        " <div class='input-group'>" +
                        "  <span class='input-group-addon'><i class='glyphicon glyphicon-barcode'></i></span>" +
                        " <input id='phone_number' placeholder='Your Verify Code' class='form-control form-params'" +
                        " type='text'>" +
                        " </div>" +
                        "</div>" +
                        "</div>";
                });

            $('#div8').after(function (){
                return "<div class='form-group verify-form-params'>" +

                    "<label class='col-md-4 control-label'></label>" +
                    "<div class='col-md-4 inputGroupContainer'>" +
                    " <div class='input-group'>" +
                    " <button style='width: 160px;font-size: 15px;margin-left: 70px;margin-top: 30px' type='button' class='btn btn-success ' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
                    "Verify <span class='caret'></span>" +
                    "</button>" +

                    " </div>" +
                    "</div>" +
                    "</div>";
            });
        }
    );

    $('#submit').click(function appendText(event) {

        event.preventDefault()
        $.ajax({
            url: "addonmodules.php?m=custom_register",
            cache: false,
            type: "POST",
            data: {
                val: $("#submit").val(),

            }
        });

        $('#submit').remove();
        $('.submit-form-params').remove();
        $('.verify-form-params').remove();
        $('#submitted-before-button').remove();

        $('#div5').html(function () {
                return "<div class='form-group verify-form-params'>" +
                    "<label class='col-md-4 control-label'></label>" +
                    "<div class='col-md-4 inputGroupContainer'>" +
                    " <div class='input-group'>" +
                    "  <span class='input-group-addon'><i class='glyphicon glyphicon-barcode'></i></span>" +
                    " <input id='phone_number' name='verify_code' placeholder='Your Verify Code' class='form-control form-params'" +
                    " type='text'>" +
                    " </div>" +
                    "</div>" +
                    "</div>";
            }
        ).after(function () {
            return "<div class='form-group verify-form-params'>" +

                "<label class='col-md-4 control-label'></label>" +
                "<div class='col-md-4 inputGroupContainer'>" +
                " <div class='input-group'>" +
                " <button style='width: 160px;font-size: 15px;margin-left: 70px;margin-top: 30px' type='button' class='btn btn-success ' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
                "Verify <span class='caret'></span>" +
                "</button>" +

                " </div>" +
                "</div>" +
                "</div>";
        });


        // $('#lo').html("<form action=''>" +
        //
        //         " <input style='margin-bottom: 20px' type='text' name='verify_code'>" +
        //             " <input style='margin-bottom: 20px' type='submit' value='verify' name='verify_code'>" +
        //
        //                 "</form>");
        //
        //
        // });
    });
    // $(document).ready(function()
    //     {
    //
    //
    //     $('#contact_form').bootstrapValidator({
    //         // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
    //         feedbackIcons: {
    //             valid: 'glyphicon glyphicon-ok',
    //             invalid: 'glyphicon glyphicon-remove',
    //             validating: 'glyphicon glyphicon-refresh'
    //         },
    //         fields: {
    //             first_name: {
    //                 validators: {
    //                     stringLength: {
    //                         min: 2,
    //                     },
    //                     notEmpty: {
    //                         message: 'Please enter your First Name'
    //                     }
    //                 }
    //             },
    //             last_name: {
    //                 validators: {
    //                     stringLength: {
    //                         min: 2,
    //                     },
    //                     notEmpty: {
    //                         message: 'Please enter your Last Name'
    //                     }
    //                 }
    //             },
    //             user_name: {
    //                 validators: {
    //                     stringLength: {
    //                         min: 8,
    //                     },
    //                     notEmpty: {
    //                         message: 'Please enter your Username'
    //                     }
    //                 }
    //             },
    //             user_password: {
    //                 validators: {
    //                     stringLength: {
    //                         min: 8,
    //                     },
    //                     notEmpty: {
    //                         message: 'Please enter your Password'
    //                     }
    //                 }
    //             },
    //             confirm_password: {
    //                 validators: {
    //                     stringLength: {
    //                         min: 8,
    //                     },
    //                     notEmpty: {
    //                         message: 'Please confirm your Password'
    //                     }
    //                 }
    //             },
    //             email: {
    //                 validators: {
    //                     notEmpty: {
    //                         message: 'Please enter your Email Address'
    //                     },
    //                     emailAddress: {
    //                         message: 'Please enter a valid Email Address'
    //                     }
    //                 }
    //             },
    //             phone_number: {
    //                 validators: {
    //                     stringLength: {
    //
    //                         notEmpty: {
    //                             message: 'Please enter your Contact No.'
    //                         }
    //                     }
    //                 },
    //
    //             }
    //         }
    //     })
    // .on('success.form.bv', function(e) {
    //
    //     $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
    //     $('#contact_form').data('bootstrapValidator').resetForm();
    //
    //     // Prevent form submission
    //     e.preventDefault();
    //
    //     // Get the form instance
    //     var $form = $(e.target);
    //
    //     // Get the BootstrapValidator instance
    //     var bv = $form.data('bootstrapValidator');
    //
    //     // Use Ajax to submit form data
    //     $.post($form.attr('#submit'), $form.serialize(), function(result) {
    //         console.log(result);
    //     }, 'json');
    // });

<?php echo '</script'; ?>
><?php }
}
