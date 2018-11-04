<?php

namespace app\controllers\bemanage;

use Yii;
use app\models\Upload;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Uploadedfile;

class UploadController extends Controller
{

  public $enableCsrfValidation = false;

  public $layout = 'admin';

  public function behaviors()
  {
      return [
          'verbs' => [
              'class' => VerbFilter::className(),
              'actions' => [
                  'delete' => ['post'],
              ],
          ],
      ];
  }

  public function actionImage()
  {
    $model = new Upload;

    if (Yii::$app->request->isPost) {
      // $model->file = UploadedFile::getInstance($model, 'file');
      $tests = Yii::$app->request->post();
      if(isset($tests)) {
        print_r($tests);
        echo 'ok';
      } else {
        echo 'no';
      }
      return;
      if ($model->validate()) {
        $model->file->saveAs('.'.Yii::$app->params['uploadNewsPath'] . $model->file->baseName . '.' . $model->file->extension);
      }
    }
  }

  public function actionFile()
  {

  }

  public function actionDeletePic()
  {
    $filename = $_POST['key'];
    $type = $_POST['type'];
    unlink(realpath('.').'/upload/'.$type.'/'.$filename);
  }

}
