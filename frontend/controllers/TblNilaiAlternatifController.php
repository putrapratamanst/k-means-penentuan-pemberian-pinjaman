<?php

namespace frontend\controllers;

use backend\models\TblKriteria;
use frontend\models\TblAlternatif;
use Yii;
use frontend\models\TblNilaiAlternatif;
use frontend\models\TblNilaiAlternatifSearch;
use frontend\models\TblPensiun;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblNilaiAlternatifController implements the CRUD actions for TblNilaiAlternatif model.
 */
class TblNilaiAlternatifController extends Controller
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
     * Lists all TblNilaiAlternatif models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblNilaiAlternatifSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblNilaiAlternatif model.
     * @param string $id
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
     * Creates a new TblNilaiAlternatif model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblNilaiAlternatif();
        $userName = Yii::$app->user->identity->username;
        $idPensiun = TblAlternatif::find()->select(['id_alternatif'])->where(['nm_alternatif' => $userName])->one();

        $kriteria = TblKriteria::find()->all();

        if ($model->load(Yii::$app->request->post())) {

            $dataTemp = [];
            $array3 = array_combine($model['id_kriteria'], $model['id_sub_kriteria']);


            foreach ($array3 as $key => $valueModel) {
                $save = new TblNilaiAlternatif();
                $dataTemp = 
                [
                    'id_nilai_alternatif' => $model->reformattedNilaiAlternatif(),
                    'id_alternatif' => $idPensiun['id_alternatif'],
                    'id_kriteria' => $key,
                    'id_sub_kriteria' => $valueModel
                ];
                $save->setAttributes($dataTemp);
                $save->save();
            }

            return $this->redirect(['view', 'id' => $save->id_nilai_alternatif]);
        }
        
        return $this->render('create', [
            'model' => $model,
            'kriteria' => $kriteria,
        ]);
    }

    /**
     * Updates an existing TblNilaiAlternatif model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $kriteria = TblKriteria::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_nilai_alternatif]);
        }

        return $this->render('update', [
            'model' => $model,
            'kriteria' => $kriteria,
        ]);
    }

    /**
     * Deletes an existing TblNilaiAlternatif model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblNilaiAlternatif model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TblNilaiAlternatif the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblNilaiAlternatif::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
