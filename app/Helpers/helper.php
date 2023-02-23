<?php

use Pusher\Pusher;

if(!function_exists("admin_url")) {
    function admin_url($path)
    {
        return url("admin/" . $path);
    }
}

if(!function_exists("format_money")){
    function format_money($m){
        return "$".number_format($m);
    }
}

if(!function_exists("notification")){
    function notification($channel,$event,$data){
        // send notification
        $options = array(
            'cluster' => env("PUSHER_APP_CLUSTER"),
            'useTLS' => true
        );
        $pusher = new Pusher(
            env("PUSHER_APP_KEY"),
            env("PUSHER_APP_SECRET"),
            env("PUSHER_APP_ID"),
            $options
        );

        $pusher->trigger($channel, $event, $data);
    }
}

