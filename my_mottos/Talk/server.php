<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 2017/7/28
 * Time: 14:40
 */
require_once(__DIR__ . '/../vendor/autoload.php');

use Workerman\Worker;

$wm = new Worker('http://0.0.0.0:8686');
$wm->onMessage = function ($conn,$data){
    $conn->send('gooood12111212');
};

Worker::runAll();
