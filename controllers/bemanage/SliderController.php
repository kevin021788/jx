<?php

namespace app\controllers\bemanage;

use Yii;
use app\models\Slider;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SliderController implements the CRUD actions for slider model.
 */
class SliderController extends Controller
{
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

    /**
     * Lists all slider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Slider::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single slider model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slider;

        if ($model->load(Yii::$app->request->post())) {
          //保存图片
          $image = UploadedFile::getInstance($model, 'imgurl');
          if(isset($image)) {
            $ext = end((explode(".", $image->name)));
            $model->imgurl = Yii::$app->params['uploadSliderPath'] . date('YmdHis', time()).mt_rand(1000,9999).".{$ext}";
            $path = '.' . $model->imgurl;
          }
          if($model->save()){
            if(isset($image) && isset($path)) {
              $image->saveAs($path);
            }
            return $this->redirect(['index']);
          } else {
            // error in saving model
          }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing slider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
          //保存图片
          $image = UploadedFile::getInstance($model, 'imgurl');
          if(isset($image)) {
            $ext = end((explode(".", $image->name)));
            $model->imgurl = Yii::$app->params['uploadSliderPath'] . date('YmdHis', time()).mt_rand(1000,9999).".{$ext}";
            $path = '.' . $model->imgurl;
          } else {
            //编辑时图片没变化，保留原图
            unset($model->imgurl);
          }
          if($model->save()){
            if(isset($image) && isset($path)) {
              $image->saveAs($path);
            }
            return $this->redirect(['index']);
          } else {
            // error in saving model
          }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing slider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return slider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slider::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
