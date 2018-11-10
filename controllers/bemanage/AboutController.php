<?php

namespace app\controllers\bemanage;

use app\components\message\Language;
use Yii;
use app\models\About;
use yii\base\ErrorException;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AboutController implements the CRUD actions for About model.
 */
class AboutController extends Controller
{
    public $layout = 'admin';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index'  => ['GET', 'POST'],#列表GET，可编辑列POST
                    'view'   => ['GET'],#查看
                    'create' => ['GET', 'POST'],#创建
                    'update' => ['GET', 'PUT', 'POST'],#修改
                    'delete' => ['POST', 'DELETE'],#单一删除
                    'change-status' => ['POST'],#批量修改状态
                    'image-delete' => ['POST'],#多图片的删除
                    'delete-all' => ['POST'],#批量删除
                ],
            ],
        ];
    }
    public function actions()
    {
        return [
            'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
                'config' => getUEditorConfig(),
            ]
        ];
    }

    /**
     * Lists all About models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect(['update', 'id' => Language::getLanguageNum()]);
    }

    /**
     * Displays a single About model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new About model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new About();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing About model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param $id
     * @return string|\yii\web\Response
     * @throws ErrorException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            //保存图片
            $image = UploadedFile::getInstance($model, 'imgUrl');
            if(isset($image)) {
                $ext = $type = substr(strrchr($image->name, '.'), 1);
                $model->imgUrl = Yii::$app->params['uploadAboutPath'] . date('YmdHis', time()).mt_rand(1000,9999).".{$ext}";
                $path = '.' . $model->imgUrl;
            } else {
                //编辑时图片没变化，保留原图
                unset($model->imgUrl);
            }
            if($model->save()){
                if(isset($image) && isset($path)) {
                    $image->saveAs($path);
                }
                return $this->redirect(['update', 'id' => $id]);
            } else {
                throw new ErrorException('The modify does not save. ');
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing About model.
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
     * Finds the About model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return About the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = About::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
