<?php

namespace app\controllers;

use app\components\message\Language;
use app\models\About;
use app\models\Banner;
use app\models\Category;
use app\models\Contact;
use app\models\Product;
use app\models\Service;
use Yii;
use app\models\News;
use yii\web\Controller;
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
    public function beforeAction($action)
    {
        $config = Yii::$app->cache->get('config_'.\app\components\message\Language::getLanguageNum());
        if(empty($config))
        {
            $config = getWebConfig();
            Yii::$app->cache->set('config_'.\app\components\message\Language::getLanguageNum(), $config);
        }
        $this->view->params['config'] = $config;
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    //首页
    public function actionIndex()
    {
        $config = Yii::$app->cache->get('config_'.\app\components\message\Language::getLanguageNum());
        $banner = \app\models\Banner::getBanner('home');

        $product = Product::getIndexList(4);

        $service = Service::getIndexList(4);

        $about = About::findOne(Language::getLanguageNum());

        $news = News::getIndexList(2);

        return $this->render('index', [
            'config' => $config,
            'banner' => $banner,
            'product' => $product,
            'service' => $service,
            'about' => $about,
            'news' => $news,
        ]);
    }

    /**
     * 关于我们
     * @return string
     */
    public function actionAbout()
    {
        $banner = \app\models\Banner::getBanner('about');

        $model = About::findOne(Language::getLanguageNum());
        return $this->render('about',[
            'model' => $model,
            'banner' => $banner,
        ]);
    }

    /**
     * 联系我们
     * @return string
     */
    public function actionContact()
    {
        $banner = \app\models\Banner::getBanner('about');

        $model = Contact::findOne(Language::getLanguageNum());
        return $this->render('contact',[
            'model' => $model,
            'banner' => $banner,
        ]);
    }
    /**
     * 新闻列表
     * @return string
     */
    public function actionNews()
    {
        $md = 'news';
        $banner = \app\models\Banner::getBanner($md);
        $category = Category::getCategoryList($md);
        $model = new News();
        $ret = $model::getList();
        if($ret['success'])
        {
            $list = $ret['list'];
            $pages = $ret['pages'];
            return $this->render('newsList',[
                'model' => $model,
                'list' => $list,
                'pages' => $pages,
                'banner' => $banner,
                'category' => $category,
            ]);
        }
        else
        {
            return $this->render('newsList',[
                'list' => [],
                'banner' => $banner,
                'category' => $category,
            ]);
        }

    }

    /**
     * 新闻详情
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionNewsDetail($id)
    {
        $md = 'news';
        $banner = \app\models\Banner::getBanner($md);
        $category = Category::getCategoryList($md);
        $model = News::getDetail($id);
        if (empty($model)) {
            return $this->redirect(['news']);
        } else {
            return $this->render('newsDetail', [
                'model' => $model,
                'banner' => $banner,
                'category' => $category,
            ]);
        }
    }

    /**
     * 产品列表
     * @return string
     */
    public function actionProduct()
    {
        $md = 'product';
        $banner = \app\models\Banner::getBanner($md);
        $category = Category::getCategoryList($md);
        $model = new Product();
        $ret = $model::getList();
        if($ret['success'])
        {
            $list = $ret['list'];
            $pages = $ret['pages'];
            return $this->render('productList',[
                'model' => $model,
                'list' => $list,
                'pages' => $pages,
                'banner' => $banner,
                'category' => $category,
            ]);
        }
        else
        {
            return $this->render('productList',[
                'list' => [],
                'banner' => $banner,
                'category' => $category,
            ]);
        }

    }

    /**
     * 产品详情
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionProductDetail($id)
    {
        $md = 'product';
        $banner = \app\models\Banner::getBanner($md);
        $category = Category::getCategoryList($md);
        $model = Product::getDetail($id);
        if (empty($model)) {
            return $this->redirect(['product']);
        } else {
            return $this->render('productDetail', [
                'model' => $model,
                'banner' => $banner,
                'category' => $category,
            ]);
        }
    }

    /**
     * 服务项目列表
     * @return string
     */
    public function actionService()
    {
        $md = 'service';
        $banner = \app\models\Banner::getBanner($md);
        $category = Category::getCategoryList($md);
        $model = new Service();
        $ret = $model::getList();
        if($ret['success'])
        {
            $list = $ret['list'];
            $pages = $ret['pages'];
            return $this->render('serviceList',[
                'model' => $model,
                'list' => $list,
                'pages' => $pages,
                'banner' => $banner,
                'category' => $category,
            ]);
        }
        else
        {
            return $this->render('serviceList',[
                'list' => [],
                'banner' => $banner,
                'category' => $category,
            ]);
        }

    }

    /**
     * 服务项目详情
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionServiceDetail($id)
    {
        $md = 'service';
        $banner = \app\models\Banner::getBanner($md);
        $category = Category::getCategoryList($md);
        $model = Service::getDetail($id);
        if (empty($model)) {
            return $this->redirect(['service']);
        } else {
            return $this->render('serviceDetail', [
                'model' => $model,
                'banner' => $banner,
                'category' => $category,
            ]);
        }
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
