<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
      integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css"
      integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<div class="container">

    <form class="well form-horizontal" id="contact_form" method="post">
        <fieldset>

            <!-- Form Name -->
            <legend>
                <center><h2><b>Registration Form</b></h2></center>
            </legend>
            <br>

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

            <div id="div6" class='form-group verify-form-params'>
                <label class='col-md-4 control-label'></label>
                <div class='col-md-4 inputGroupContainer'>
                    <div class='input-group'>
                        <input type='button' class='btn btn-success' id='verify' value='Verify'
                               style='background-color: #4CAF50; width: 160px;font-size: 15px;margin-left: 70px;margin-top: 30px'>
                    </div>
                </div>
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


<script>
    // import button from "../vendor/twbs/bootstrap/js/src/button";


    var div6;

    $(document).ready(function () {
        console.log("ok")
        div6 = $('div[id="div6"]').detach();
        $('div[id="div6"]').remove();
    });


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
                        " <input id='verify_code' placeholder='Your Verify Code' class='form-control form-params'" +
                        " type='text'>" +
                        " </div>" +
                        "</div>" +
                        "</div>";
                });

            $('#div8').after(function () {
                return div6;
            });
        }
    );

    $('button[id="submit"]').click(function (event) {

        event.preventDefault()
        $.ajax({
            url: "addonmodules.php?m=custom_register",
            cache: false,
            type: "POST",
            data: {
                'firstname': $('input[name="first_name"]').val(),
                'lastname': $('input[name="last_name"]').val(),
                'password': $('input[name="user_password"]').val(),
                'confirm_password': $('input[name="confirm_password"]').val(),
                'email': $('input[name="email"]').val(),
                'phone_number': $('input[id="phone_number"]').val(),
                'request_type': 'submit'
            }


        }).done(function (data) {
            if (JSON.parse(data).status === 'failed') {
                Swal.fire({
                    title: 'Error!',
                    text: JSON.parse(data).description,
                    icon: 'warning',
                    confirmButtonText: 'Ok'
                });
            } else {
                Swal.fire({
                    title: 'Success',
                    text: JSON.parse(data).description,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });


                $('#submit').remove();
                $('.submit-form-params').remove();
                $('.verify-form-params').hide();
                $('#submitted-before-button').remove();

                $('#div5').html(function () {
                        return "<div class='form-group verify-form-params'>" +
                            "<label class='col-md-4 control-label'></label>" +
                            "<div class='col-md-4 inputGroupContainer'>" +
                            " <div class='input-group'>" +
                            "  <span class='input-group-addon'><i class='glyphicon glyphicon-barcode'></i></span>" +
                            " <input id='verify_code' placeholder='Your Verify Code' class='form-control form-params'" +
                            " type='text'>" +
                            " </div>" +
                            "</div>" +
                            "</div>";
                    }
                ).after(function () {
                    return div6;
                });

            }


        });


    });


    $('input[id="verify"]').click(function (event) {


            event.preventDefault()
            $.ajax({
                url: "addonmodules.php?m=custom_register",
                cache: false,
                type: "POST",
                data: {
                    'phone_number': $('input[id="phone_number"]').val(),
                    'verify_code': $('input[id="verify_code"]').val(),
                    'request_type': 'verify'
                }
            }).done(function (data) {
                if (JSON.parse(data).status === 'failed') {
                    Swal.fire({
                        title: 'Error!',
                        text: JSON.parse(data).description,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                } else {
                    Swal.fire({
                        title: 'Success',
                        text: JSON.parse(data).description,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                }
            });

        }
    );

</script>