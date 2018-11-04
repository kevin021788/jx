<?php

namespace app\controllers;

use Yii;
use app\models\News;
use app\models\Album;
use app\models\Albumpics;
use app\models\Team;
use app\models\Teammember;
use app\models\Teamleader;
use app\models\Competition;
use app\models\Teamcompetition;
use app\models\Score;
use app\models\Shop;
use app\models\Vote;
use app\models\Client;
use app\models\Rule;
use app\models\Slider;
use app\models\System;
use app\models\Weixin;
use app\models\Share;
use yii\web\Controller;
use yii\helpers\Url;
use yii\filters\VerbFilter;

class SiteController extends Controller
{

    public function behaviors()
    {
      return [
          'verbs' => [
              'class' => VerbFilter::className(),
              'actions' => [
                  'delete' => ['POST'],
                  'logout' => ['POST'],
              ],
          ],
      ];
    }

    //首页
    public function actionIndex()
    {
      Yii::$app->view->params['active'] = ['active', '', '', '', ''];
      Yii::$app->view->params['isnews'] = false;

      $newses = News::find()->asArray()->orderBy('time DESC')->limit(3)->all();
      // print_r($newses);exit;
      $albums = Album::find()->with(['albumpics'])->limit(3)->orderBy('album.time DESC')->asArray()->all();
      // print_r($albums);exit;
      $sliders = Slider::find()->asArray()->all();
      // print_r($sliders);exit;
      $system = System::find()->select(['title', 'logo'])->asArray()->one();
      Yii::$app->view->params['albums'] = $albums;
      //访问量加一
      if (($systemmodel = System::findOne(1)) !== null) {
        $systemmodel->visit += 1;
        $systemmodel->save();
      }
      return $this->render('index', ['newses'=>$newses, 'albums'=>$albums, 'sliders'=>$sliders, 'system'=>$system]);
    }

    //球队
    public function actionTeam()
    {
      Yii::$app->view->params['active'] = ['', 'active', '', '', ''];
      $teams = Team::find()->joinWith(['teammember'])->asArray()->all();
      // print_r($teams);exit;
      return $this->render('team', ['teams'=>$teams]);
    }

    //球队搜索
    public function actionTeamSearch()
    {
      $search = Yii::$app->request->post('search');
      Yii::$app->view->params['active'] = ['', 'active', '', '', ''];
      if(empty($search)) {
        $teams = Team::find()->joinWith(['teammember'])->asArray()->all();
      } else {
        $teams = Team::find()->where(['like', 'team.name', $search])
          ->orwhere(['like', 'teammember.name', $search])->joinWith(['teammember'])->asArray()->all();
      }
      // print_r($teams);exit;
      return $this->render('team', ['teams'=>$teams]);
    }

    //直播
    public function actionLive()
    {
      Yii::$app->view->params['active'] = ['', '', '', 'active', ''];
      return $this->render('live');
    }

    //赛程
    public function actionCompetition()
    {
      Yii::$app->view->params['active'] = ['', '', 'active', '', ''];
      $competitions = Competition::find()->asArray()->all();
      // print_r($competitions);exit;
      return $this->render('competition', ['competitions'=>$competitions]);
    }

    //商家
    public function actionShop()
    {
      Yii::$app->view->params['active'] = ['', '', '', '', 'active'];
      $shops = Shop::find()->asArray()->all();
      // print_r($shops);exit;
      return $this->render('shop', ['shops'=>$shops]);
    }


    //------------------------------------------------------------------------//

    //新闻详情页
    public function actionNews($id)
    {
      Yii::$app->view->params['active'] = ['active', '', '', '', ''];
      Yii::$app->view->params['isnews'] = true;
      $newsdetail = News::find()->where(['id'=>$id])->asArray()->one();
      return $this->render('news', ['newsdetail'=>$newsdetail]);
    }

    //新闻列表页
    public function actionNewsList()
    {
      Yii::$app->view->params['active'] = ['active', '', '', '', ''];
      Yii::$app->view->params['isnews'] = true;
      $newslist = News::find()->asArray()->orderBy('time DESC')->all();
      return $this->render('newslist', ['newslist'=>$newslist]);
    }

    //影集列表页
    public function actionAlbumList()
    {
      Yii::$app->view->params['active'] = ['active', '', '', '', ''];
      Yii::$app->view->params['isnews'] = false;
      $albums = Album::find()->joinWith(['albumpics'])->asArray()->orderBy('time DESC')->all();
      Yii::$app->view->params['albums'] = $albums;
      return $this->render('albumlist', ['albums'=>$albums]);
    }

