<?php

namespace backend\controllers;

use Yii;
use backend\models\Pengajuan;
use backend\models\PengajuanSearch;
use yii\data\ArrayDataProvider;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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

    public function actionIndexAwal()
    {
        $searchModel = new PengajuanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index_awal', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexBobot()
    {
        $searchModel = new PengajuanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index_bobot', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionKlustering()
    {
        $searchModel = new PengajuanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $sqlGetData =
            "
            SELECT 
                pengajuan.id, b.bobot_sub_kriteria as penghasilan, c.bobot_sub_kriteria as usia, 
                d.bobot_sub_kriteria as besar_pinjaman, e.bobot_sub_kriteria as jangka_waktu,
                sum(b.bobot_sub_kriteria + c.bobot_sub_kriteria + d.bobot_sub_kriteria + e.bobot_sub_kriteria) as total
            FROM
                pengajuan
                    JOIN
                tbl_sub_kriteria b ON pengajuan.sub1 = b.id_sub_kriteria
                    JOIN
                tbl_sub_kriteria c ON pengajuan.sub2 = c.id_sub_kriteria
                JOIN
                tbl_sub_kriteria d ON pengajuan.sub3 = d.id_sub_kriteria
                JOIN
                tbl_sub_kriteria e ON pengajuan.sub4 = e.id_sub_kriteria
                 JOIN
                tbl_pensiun f ON pengajuan.id_pensiun = f.id_pensiun
                
                where status_pensiun = 'Diterima'
                group by pengajuan.id";
                
            $data = Yii::$app->db->createCommand($sqlGetData)->queryAll();

            $dataArrayMax = [];
            $dataArrayMin = [];
            foreach ($data as $key => $valueData) {
                $tempData[] = $valueData['total'];
            }

            $dataMax =max($tempData);
            $dataMin =min($tempData);

            foreach ($data as $valueDataCentroidAwal) {
                if($valueDataCentroidAwal['total'] == $dataMax)
                {
                    $dataArrayMax = $valueDataCentroidAwal;
                    continue;
                    break;
                }
                if($valueDataCentroidAwal['total'] == $dataMin)
                {
                    $dataArrayMin = $valueDataCentroidAwal;
                    continue;
                    break;
                }
            }
        

        $pengulangan0 = [];
        $sqlGetDataPengulangan0 =
            "
            SELECT 
                pengajuan.id, b.bobot_sub_kriteria as penghasilan, c.bobot_sub_kriteria as usia, 
                d.bobot_sub_kriteria as besar_pinjaman, e.bobot_sub_kriteria as jangka_waktu,
                sum(b.bobot_sub_kriteria + c.bobot_sub_kriteria + d.bobot_sub_kriteria + e.bobot_sub_kriteria) as total
            FROM
                pengajuan
                    JOIN
                tbl_sub_kriteria b ON pengajuan.sub1 = b.id_sub_kriteria
                    JOIN
                tbl_sub_kriteria c ON pengajuan.sub2 = c.id_sub_kriteria
                JOIN
                tbl_sub_kriteria d ON pengajuan.sub3 = d.id_sub_kriteria
                JOIN
                tbl_sub_kriteria e ON pengajuan.sub4 = e.id_sub_kriteria
                 JOIN
                tbl_pensiun f ON pengajuan.id_pensiun = f.id_pensiun
                
                where status_pensiun = 'Diterima'
                group by pengajuan.id";

        $DataPengulangan0 = Yii::$app->db->createCommand($sqlGetDataPengulangan0)->queryAll();
        foreach ($DataPengulangan0 as $key0 => $valueDataPengulangan0) {
            $dc2Pengulangan0 = sqrt(
                    pow(($valueDataPengulangan0['penghasilan'] - $dataArrayMax['penghasilan']), 2) +
                    pow(($valueDataPengulangan0['usia'] - $dataArrayMax['usia']), 2) +
                    pow(($valueDataPengulangan0['besar_pinjaman'] - $dataArrayMax['besar_pinjaman']), 2) +
                    pow(($valueDataPengulangan0['jangka_waktu'] - $dataArrayMax['jangka_waktu']), 2));

            $dc1Pengulangan0 = sqrt(
                pow(($valueDataPengulangan0['penghasilan'] - $dataArrayMin['penghasilan']), 2) +
                    pow(($valueDataPengulangan0['usia'] - $dataArrayMin['usia']), 2) +
                    pow(($valueDataPengulangan0['besar_pinjaman'] - $dataArrayMin['besar_pinjaman']), 2) +
                    pow(($valueDataPengulangan0['jangka_waktu'] - $dataArrayMin['jangka_waktu']), 2)
            );

            $pengulangan0[$key0] = 
            [
                'penghasilan' => $valueDataPengulangan0['penghasilan'],
                'usia' => $valueDataPengulangan0['usia'],
                'besar_pinjaman' => $valueDataPengulangan0['besar_pinjaman'],
                'jangka_waktu' => $valueDataPengulangan0['jangka_waktu'],
                'dc2'=> $dc2Pengulangan0,
                'dc1'=> $dc1Pengulangan0,
                'c1' => $dc2Pengulangan0 > $dc1Pengulangan0 ? "-" : 1,
                'c2' => $dc2Pengulangan0 < $dc1Pengulangan0 ? "-" : 1

            ];
        }

        $provider0 = new ArrayDataProvider([
            'allModels' => $pengulangan0,
            'sort' => [
                'attributes' => ['penghasilan','usia','besar_pinjaman','jangka_waktu','dc2','dc1','c1','c2'],
            ],
        ]);

        $dataMaxPenghasilanPengulangan1 = 0;
        $dataMaxUsiaPengulangan1 = 0;
        $dataMaxBesarPinjamanPengulangan1 = 0;
        $dataMaxJangkaWaktuPengulangan1 = 0;
        $dataMaxPenghasilanPengulangan1ArrayCount = 0;


        $dataMinPenghasilanPengulangan1 = 0;
        $dataMinUsiaPengulangan1 = 0;
        $dataMinBesarPinjamanPengulangan1 = 0;
        $dataMinJangkaWaktuPengulangan1 = 0;
        $dataMinPenghasilanPengulangan1ArrayCount = 0;
        

        foreach ($pengulangan0 as $valueDataPengulangan1) {
            if($valueDataPengulangan1['c1'] == "1")
            {
                $dataMaxPenghasilanPengulangan1 += $valueDataPengulangan1['penghasilan'];
                $dataMaxUsiaPengulangan1 += $valueDataPengulangan1['penghasilan'];
                $dataMaxBesarPinjamanPengulangan1 += $valueDataPengulangan1['penghasilan'];
                $dataMaxJangkaWaktuPengulangan1 += $valueDataPengulangan1['penghasilan'];
                $dataMaxPenghasilanPengulangan1ArrayCount++;
            }
            if($valueDataPengulangan1['c2'] == "1")
            {
                $dataMinPenghasilanPengulangan1 += $valueDataPengulangan1['penghasilan'];
                $dataMinUsiaPengulangan1 += $valueDataPengulangan1['penghasilan'];
                $dataMinBesarPinjamanPengulangan1 += $valueDataPengulangan1['penghasilan'];
                $dataMinJangkaWaktuPengulangan1 += $valueDataPengulangan1['penghasilan'];

                $dataMinPenghasilanPengulangan1ArrayCount++;
            }
            # code...
        }
        
        $maxAveragePengulangan1Penghasilan = $dataMaxPenghasilanPengulangan1 / $dataMaxPenghasilanPengulangan1ArrayCount;
        $maxAveragePengulangan1Usia = $dataMaxUsiaPengulangan1 / $dataMaxPenghasilanPengulangan1ArrayCount;
        $maxAveragePengulangan1BesarPinjaman = $dataMaxBesarPinjamanPengulangan1 / $dataMaxPenghasilanPengulangan1ArrayCount;
        $maxAveragePengulangan1JangkaWaktu = $dataMaxJangkaWaktuPengulangan1 / $dataMaxPenghasilanPengulangan1ArrayCount;


        $minAveragePengulangan1Penghasilan = $dataMinPenghasilanPengulangan1 / $dataMinPenghasilanPengulangan1ArrayCount;
        $minAveragePengulangan1Usia = $dataMinUsiaPengulangan1 / $dataMinPenghasilanPengulangan1ArrayCount;
        $minAveragePengulangan1BesarPinjaman = $dataMinBesarPinjamanPengulangan1 / $dataMinPenghasilanPengulangan1ArrayCount;
        $minAveragePengulangan1JangkaWaktu = $dataMinJangkaWaktuPengulangan1 / $dataMinPenghasilanPengulangan1ArrayCount;
        // die(print_r($maxAveragePengulangan1JangkaWaktu));


        // get the posts in the current page

        // $dataProvider = $searchModel->searchKlustering(Yii::$app->request->queryParams);

        return $this->render('index_klustering', [
            'searchModel' => $searchModel,
            'dataArrayMax' => $dataArrayMax,
            'dataArrayMin' => $dataArrayMin,
            'dataProvider0' => $provider0,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionTree()
    {
        $searchModel = new PengajuanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index_tree', [
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
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
