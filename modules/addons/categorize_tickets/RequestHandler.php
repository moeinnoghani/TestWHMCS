<?php

include __DIR__.DIRECTORY_SEPARATOR."../../../init.php";

use Illuminate\Database\Capsule\Manager as Capsule;


if(isset($_POST['newtag'])){
    Capsule::table('tbltags')->insert([
        'type'=>'ticket',
        'tag'=> $_POST['newtag']
    ]);
}