    //赛程规则页
    public function actionRules()
    {
      Yii::$app->view->params['active'] = ['', '', 'active', '', ''];
      $rules = Rule::find()->select(['competition_rule'])->asArray()->one();
      // print_r($rules);exit;
      return $this->render('rules', ['rules'=>$rules]);
    }

    //球队详情页
    public function actionTeamDetail($tid)
    {
      Yii::$app->view->params['active'] = ['', 'active', '', '', ''];


      $teaminfo = Team::find()->joinWith(['teammember'])->where(['team.id'=>$tid])->asArray()->one();


//        p($teaminfo);
      // print_r($teaminfo);exit;
      $teamcompetitions = Teamcompetition::find()->asArray()->all();
//        p($teamcompetitions);
      $competition_array = [];
      for($i = 0; $i < count($teamcompetitions); $i++) {
        $teams = explode('|', $teamcompetitions[$i]['team_id']);
        if(in_array($tid, $teams)) {
          $competition_array[] = $teamcompetitions[$i]['competition_id'];
        }
      }
      array_unique($competition_array);
      $competitions = Competition::find()->where(['in', 'id', $competition_array])->orderBy('time DESC')->asArray()->all();
        p($competitions);
      // print_r($competitions);exit;
      $scores = Score::find()->where(['team_id'=>$tid])->orderBy('ranking ASC')->asArray()->all();
        p($scores);
      // print_r($scores);exit;
      $teamleader = Teamleader::find()->where(['openid'=>Yii::$app->session->get('wx_openid')])->count();
//        p($teamleader);
      return $this->render('TeamDetail', ['teaminfo'=>$teaminfo, 'competitions'=>$competitions, 'scores'=>$scores, 'teamleader'=>$teamleader]);
    }

    //球队投票页
    public function actionTeamVote()
    {
      //限制只能在微信中打开
      if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') === false) {
        header("Content-type: text/html; charset=utf-8");
        exit();
      }
      $search = Yii::$app->request->post('search');
      $session = Yii::$app->session;
      if (!$session->isActive) { $session->open(); }
      $openid = $session->get('wx_openid');
      $openid_src = Yii::$app->request->get('openid');
      if(!empty($openid_src) && $openid != $openid_src) {
        //保存来源的openid次数
        $share_model = Share::find()->where(['openid'=>$openid_src])->one();
        if( $share_model !== null && (!$session->get('visited')) && strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
          $share_model->count += 1;
          $share_model->lasttime = time();
          $share_model->save();
          $session->set('visited', true);
        }
      } elseif( !empty($openid) && empty($openid_src) ) {
        $this->redirect(Url::toRoute(['/site/team-vote', 'openid' => $openid]));
      }
      Yii::$app->view->params['active'] = ['', 'active', '', '', ''];
      //访问量加一
      if (($systemmodel = System::findOne(1)) !== null) {
        $systemmodel->visit += 1;
        $systemmodel->save();
      }
        if(empty($search)){
            $teams = Team::find()->select(['team.*', 'sum(vote.poll) as poll'])
                ->joinWith(['vote'],['poll'])->groupBy('team.name')->orderBy('poll DESC')->asArray()->all();
        }else{
            $teams = Team::find()->select(['team.*', 'sum(vote.poll) as poll'])
                ->where(['like', 'team.name', $search])
                ->joinWith(['vote'],['poll'])->groupBy('team.name')->orderBy('poll DESC')->asArray()->all();
        }

