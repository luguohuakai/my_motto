<?php
namespace console\controllers;

use console\models\Kafka;
use console\models\SysConfig;
use Kafka\Consumer;
use Kafka\ConsumerConfig;
use Kafka\Producer;
use Kafka\ProducerConfig;
use Workerman\Worker;
use yii\base\Controller;

/**
 * Site controller
 */
class KafkaController extends Controller
{
    static $i = 0;
    public function actionIndex()
    {
        echo 'gooood';
    }
    public function actionProducer(){
        //        require_once __DIR__ . '/../../common/d/See-KafKa/KafKa.php';
//        $KafKa_Lite = new KafKa_Lite("127.0.0.1,localhost");
//// 设置一个Topic
//        $KafKa_Lite->setTopic("test");
//// 单次写入效率ok  写入1w条15 毫秒
//        $Producer = $KafKa_Lite->newProducer();
//// 参数分别是partition,消息内容,消息key(可选)
//// partition:可以设置为KAFKA_PARTITION_UA会自动分配,比如有6个分区写入时会随机选择Partition
//        $Producer->setMessage(0, "hello");

//        require '../vendor/autoload.php';
        date_default_timezone_set('PRC');
//    use Monolog\Logger;
//    use Monolog\Handler\StdoutHandler;
// Create the logger
//        $logger = new Logger('my_logger');
// Now add some handlers
//        $logger->pushHandler(new StdoutHandler());

        $config = ProducerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10000);
        $config->setMetadataBrokerList('localhost:9092');
        $config->setBrokerVersion('0.11.0.0');
        $config->setRequiredAck(1);
        $config->setIsAsyn(true);
        $config->setProduceInterval(500);
        $producer = new Producer(function() {
            return array(
                array(
                    'topic' => 'test',
                    'value' => 'console....' . date('Y-m-d H:i:s'),
                    'key' => '',
                ),
            );
        });
//        $producer->setLogger($logger);
        $producer->success(function($result) {
            echo '<pre>';
            print_r($result);
//            var_dump($result);
        });
        $producer->error(function($errorCode, $context) {
            var_dump($errorCode);
        });
        $producer->send(true);
    }

    public function actionConsumer(){
        date_default_timezone_set('PRC');
// Create the logger
//        $logger = new Logger('my_logger');
// Now add some handlers
//        $logger->pushHandler(new StdoutHandler());

        $config = ConsumerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10000);
        $config->setMetadataBrokerList('localhost:9092');
        $config->setGroupId('test-consumer-group');
        $config->setBrokerVersion('0.11.0.0');
        $config->setTopics(array('maoge'));
        $config->setOffsetReset('earliest');
        $consumer = new Consumer();
//        $consumer->setLogger($logger);
        $consumer->start(function($topic, $part, $message) {
            print_r($topic);
            print_r($part);
            print_r($message);
            echo static::$i++;
//            $kafka = new Kafka();
//            $kafka->topic = $topic;
//            $kafka->part = $part;
//            $kafka->message = json_encode($message);
//            $kafka->offset = $message['offset'];
//            $kafka->size = $message['size'];
//            $kafka->crc = $message['message']['crc'];
//            $kafka->magic = $message['message']['magic'];
//            $kafka->attr = $message['message']['attr'];
//            $kafka->timestamp = $message['message']['timestamp'];
//            $kafka->key = $message['message']['key'];
//            $kafka->value = $message['message']['value'];
//            $kafka->save();
        });
    }

    // 读取 t_系统编号 队列
    //  入职 新增 users
    //  返回 t_sysback 队列
    //  离职 删除 users
    //  有这个用户且删除成功
    //  返回 t_sysback 队列
    //  无这个用户 返回 t_sysback 队列
    public function actionUsersInOrOut(){
        $config = ConsumerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(10000);
        $config->setMetadataBrokerList('10.8.199.128:9092');

        $config->setGroupId('test-consumer-group');

        $config->setBrokerVersion('0.11.0.0');

        $config->setTopics(array('t_系统编号'));

        $config->setOffsetReset('earliest');
        $consumer = new Consumer();

        $consumer->start(function($topic, $part, $message) {

        });
    }
}
