<?php
/**
 * Created by PhpStorm.
 * User: hong
 * Date: 8/24/16
 * Time: 11:38 AM
 */

date_default_timezone_set("Asia/Shanghai");
header("Content-Type: text/event-stream\n\n");

$counter = rand(1, 10);
while (1) {
    // Every second, sent a "ping" event.
//    ob_start();
    echo "event: ping\n";
    $curDate = date(DATE_ISO8601);
    echo 'data: {"time": "' . $curDate . '"}';
    echo "\n\n";

    // Send a simple message at random intervals.

    $counter--;

    if (!$counter) {
        echo str_pad('data: This is a message at time ' . $curDate . "\n\n", 1024);
        $counter = rand(1, 10);
    }

//    $content = ob_end_flush();
//    echo $content;
//    flush();

    @ob_flush();@flush();
    sleep(1);
}
