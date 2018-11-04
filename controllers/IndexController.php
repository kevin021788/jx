<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Session;
use app\models\Teamleader;
use app\models\Share;

class IndexController extends Controller
{
  private $token = 'weixingolf2016s';
  //private $appid = 'wxe020394f5ef6d567';//订阅号
  //private $appsecret = 'bd47a83361d42a11945ecfb5456a57ed';//订阅号
  private $appid = 'wx44792c53e63926d7';//服务号
  private $appsecret = 'adbdc102a070c1fbcab673909bab10e9';//服务号
  private $redirect_uri = 'http://gdpub.justgolf.cn/index/getinfo';
  private $code_url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=%s&redirect_uri=%s&response_type=code&scope=snsapi_userinfo&state=%s#wechat_redirect';
  private $info_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=%s&secret=%s&code=%s&grant_type=authorization_code';
  private $token_url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s';
  //private $detail_url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=%s&openid=%s&lang=zh_CN';
  private $detail_url = 'https://api.weixin.qq.com/sns/userinfo?access_token=%s&openid=%s&lang=zh_CN';
  // private $ticket_url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=%s&type=jsapi';

  public function actionIndex()
  {
    //微信URL绑定验证时反注释
    //$this->checkSignature();exit;
    $role = Yii::$app->request->get('role');
    //获取访问角色
    //visitor为一般访客，teamleader为队长
    //主要用于队长登记
    if(empty($role)) $role = 'visitor';
    return $this->redirect(sprintf($this->code_url, $this->appid, urlencode($this->redirect_uri), $role));
  }

  public function actionGetinfo()
  {
    header("Content-type: text/html; charset=utf-8");
    $code = Yii::$app->request->get('code');
    $state = Yii::$app->request->get('state');
    //1、获取OpenID
    $request_url = sprintf($this->info_url, $this->appid, $this->appsecret, $code);
    $result = $this->http_curl($request_url);
    //print_r($result);exit;
    if(empty($result['openid']) || empty($result['access_token'])) {
      return $this->redirect('/site/index');
    }
    $openid = $result['openid'];
    $access_token = $result['access_token'];  //这是OAuth2的ACCESS_TOKEN
    // 2、获取用户信息
    $request_url = sprintf($this->detail_url, $access_token, $openid);
    $info = $this->http_curl($request_url);
    //print_r($info);exit;
    if(empty($info['openid']) || empty($info['nickname'])) {
      return $this->redirect('/site/index');
    }
    //$access_token = $result['access_token'];
    //3、获取详细用户信息(如果没关注，则没有)
    /*
    $request_url = sprintf($this->detail_url, $access_token, $openid);
    $info = $this->http_curl($request_url);
    //print_r($info);exit;
    if(isset($info['subscribe']) && $info['subscribe'] == '0') {
      return $this->redirect('/site/subscribe');
    }
    */
    //设置Session
    $session = Yii::$app->session;
    if (!$session->isActive) { $session->open(); }
    $session->set('wx_openid', $openid);
    // $session->set('wx_userinfo', $info);
    //保存队长信息到数据库
    if($state === 'teamleader') {
      $leader_model = Teamleader::find()->where(['openid'=>$openid])->one();
      if($leader_model !== null) {
        $leader_model->nickname = $info['nickname'];
        $leader_model->sex = $info['sex'];
        $leader_model->headimgurl = $info['headimgurl'];
        $leader_model->save();
      } else {
        $model = new Teamleader;
        $model->openid = $info['openid'];
        $model->nickname = $info['nickname'];
        $model->sex = $info['sex'];
        $model->headimgurl = $info['headimgurl'];
        $model->save();
      }
    }
    //保存分享达人记录
    $share_model = Share::find()->where(['openid'=>$openid])->one();
    if($share_model !== null) {
      $share_model->nickname = $info['nickname'];
      $share_model->sex = $info['sex'];
      $share_model->headimgurl = $info['headimgurl'];
      $share_model->save();
    } else {
      $model = new Share;
      $model->openid = $info['openid'];
      $model->nickname = $info['nickname'];
      $model->sex = $info['sex'];
      $model->headimgurl = $info['headimgurl'];
      $model->count = 0;
      $model->lasttime = time();
      $model->save();
    }
    if($state === 'vote') {
      $session->set('vote_auth', 'y');
      return $this->redirect('/site/team-vote?openid=' . $openid);
    } elseif ($state === 'vote2') {
      return $this->redirect('/site/team-vote?openid=' . $openid);
    }
    return $this->redirect('/site/index');
  }

  private function http_curl($url)
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return json_decode($result, true);
  }

  private function checkSignature()
  {
    $echoStr = $_GET["echostr"];
    $signature = $_GET["signature"];
    $timestamp = $_GET["timestamp"];
    $nonce = $_GET["nonce"];

    $tmpArr = array($this->token, $timestamp, $nonce);
    sort($tmpArr, SORT_STRING);
    $tmpStr = implode( $tmpArr );
    $tmpStr = sha1( $tmpStr );

    if( $tmpStr == $signature ){
      echo $echoStr;
      return true;
    }else{
      return false;
    }
  }

}