      $rules = Rule::find()->select(['vote_rule','vote_awarding'])->asArray()->one();
      $polls = Vote::find()->count();
      $visits = System::find()->select(['visit'])->asArray()->one();
      $share_rank = Share::find()->select(['nickname', 'headimgurl', 'count'])->where(['not', ['nickname' => null]])
                ->where(['>', 'count', 0])->limit(30)->orderBy('count DESC')->asArray()->all();
//       print_r($teams);exit;
      return $this->renderPartial('vote', [
        'teams'=>$teams, 'rules'=>$rules, 'polls'=>$polls,
        'visits'=>$visits, 'share_rank'=>$share_rank
      ]);
    }

    //球队详情页
    public function actionVoteDetail($tid)
    {
        //限制只能在微信中打开
//      if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') === false) {
//        header("Content-type: text/html; charset=utf-8");
//        exit();
//      }

        //授权登录跳转
        $url = Yii::$app->request->getUrl();
        Yii::$app->session->set('returnUrl',$url);
        $returnUrl = Yii::$app->session->get('returnUrl');

        Yii::$app->view->params['active'] = ['', 'active', '', '', ''];
        $teaminfo = Team::find()->where(['id'=>$tid])->asArray()->one();
        //print_r($teaminfo);exit;
        return $this->renderPartial('VoteDetail', ['teaminfo'=>$teaminfo,'returnUrl'=>$returnUrl]);
    }

    //赛程详情页
    public function actionCompetitionDetail($cid)
    {
      Yii::$app->view->params['active'] = ['', '', 'active', '', ''];
      $competition = Competition::find()->where(['id'=>$cid])->asArray()->one();
      // print_r($competition);exit;
      return $this->render('CompetitionDetail', ['competition'=>$competition]);
    }

    //商家详情页
    public function actionShopDetail($sid)
    {
      Yii::$app->view->params['active'] = ['', '', '', '', 'active'];
      $shopinfo = Shop::find()->where(['id'=>$sid])->asArray()->one();
      return $this->render('ShopDetail', ['shopinfo'=>$shopinfo]);
    }

    //------------------------------------------------------------------------//

    //保存客户预约信息
    public function actionSaveClient()
    {
      $model = new Client;
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
        echo json_encode(['success'=>true]);
      } else {
        echo json_encode(['success'=>false]);
      }
    }

    //保存投票信息
    public function actionSaveVote()
    {
      $model = new Vote;
      if ($model->load(Yii::$app->request->post())) {
        $votable = $this->isVotable($model->team_id);

          $url = Yii::$app->request->getUrl();
          Yii::$app->session->set('returnUrl',$url);

        if($votable == 1) {
          $model->save();
          echo json_encode(['success'=>true]);
        } elseif($votable == -1) {
          echo json_encode(['success'=>false, 'msg'=>'此球队您已经投过票了！']);
        } elseif($votable == -2) {
          echo json_encode(['success'=>false, 'msg'=>'每天只能投五个球队哦！']);
        }
      } else {
        echo json_encode(['success'=>false]);
      }
    }

    //检查投票次数
    private function isVotable($team_id)
    {
      $openid = Yii::$app->session->get('wx_openid');

      if(empty($openid)) {
        echo json_encode(['success'=>false, 'focus'=>true, 'msg'=>'投票需获取您的微信昵称等信息以限制票额哦！']);
        //echo json_encode(['success'=>false, 'focus'=>true, 'msg'=>'投票需要关注本公众号并通过微信验证哦！']);
        //echo json_encode(['success'=>false, 'focus'=>true, 'msg'=>'投票已暂停！']);
        exit;
      }

        $chsys = System::find()->select(['vote_status'])->asArray()->one();
        p($chsys);
        if(!empty($chsys['vote_status']))
        {
            echo json_encode(['success'=>false, 'focus'=>true, 'msg'=>'投票功能暂时状态哦！']);
            exit;
        }
      $wxmodel = Weixin::find()->where(['openid' => $openid])->one();
      if($wxmodel !== null) {
        $lasttime = $wxmodel->lasttime;
        $counts = $wxmodel->count;
        $teamid_array = explode('|', $wxmodel->team_id);
        if(date('Y-m-d', $lasttime) == date('Y-m-d', time())) {
          if(in_array($team_id, $teamid_array)) {
            //已存在投过票的team_id
            return -1;
          } elseif(count($teamid_array) >= 5) {
            //每天只能投五个球队
            return -2;
          } else {
            $wxmodel->count += 1;
            $teamid_array[] = $team_id;
            $teamid_string = implode('|', $teamid_array);
            $wxmodel->team_id = $teamid_string;
            $wxmodel->lasttime = time();
            $wxmodel->save();
          }
        } else {
          $wxmodel->count = 1;
          $wxmodel->team_id = $team_id;
          $wxmodel->lasttime = time();
          $wxmodel->save();
        }
      } else {
        $model = new Weixin;
        $model->openid = $openid;
        $model->count = 1;
        $model->team_id = $team_id;
        $model->lasttime = time();
        $model->save();
      }
      return 1;
    }


    //------------------------------------------------------------------------//

    //仅用于测试
    public function actionTest()
    {
      //Share::deleteAll(['nickname'=>NULL]);
      //return $this->renderPartial('test');
    }

    //公众号关注订阅
    public function actionSubscribe()
    {
      return $this->renderPartial('subscribe');
    }

    public function actionLogout()
    {
      Yii::$app->user->logout();
      return $this->redirect('/admin/user/login');
    }

    //错误显示页
    public function actions()
    {
      return [
        'error' => [
          'class' => 'yii\web\ErrorAction',
        ],
      ];
    }


}
