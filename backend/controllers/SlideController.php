<?php

namespace backend\controllers;

use common\models\hinhanhslide;
use Yii;
use common\models\slide;
use common\models\SlideSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * SlideController implements the CRUD actions for slide model.
 */
class SlideController extends Controller
{
     public function behaviors()
    {
        return [
         'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all slide models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlideSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single slide model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $slide = new hinhanhslide();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'slide'=>$slide
        ]);
    }

    /**
     * Creates a new slide model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new slide();
        $slide = new hinhanhslide();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'slide'=>$slide,
            ]);
        }
    }

    /**
     * Updates an existing slide model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $slide = new hinhanhslide();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'slide'=>$slide,
            ]);
        }
    }

    /**
     * Deletes an existing slide model.
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
     * Finds the slide model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return slide the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = slide::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDeleteimage($id,$slide_id)
    {
       if (isset($id)&&isset($slide_id)&&is_numeric($id)&&is_numeric($slide_id))
       {
            $hinhanh = new hinhanhslide();
            $anh = $hinhanh->findOne(['id'=>$id,'slide_id'=>$slide_id]);
            if ($anh)
            {
                if (file_exists($anh->path))
                    unlink($anh->path);
                $hinhanh->deleteAll(['id'=>$id,'slide_id'=>$slide_id]);
            }
       }
        return $this->redirect(['update', 'id' => $slide_id]);
    }
}
