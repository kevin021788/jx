<?php

namespace app\controllers\bemanage;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

class IndexController extends Controller
{

  public $layout = 'admin';

  public function behaviors()
  {
    return [
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'delete' => ['POST'],
        ],
      ],
    ];
  }

  public function actionIndex()
  {
    return $this->render('index');
  }

}
