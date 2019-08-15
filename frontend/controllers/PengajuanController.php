<?php

namespace frontend\controllers;

use backend\models\TblAlternatif;
use backend\models\TblSubKriteria;
use Yii;
use frontend\models\Pengajuan;
use frontend\models\PengajuanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * PengajuanController implements the CRUD actions for Pengajuan model.
 */
class PengajuanController extends Controller
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * Lists all Pengajuan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PengajuanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengajuan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pengajuan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pengajuan();
        $userName = Yii::$app->user->identity->username;
        $idPensiun = TblAlternatif::find()->select(['id_alternatif'])->where(['nm_alternatif' => $userName])->one();
        $model->id_pensiun = $idPensiun;

        $dataSub1 = TblSubKriteria::find()->where(['id_kriteria' => "KR-00001"])->all();
        $sub1     = ArrayHelper::map($dataSub1, 'id_sub_kriteria', 'nm_sub_kriteria');

        $dataSub2 = TblSubKriteria::find()->where(['id_kriteria' => "KR-00002"])->all();
        $sub2     = ArrayHelper::map($dataSub2, 'id_sub_kriteria', 'nm_sub_kriteria');

        $dataSub3 = TblSubKriteria::find()->where(['id_kriteria' => "KR-00003"])->all();
        $sub3     = ArrayHelper::map($dataSub3, 'id_sub_kriteria', 'nm_sub_kriteria');

        $dataSub4 = TblSubKriteria::find()->where(['id_kriteria' => "KR-00004"])->all();
        $sub4     = ArrayHelper::map($dataSub4, 'id_sub_kriteria', 'nm_sub_kriteria');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'sub1' => $sub1,
            'sub2' => $sub2,
            'sub3' => $sub3,
            'sub4' => $sub4,
        ]);
    }

    /**
     * Updates an existing Pengajuan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $dataSub1 = TblSubKriteria::find()->where(['id_kriteria' => "KR-00001"])->all();
        $sub1     = ArrayHelper::map($dataSub1, 'id_sub_kriteria', 'nm_sub_kriteria');

        $dataSub2 = TblSubKriteria::find()->where(['id_kriteria' => "KR-00002"])->all();
        $sub2     = ArrayHelper::map($dataSub2, 'id_sub_kriteria', 'nm_sub_kriteria');

        $dataSub3 = TblSubKriteria::find()->where(['id_kriteria' => "KR-00003"])->all();
        $sub3     = ArrayHelper::map($dataSub3, 'id_sub_kriteria', 'nm_sub_kriteria');

        $dataSub4 = TblSubKriteria::find()->where(['id_kriteria' => "KR-00004"])->all();
        $sub4     = ArrayHelper::map($dataSub4, 'id_sub_kriteria', 'nm_sub_kriteria');


        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'sub1' => $sub1,
            'sub2' => $sub2,
            'sub3' => $sub3,
            'sub4' => $sub4,
        ]);
    }

    /**
     * Deletes an existing Pengajuan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pengajuan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pengajuan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pengajuan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
