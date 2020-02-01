<?php

function get_readable_date($date){
    setlocale(LC_TIME, "turkish");
    setlocale(LC_ALL,'turkish');
    return strftime('%e %b %Y', strtotime($date));
}

function get_active_user(){


    $t = &get_instance();

    $user = $t->session->userdata("user");

    if ($user)
        return $user;
    else
        return false;


}

function isAdmin(){
    $t = &get_instance();

    $user = $t->session->userdata("user");

    return true;

    if ($user->user_role == "admin")
        return true;
    else
        return false;
}



