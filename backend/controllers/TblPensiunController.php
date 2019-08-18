<?php

namespace backend\controllers;

use backend\models\TblAlternatif;
use Yii;
use backend\models\TblPensiun;
use backend\models\TblPensiunSearch;
use common\models\User;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblPensiunController implements the CRUD actions for TblPensiun model.
 */
class TblPensiunController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['*'],
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblPensiun models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblPensiunSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPensiun model.
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
     * Creates a new TblPensiun model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblPensiun();
        $model->id_pensiun = $model->reformattedPensiun();

        if ($model->load(Yii::$app->request->post())) {
            $model->file_kk_pensiun = $model->upload($model, 'file_kk_pensiun');
            $model->file_ktp_pensiun = $model->uploadKtp($model, 'file_ktp_pensiun');
            $model->tgl_pensiun = date('Y-m-d', strtotime($model->tgl_pensiun));
            $model->tanggal_lahir = date('Y-m-d', strtotime($model->tanggal_lahir));

            $user = new User();
            $user->username = $model->nm_pensiun;
            $user->email = $model->nm_pensiun. "@mailinator.com";
            $user->setPassword($model->nm_pensiun);
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();
            $user->save();

            $alternatif = new TblAlternatif();
            $alternatif->id_alternatif = $alternatif->reformattedAlternatif();
            $alternatif->id_pensiun = $model->id_pensiun;
            $alternatif->nm_alternatif = $model->nm_pensiun;
            $alternatif->kd_alternatif = $alternatif->reformattedKodeAlternatif();
            $alternatif->save();

            $model->save();

            return $this->redirect(['view', 'id' => $model->id_pensiun]);
            // return $this->render('create', [
            //     'model' => $model,
            // ]);

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblPensiun model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->file_kk_pensiun = $model->upload($model, 'file_kk_pensiun');
            $model->file_ktp_pensiun = $model->uploadKtp($model, 'file_ktp_pensiun');
            $model->tgl_pensiun = date('Y-m-d', strtotime($model->tgl_pensiun));
            $model->tanggal_lahir = date('Y-m-d', strtotime($model->tanggal_lahir));
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_pensiun]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDiterima($id)
    {
        $model = $this->findModel($id);
        $model->status_pensiun = "Diterima";
        $model->save();
        return $this->redirect('/pengajuan/tree-result');

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionPengajuan($id)
    {
        $model = $this->findModel($id);
        $model->status_pensiun = "Pengajuan";
        $model->save();
        return $this->redirect('/pengajuan/tree-result');

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblPensiun model.
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
     * Finds the TblPensiun model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TblPensiun the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblPensiun::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
