<?php

namespace backend\controllers;

use common\models\hinhanh;
use common\models\tukhoa;
use common\models\tukhoahanghoa;
use Yii;
use sjaakp\taggable\TagSuggestAction;
use common\models\hanghoa;
use common\models\HanghoaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * HanghoaController implements the CRUD actions for hanghoa model.
 */
class HanghoaController extends Controller
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
     * Lists all hanghoa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HanghoaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single hanghoa model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $hinhanh = new hinhanh();
        $tukhoa = new tukhoa();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'hinhanh'=>$hinhanh,
            'tukhoa'=>$tukhoa,
        ]);
    }
    /**
     * Creates a new hanghoa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new hanghoa();
        $hinhanh = new hinhanh();
        $tukhoa = new tukhoa();
        $tukhoas = $tukhoa->find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $data = Yii::$app->request->post();
            if ($data['tukhoa']['tukhoa']!='')
            {
                $tags = [];
                $matukhoa = [];
                $ds = [];
                foreach($tukhoas as $tag)
                {
                    $ds[] = $tag->tukhoa;
                }
                foreach (explode(',',$data['tukhoa']['tukhoa']) as $tentukhoa ) {
                    if (!in_array($tentukhoa,$ds))
                    {
                        $tags[] = $tentukhoa;// lấy từ khóa mới chưa có trong csdl
                    }
                    foreach ($tukhoas as $danhsach)// kiểm tra để lấy ra các mã của các từ khóa đã có trong csdl
                    {
                        if (in_array($tentukhoa,explode(',',$danhsach->tukhoa)))
                        {
                            $matukhoa[] = $danhsach->id;
                        }
                    }
                }
                if (count($tags))// nếu có từ khóa mới thì thêm vào csdl
                {
                    $tukhoa->tukhoa = implode(',',$tags);
                    $tukhoa->save();
                    $matukhoa[] = $tukhoa->id;
                }
                if (count($matukhoa))// nếu cập nhật có từ khóa trong csdl thì lấy mã lưu vào bảng chi tiết từ khóa
                {
                    foreach (array_unique($matukhoa) as $ma)
                    {
                        $tukhoahanghoa = new tukhoahanghoa();
                        $tukhoahanghoa->tukhoa_id = $ma;
                        $tukhoahanghoa->hanghoa_id = $model->id;
                        $tukhoahanghoa->save();
                    }
                }
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'hinhanh'=>$hinhanh,
                'tukhoa'=>$tukhoa,
            ]);
        }
    }
    /**
     * Updates an existing hanghoa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tukhoa = new tukhoa();
        $tukhoahanghoa = new tukhoahanghoa();
        $tukhoahh = $tukhoahanghoa->findAll(['hanghoa_id'=>$id]);
        $danhsachtukhoa = $tukhoa->find()->all();
        $ds = [];
        foreach($danhsachtukhoa as $dstukhoa)
        {
            $ds[] = $dstukhoa->tukhoa;
        }
        $tentutkhoas = [];
        if ($tukhoahh) // Nếu đã có từ khóa
        {
            foreach ($tukhoahh as $t)
            {
                $tentutkhoa = $tukhoa->findOne($t->tukhoa_id);
                $tentutkhoas[] = $tentutkhoa->tukhoa;
            }
            $chuoitukhoa = implode(',',$tentutkhoas);
            $tukhoas = $tukhoa->findOne($tukhoahh[0]->tukhoa_id);
            $tukhoas->tukhoa = $chuoitukhoa;
        }
        $hinhanh = new hinhanh();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $data = Yii::$app->request->post();
            $tukhoahanghoa->deleteAll(['hanghoa_id'=>$id]);
            if ($data['tukhoa']['tukhoa']!='' )
            {
                $tags = [];
                $matukhoa = [];
                foreach (explode(',',$data['tukhoa']['tukhoa']) as $tentukhoa ) {
                    if (!in_array($tentukhoa,explode(',',implode(',',$ds))))
                    {
                        $tags[] = $tentukhoa;// lấy từ khóa mới chưa có trong csdl
                    }
                    foreach ($danhsachtukhoa as $danhsach)// kiểm tra để lấy ra các mã của các từ khóa đã có trong csdl
                    {
                        if (in_array($tentukhoa,explode(',',$danhsach->tukhoa)))
                        {
                            $matukhoa[] = $danhsach->id;
                        }
                    }
                }
                if (count($tags))// nếu có từ khóa mới thì thêm vào csdl
                {
                    $tukhoa->tukhoa = implode(',',$tags);
                    $tukhoa->save();
                    $matukhoa[] = $tukhoa->id;
                }
                if (count($matukhoa))// nếu cập nhật có từ khóa trong csdl thì lấy mã lưu vào bảng chi tiết từ khóa
                {
                    foreach (array_unique($matukhoa) as $ma)
                    {
                        $tukhoahanghoa = new tukhoahanghoa();
                        $tukhoahanghoa->tukhoa_id = $ma;
                        $tukhoahanghoa->hanghoa_id = $model->id;
                        $tukhoahanghoa->save();
                    }
                }
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'hinhanh'=>$hinhanh,
                'tukhoa'=>(isset($tukhoas))?$tukhoas:$tukhoa,
            ]);
        }
    }

    /**
     * Deletes an existing hanghoa model.
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
     * Finds the hanghoa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return hanghoa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = hanghoa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actions()    {
        return [
            'suggest' => [
                'class' => TagSuggestAction::className(),
                'tagClass' => tukhoa::className(),
            ],
        ];
    }
    public function actionDeleteimage($id,$hanghoa_id)
    {
       if (isset($id)&&isset($hanghoa_id)&&is_numeric($id)&&is_numeric($hanghoa_id))
       {
            $hinhanh = new hinhanh();
            $anh = $hinhanh->findOne(['id'=>$id,'hanghoa_id'=>$hanghoa_id]);
            if ($anh)
            {
                if (file_exists($anh->path))
                    unlink($anh->path);
                $hinhanh->deleteAll(['id'=>$id,'hanghoa_id'=>$hanghoa_id]);
            }
       }
        return $this->redirect(['update', 'id' => $hanghoa_id]);
    }

}
