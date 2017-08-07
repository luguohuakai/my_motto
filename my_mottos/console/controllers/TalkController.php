<?php
namespace console\controllers;

use Workerman\Worker;
use yii\base\Controller;

/**
 * Site controller
 */
class TalkController extends Controller
{
    public function actionIndex()
    {
        $wm = new Worker('http://0.0.0.0:8080');
        $wm->onMessage = function ($conn,$data){
            $conn->send('hello world');
        };

        Worker::runAll();
    }
}
