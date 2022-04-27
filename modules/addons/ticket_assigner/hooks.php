<?php

add_hook('TicketOpen', 1, function ($vars) {
    print json_encode($vars);
    die();
});
