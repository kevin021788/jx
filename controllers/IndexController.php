<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Session;
use app\models\Teamleader;
use app\models\Share;

class IndexController extends Controller
{

  public function actionIndex()
  {
      $this->redirect('site/index');
  }


}

