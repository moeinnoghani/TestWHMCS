<?php

include __DIR__ . DIRECTORY_SEPARATOR . "PasswordReminder.php";

add_hook('ClientAreaPage', 1, function ($vars) {

    $passwordReminder = new PasswordReminder();
});
