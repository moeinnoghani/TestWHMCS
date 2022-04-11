<?php

function returner($data){

    $ready_information = [
        "status"=>"successfully",
        "message"=>$data
    ];

    echo json_encode($ready_information);
    die();
}