<?php
/**
 * Created by PhpStorm.
 * User: DM
 * Date: 2017/7/31
 * Time: 17:15
 */

namespace common\kernel;


use yii\base\Controller;

class Kernel extends Controller
{
    const FAITH = 'Make the world to be a better place';
    public $faith = 'We are the world';
    protected $philosophy = 'plato';
    protected $weltanschauung = 'fine';
    protected $methodology = '
    
    涉及到复杂的操作应该放到逻辑层处理,尽量考虑细分,复用,避免大而化之
    何谓逻辑:逻辑就是想办法条理清晰地把想干的事干好
    
    ';
}