<?php
/**
 * Created by kevin0217@126.com
 * User: 曾剑杰
 * Date: 2018-10-31
 * Time: 16:36
 */
if (!function_exists('echoJson')) {
    /**
     * 输出JSON格式
     * @param $code
     * @param $msg
     * @param array $data
     */
    function echoJson($code, $msg, $data = [])
    {
        $result = [];
        $result['code'] = $code;
        $result['msg'] = $msg;
        if (!empty($data)) $result['data'] = $data;

        $result['server_time']=time();

        $callback = Yii::$app->request->get('callback',null);

        if(!isset($callback)){
            header ("Content-Type:application/json; charset=utf-8;");
            echo json_encode($result);
        }else{
            header ( "Content-Type:text/html; charset=utf-8" );
            echo $callback."(".json_encode($result).")";
        }
        exit();

    }
}

/**
 * 基本用法：
 * Yii::$app->request
 * 简化为
 * app('request')
 * Yii::$container->get('userService')
 * 简化为
 * app('userService')
 * $user = app('\common\model\User')
 */
if (!function_exists('app')) {
    /**
     * Get the available container instance.
     *
     * @param string $instance
     *
     * @return mixed|\yii\di\Container
     */
    function app($instance = null)
    {
        if (is_null($instance)) {
            return Yii::$container;
        }

        if (Yii::$app->has($instance)) {
            return Yii::$app->get($instance);
        }

        return Yii::$container->get($instance);
    }
}

/**
 * 基本用法：
 * $user = Yii::$app->user->identity;
 * $comment = Comment::find()->where(['>', 'id', 1])->one();
 * dd($user->toArray(),$comment->toArray());
 */
if (!function_exists('dd')) {
    function dd($param)
    {
        foreach ($param as $p)  {
            \yii\helpers\VarDumper::dump($p, 10, true);
            echo '<pre>';
        }
        exit(1);
    }
}

/**
 * 可以用来获取环境变量的值
 */
if (!function_exists('env')) {
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return value($default);
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;

            case 'false':
            case '(false)':
                return false;

            case 'empty':
            case '(empty)':
                return '';

            case 'null':
            case '(null)':
                return;
        }

        if (('"' === substr($value, 0, 1)) && ('"' === substr($value, -1, 1))) {
            return substr($value, 1, -1);
        }

        return $value;
    }
}

if (!function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}

/**
 * yii\helpers\ArrayHelper::getValue 太长了，做个简写：
 */
if (!function_exists('getVal')) {
    /**
     * 从对象，数组中获取获取数据.
     *
     * @param $array mixed 数组或者对象
     * @param $key array|string 对象的属性，或者数组的键值/索引，以'.'链接或者放入一个数组
     * @param $default string 如果对象或者属性中不存在该值事返回的值
     *
     * @return mixed mix
     **/
    function getVal($array, $key, $default = '')
    {
        return yii\helpers\ArrayHelper::getValue($array, $key, $default);
    }
}

/**
 * yiiUrl()
 * 在html中这个函数会方便生成url
 */
if (!function_exists('yiiUrl')) {
    /**
     * 创建url.
     *
     * @param $url string 对象的属性，或者数组的键值/索引，以'.'链接或者放入一个数组
     *
     * @return mixed mix
     **/
    function yiiUrl($url)
    {
        return Yii::$app->urlManager->createUrl($url);
    }
}

/**
 * yiiParams
 * 获取Yii::$app->params 同样非常常用，也做个简写：
 */
if (!function_exists('yiiParams')) {
    /**
     * 获取yii配置参数.
     *
     * @param $key string 对象的属性，或者数组的键值/索引，以'.'链接或者放入一个数组
     *
     * @return mixed mix
     **/
    function yiiParams($key)
    {
        return Yii::$app->params[$key];
    }
}

if (!function_exists('curlPost'))
{
    /**
     * 使用curl进行POST请求
     * 支持httpscurlPost
     */
    function curlPost($url, $data = array(), $timeout = 10, $header = array()){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        if(!empty($header)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        //是否https请求
        $https = substr($url, 0, 8) == "https://" ? true : false;
        if($https){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // 检查证书中是否设置域名
        }

        $res = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if($res !== false && $status >= 400){
            $res = false;
        }
        curl_close($ch);
        return $res;
    }
}
/**
 * 替换后台Model路径问题
 * 将bemanage/news换成news
 */
if (!function_exists('replaceBackend')) {
    function replaceBackend($str)
    {
        if(strstr($str,'bemanage/')) $str = str_replace('bemanage/', '', $str);
        return $str;
    }
}



