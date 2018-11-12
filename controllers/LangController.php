<?php
/**
 * Created by kevin0217@126.com
 * User: 曾剑杰
 * Date: 2018-10-31
 * Time: 14:53
 */

namespace app\controllers;

use app\components\message\Language;
use Yii;
use yii\web\Controller;

class LangController extends Controller
{

    //语言切换
    public function actionLanguage(){
        $language=  \Yii::$app->request->get('lang');
        if(isset($language)){
            Yii::$app->session['lang'] = $language;
        }
        $url = \Yii::$app->request->headers['Referer'];
        if(strstr($url,'about')) $url = str_replace(strchr($url, 'about/update'), 'about', $url);
        if(strstr($url,'contact')) $url = str_replace(strchr($url, 'contact/update'), 'contact', $url);
        //切换完语言哪来的返回到哪里
        $this->redirect($url);
    }
}