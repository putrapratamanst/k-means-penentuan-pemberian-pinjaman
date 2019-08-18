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
        }
        
        $maxAveragePengulangan1Penghasilan = $dataMaxPenghasilanPengulangan1 / $dataMaxPenghasilanPengulangan1ArrayCount;
        $maxAveragePengulangan1Usia = $dataMaxUsiaPengulangan1 / $dataMaxPenghasilanPengulangan1ArrayCount;
        $maxAveragePengulangan1BesarPinjaman = $dataMaxBesarPinjamanPengulangan1 / $dataMaxPenghasilanPengulangan1ArrayCount;
        $maxAveragePengulangan1JangkaWaktu = $dataMaxJangkaWaktuPengulangan1 / $dataMaxPenghasilanPengulangan1ArrayCount;


        $minAveragePengulangan1Penghasilan = $dataMinPenghasilanPengulangan1 / $dataMinPenghasilanPengulangan1ArrayCount;
        $minAveragePengulangan1Usia = $dataMinUsiaPengulangan1 / $dataMinPenghasilanPengulangan1ArrayCount;
        $minAveragePengulangan1BesarPinjaman = $dataMinBesarPinjamanPengulangan1 / $dataMinPenghasilanPengulangan1ArrayCount;
        $minAveragePengulangan1JangkaWaktu = $dataMinJangkaWaktuPengulangan1 / $dataMinPenghasilanPengulangan1ArrayCount;


        $centroidMaxPengulangan1 = 
        [
                'penghasilan' => $maxAveragePengulangan1Penghasilan,
                'usia' => $maxAveragePengulangan1Usia,
                'besar_pinjaman' => $maxAveragePengulangan1BesarPinjaman,
                'jangka_waktu' => $maxAveragePengulangan1JangkaWaktu
        ];

        $centroidMinPengulangan1 = 
        [
                'penghasilan' => $minAveragePengulangan1Penghasilan,
                'usia' => $minAveragePengulangan1Usia,
                'besar_pinjaman' => $minAveragePengulangan1BesarPinjaman,
                'jangka_waktu' => $minAveragePengulangan1JangkaWaktu
        ];

        $pengulangan1 = [];

        foreach ($DataPengulangan0 as $key1 => $valueDataPengulangan0ForData) {
            $dc2Pengulangan1 = sqrt(
                pow(($valueDataPengulangan0ForData['penghasilan'] - $centroidMaxPengulangan1['penghasilan']), 2) +
                    pow(($valueDataPengulangan0ForData['usia'] - $centroidMaxPengulangan1['usia']), 2) +
                    pow(($valueDataPengulangan0ForData['besar_pinjaman'] - $centroidMaxPengulangan1['besar_pinjaman']), 2) +
                    pow(($valueDataPengulangan0ForData['jangka_waktu'] - $centroidMaxPengulangan1['jangka_waktu']), 2)
            );

            $dc1Pengulangan1 = sqrt(
                pow(($valueDataPengulangan0ForData['penghasilan'] - $centroidMinPengulangan1['penghasilan']), 2) +
                    pow(($valueDataPengulangan0ForData['usia'] - $centroidMinPengulangan1['usia']), 2) +
                    pow(($valueDataPengulangan0ForData['besar_pinjaman'] - $centroidMinPengulangan1['besar_pinjaman']), 2) +
                    pow(($valueDataPengulangan0ForData['jangka_waktu'] - $centroidMinPengulangan1['jangka_waktu']), 2)
            );

            $pengulangan1[$key1] =
                [
                    'penghasilan' => $valueDataPengulangan0ForData['penghasilan'],
                    'usia' => $valueDataPengulangan0ForData['usia'],
                    'besar_pinjaman' => $valueDataPengulangan0ForData['besar_pinjaman'],
                    'jangka_waktu' => $valueDataPengulangan0ForData['jangka_waktu'],
                    'dc2' => $dc2Pengulangan1,
                    'dc1' => $dc1Pengulangan1,
                    'c1' => $dc2Pengulangan1 > $dc1Pengulangan1 ? "-" : 1,
                    'c2' => $dc2Pengulangan1 < $dc1Pengulangan1 ? "-" : 1
                ];
        }

        $provider1 = new ArrayDataProvider([
            'allModels' => $pengulangan1,
            'sort' => [
                'attributes' => ['penghasilan', 'usia', 'besar_pinjaman', 'jangka_waktu', 'dc2', 'dc1', 'c1', 'c2'],
            ],
        ]);


        $dataMaxPenghasilanPengulangan2 = 0;
        $dataMaxUsiaPengulangan2 = 0;
        $dataMaxBesarPinjamanPengulangan2 = 0;
        $dataMaxJangkaWaktuPengulangan2 = 0;
        $dataMaxPenghasilanPengulangan2ArrayCount = 0;


        $dataMinPenghasilanPengulangan2 = 0;
        $dataMinUsiaPengulangan2 = 0;
        $dataMinBesarPinjamanPengulangan2 = 0;
        $dataMinJangkaWaktuPengulangan2 = 0;
        $dataMinPenghasilanPengulangan2ArrayCount = 0;


        foreach ($pengulangan1 as $valueDataPengulangan2) {
            if ($valueDataPengulangan2['c1'] == "1") {
                $dataMaxPenghasilanPengulangan2 += $valueDataPengulangan2['penghasilan'];
                $dataMaxUsiaPengulangan2 += $valueDataPengulangan2['penghasilan'];
                $dataMaxBesarPinjamanPengulangan2 += $valueDataPengulangan2['penghasilan'];
                $dataMaxJangkaWaktuPengulangan2 += $valueDataPengulangan2['penghasilan'];
                $dataMaxPenghasilanPengulangan2ArrayCount++;
            }
            if ($valueDataPengulangan2['c2'] == "1") {
                $dataMinPenghasilanPengulangan2 += $valueDataPengulangan2['penghasilan'];
                $dataMinUsiaPengulangan2 += $valueDataPengulangan2['penghasilan'];
                $dataMinBesarPinjamanPengulangan2 += $valueDataPengulangan2['penghasilan'];
                $dataMinJangkaWaktuPengulangan2 += $valueDataPengulangan2['penghasilan'];

                $dataMinPenghasilanPengulangan2ArrayCount++;
            }
        }

        $maxAveragePengulangan2Penghasilan = $dataMaxPenghasilanPengulangan2 / $dataMaxPenghasilanPengulangan2ArrayCount;
        $maxAveragePengulangan2Usia = $dataMaxUsiaPengulangan2 / $dataMaxPenghasilanPengulangan2ArrayCount;
        $maxAveragePengulangan2BesarPinjaman = $dataMaxBesarPinjamanPengulangan2 / $dataMaxPenghasilanPengulangan2ArrayCount;
        $maxAveragePengulangan2JangkaWaktu = $dataMaxJangkaWaktuPengulangan2 / $dataMaxPenghasilanPengulangan2ArrayCount;


        $minAveragePengulangan2Penghasilan = $dataMinPenghasilanPengulangan2 / $dataMinPenghasilanPengulangan2ArrayCount;
        $minAveragePengulangan2Usia = $dataMinUsiaPengulangan2 / $dataMinPenghasilanPengulangan2ArrayCount;
        $minAveragePengulangan2BesarPinjaman = $dataMinBesarPinjamanPengulangan2 / $dataMinPenghasilanPengulangan2ArrayCount;
        $minAveragePengulangan2JangkaWaktu = $dataMinJangkaWaktuPengulangan2 / $dataMinPenghasilanPengulangan2ArrayCount;


        $centroidMaxPengulangan2 =
            [
                'penghasilan' => $maxAveragePengulangan2Penghasilan,
                'usia' => $maxAveragePengulangan2Usia,
                'besar_pinjaman' => $maxAveragePengulangan2BesarPinjaman,
                'jangka_waktu' => $maxAveragePengulangan2JangkaWaktu
            ];

        $centroidMinPengulangan2 =
            [
                'penghasilan' => $minAveragePengulangan2Penghasilan,
                'usia' => $minAveragePengulangan2Usia,
                'besar_pinjaman' => $minAveragePengulangan2BesarPinjaman,
                'jangka_waktu' => $minAveragePengulangan2JangkaWaktu
            ];

        $pengulangan2 = [];

        foreach ($DataPengulangan0 as $key2 => $valueDataPengulangan1ForData) {
            $dc2Pengulangan2 = sqrt(
                pow(($valueDataPengulangan1ForData['penghasilan'] - $centroidMaxPengulangan2['penghasilan']), 2) +
                    pow(($valueDataPengulangan1ForData['usia'] - $centroidMaxPengulangan2['usia']), 2) +
                    pow(($valueDataPengulangan1ForData['besar_pinjaman'] - $centroidMaxPengulangan2['besar_pinjaman']), 2) +
                    pow(($valueDataPengulangan1ForData['jangka_waktu'] - $centroidMaxPengulangan2['jangka_waktu']), 2)
            );

            $dc1Pengulangan2 = sqrt(
                pow(($valueDataPengulangan1ForData['penghasilan'] - $centroidMinPengulangan2['penghasilan']), 2) +
                    pow(($valueDataPengulangan1ForData['usia'] - $centroidMinPengulangan2['usia']), 2) +
                    pow(($valueDataPengulangan1ForData['besar_pinjaman'] - $centroidMinPengulangan2['besar_pinjaman']), 2) +
                    pow(($valueDataPengulangan1ForData['jangka_waktu'] - $centroidMinPengulangan2['jangka_waktu']), 2)
            );

            $pengulangan2[$key2] =
                [
                    'penghasilan' => $valueDataPengulangan1ForData['penghasilan'],
                    'usia' => $valueDataPengulangan1ForData['usia'],
                    'besar_pinjaman' => $valueDataPengulangan1ForData['besar_pinjaman'],
                    'jangka_waktu' => $valueDataPengulangan1ForData['jangka_waktu'],
                    'dc2' => $dc2Pengulangan2,
                    'dc1' => $dc1Pengulangan2,
                    'c1' => $dc2Pengulangan2 > $dc1Pengulangan2 ? "-" : 1,
                    'c2' => $dc2Pengulangan2 < $dc1Pengulangan2 ? "-" : 1
                ];
        }



        $provider2 = new ArrayDataProvider([
            'allModels' => $pengulangan2,
            'sort' => [
                'attributes' => ['penghasilan', 'usia', 'besar_pinjaman', 'jangka_waktu', 'dc2', 'dc1', 'c1', 'c2'],
            ],
        ]);



        $dataMaxPenghasilanPengulangan3 = 0;
        $dataMaxUsiaPengulangan3 = 0;
        $dataMaxBesarPinjamanPengulangan3 = 0;
        $dataMaxJangkaWaktuPengulangan3 = 0;
        $dataMaxPenghasilanPengulangan3ArrayCount = 0;


        $dataMinPenghasilanPengulangan3 = 0;
        $dataMinUsiaPengulangan3 = 0;
        $dataMinBesarPinjamanPengulangan3 = 0;
        $dataMinJangkaWaktuPengulangan3 = 0;
        $dataMinPenghasilanPengulangan3ArrayCount = 0;


        foreach ($pengulangan2 as $valueDataPengulangan3) {
            if ($valueDataPengulangan3['c1'] == "1") {
                $dataMaxPenghasilanPengulangan3 += $valueDataPengulangan3['penghasilan'];
                $dataMaxUsiaPengulangan3 += $valueDataPengulangan3['penghasilan'];
                $dataMaxBesarPinjamanPengulangan3 += $valueDataPengulangan3['penghasilan'];
                $dataMaxJangkaWaktuPengulangan3 += $valueDataPengulangan3['penghasilan'];
                $dataMaxPenghasilanPengulangan3ArrayCount++;
            }
            if ($valueDataPengulangan3['c2'] == "1") {
                $dataMinPenghasilanPengulangan3 += $valueDataPengulangan3['penghasilan'];
                $dataMinUsiaPengulangan3 += $valueDataPengulangan3['penghasilan'];
                $dataMinBesarPinjamanPengulangan3 += $valueDataPengulangan3['penghasilan'];
                $dataMinJangkaWaktuPengulangan3 += $valueDataPengulangan3['penghasilan'];

                $dataMinPenghasilanPengulangan3ArrayCount++;
            }
        }

        $maxAveragePengulangan3Penghasilan = $dataMaxPenghasilanPengulangan3 / $dataMaxPenghasilanPengulangan3ArrayCount;
        $maxAveragePengulangan3Usia = $dataMaxUsiaPengulangan3 / $dataMaxPenghasilanPengulangan3ArrayCount;
        $maxAveragePengulangan3BesarPinjaman = $dataMaxBesarPinjamanPengulangan3 / $dataMaxPenghasilanPengulangan3ArrayCount;
        $maxAveragePengulangan3JangkaWaktu = $dataMaxJangkaWaktuPengulangan3 / $dataMaxPenghasilanPengulangan3ArrayCount;


        $minAveragePengulangan3Penghasilan = $dataMinPenghasilanPengulangan3 / $dataMinPenghasilanPengulangan3ArrayCount;
        $minAveragePengulangan3Usia = $dataMinUsiaPengulangan3 / $dataMinPenghasilanPengulangan3ArrayCount;
        $minAveragePengulangan3BesarPinjaman = $dataMinBesarPinjamanPengulangan3 / $dataMinPenghasilanPengulangan3ArrayCount;
        $minAveragePengulangan3JangkaWaktu = $dataMinJangkaWaktuPengulangan3 / $dataMinPenghasilanPengulangan3ArrayCount;


        $centroidMaxPengulangan3 =
            [
                'penghasilan' => $maxAveragePengulangan3Penghasilan,
                'usia' => $maxAveragePengulangan3Usia,
                'besar_pinjaman' => $maxAveragePengulangan3BesarPinjaman,
                'jangka_waktu' => $maxAveragePengulangan3JangkaWaktu
            ];

        $centroidMinPengulangan3 =
            [
                'penghasilan' => $minAveragePengulangan3Penghasilan,
                'usia' => $minAveragePengulangan3Usia,
                'besar_pinjaman' => $minAveragePengulangan3BesarPinjaman,
                'jangka_waktu' => $minAveragePengulangan3JangkaWaktu
            ];

        $pengulangan3 = [];

        foreach ($DataPengulangan0 as $key3 => $valueDataPengulangan3ForData) {
            $dc2Pengulangan3 = sqrt(
                pow(($valueDataPengulangan3ForData['penghasilan'] - $centroidMaxPengulangan3['penghasilan']), 2) +
                    pow(($valueDataPengulangan3ForData['usia'] - $centroidMaxPengulangan3['usia']), 2) +
                    pow(($valueDataPengulangan3ForData['besar_pinjaman'] - $centroidMaxPengulangan3['besar_pinjaman']), 2) +
                    pow(($valueDataPengulangan3ForData['jangka_waktu'] - $centroidMaxPengulangan3['jangka_waktu']), 2)
            );

            $dc1Pengulangan3 = sqrt(
                pow(($valueDataPengulangan3ForData['penghasilan'] - $centroidMinPengulangan3['penghasilan']), 2) +
                    pow(($valueDataPengulangan3ForData['usia'] - $centroidMinPengulangan3['usia']), 2) +
                    pow(($valueDataPengulangan3ForData['besar_pinjaman'] - $centroidMinPengulangan3['besar_pinjaman']), 2) +
                    pow(($valueDataPengulangan3ForData['jangka_waktu'] - $centroidMinPengulangan3['jangka_waktu']), 2)
            );

            $pengulangan3[$key3] =
                [
                    'penghasilan' => $valueDataPengulangan3ForData['penghasilan'],
                    'usia' => $valueDataPengulangan3ForData['usia'],
                    'besar_pinjaman' => $valueDataPengulangan3ForData['besar_pinjaman'],
                    'jangka_waktu' => $valueDataPengulangan3ForData['jangka_waktu'],
                    'dc2' => $dc2Pengulangan3,
                    'dc1' => $dc1Pengulangan3,
                    'c1' => $dc2Pengulangan3 > $dc1Pengulangan3 ? "-" : 1,
                    'c2' => $dc2Pengulangan3 < $dc1Pengulangan3 ? "-" : 1
                ];
        }



        $provider3 = new ArrayDataProvider([
            'allModels' => $pengulangan3,
            'sort' => [
                'attributes' => ['penghasilan', 'usia', 'besar_pinjaman', 'jangka_waktu', 'dc2', 'dc1', 'c1', 'c2'],
            ],
        ]);


        return $this->render('index_klustering', [
            'searchModel' => $searchModel,
            'dataArrayMax' => $dataArrayMax,
            'dataArrayMin' => $dataArrayMin,
            'dataProvider0' => $provider0,
            'dataProvider1' => $provider1,
            'dataProvider2' => $provider2,
            'dataProvider3' => $provider3,
            'dataProvider' => $dataProvider,
            'centroidMaxPengulangan1' => $centroidMaxPengulangan1,
            'centroidMinPengulangan1' => $centroidMinPengulangan1,
            'centroidMaxPengulangan2' => $centroidMaxPengulangan2,
            'centroidMinPengulangan2' => $centroidMinPengulangan2,
            'centroidMaxPengulangan2' => $centroidMaxPengulangan2,
            'centroidMinPengulangan2' => $centroidMinPengulangan2,
            'centroidMaxPengulangan3' => $centroidMaxPengulangan3,
            'centroidMinPengulangan3' => $centroidMinPengulangan3,
        ]);
    }

    public function actionTree()
    {
        $searchModel = new PengajuanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $sqlGetData =
            "
            SELECT 
                pengajuan.id, pengajuan.id_pensiun, b.bobot_sub_kriteria as penghasilan, c.bobot_sub_kriteria as usia, 
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

        $dataMax = max($tempData);
        $dataMin = min($tempData);

        foreach ($data as $valueDataCentroidAwal) {
            if ($valueDataCentroidAwal['total'] == $dataMax) {
                $dataArrayMax = $valueDataCentroidAwal;
                continue;
                break;
            }
            if ($valueDataCentroidAwal['total'] == $dataMin) {
                $dataArrayMin = $valueDataCentroidAwal;
                continue;
                break;
            }
        }


        $pengulangan0 = [];
        $sqlGetDataPengulangan0 =
            "
            SELECT 
                pengajuan.id,pengajuan.id_pensiun,
                b.bobot_sub_kriteria as penghasilan,
                c.bobot_sub_kriteria as usia, 
                d.bobot_sub_kriteria as besar_pinjaman, 
                e.bobot_sub_kriteria as jangka_waktu,
                b.nm_sub_kriteria as nm_penghasilan,
                c.nm_sub_kriteria as nm_usia, 
                d.nm_sub_kriteria as nm_besar_pinjaman, 
                e.nm_sub_kriteria as nm_jangka_waktu,

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
                    pow(($valueDataPengulangan0['jangka_waktu'] - $dataArrayMax['jangka_waktu']), 2)
            );

            $dc1Pengulangan0 = sqrt(
                pow(($valueDataPengulangan0['penghasilan'] - $dataArrayMin['penghasilan']), 2) +
                    pow(($valueDataPengulangan0['usia'] - $dataArrayMin['usia']), 2) +
                    pow(($valueDataPengulangan0['besar_pinjaman'] - $dataArrayMin['besar_pinjaman']), 2) +
                    pow(($valueDataPengulangan0['jangka_waktu'] - $dataArrayMin['jangka_waktu']), 2)
            );

            $pengulangan0[$key0] =
                [
                    'id_pensiun' => $valueDataPengulangan0['id_pensiun'],
                    'penghasilan' => $valueDataPengulangan0['penghasilan'],
                    'usia' => $valueDataPengulangan0['usia'],
                    'besar_pinjaman' => $valueDataPengulangan0['besar_pinjaman'],
                    'jangka_waktu' => $valueDataPengulangan0['jangka_waktu'],
                    'dc2' => $dc2Pengulangan0,
                    'dc1' => $dc1Pengulangan0,
                    'c1' => $dc2Pengulangan0 > $dc1Pengulangan0 ? "-" : 1,
                    'c2' => $dc2Pengulangan0 < $dc1Pengulangan0 ? "-" : 1
                ];
        }

        $provider0 = new ArrayDataProvider([
            'allModels' => $pengulangan0,
            'sort' => [
                'attributes' => ['penghasilan', 'usia', 'besar_pinjaman', 'jangka_waktu', 'dc2', 'dc1', 'c1', 'c2'],
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
            if ($valueDataPengulangan1['c1'] == "1") {
                $dataMaxPenghasilanPengulangan1 += $valueDataPengulangan1['penghasilan'];
                $dataMaxUsiaPengulangan1 += $valueDataPengulangan1['penghasilan'];
                $dataMaxBesarPinjamanPengulangan1 += $valueDataPengulangan1['penghasilan'];
                $dataMaxJangkaWaktuPengulangan1 += $valueDataPengulangan1['penghasilan'];
                $dataMaxPenghasilanPengulangan1ArrayCount++;
            }
            if ($valueDataPengulangan1['c2'] == "1") {
                $dataMinPenghasilanPengulangan1 += $valueDataPengulangan1['penghasilan'];
                $dataMinUsiaPengulangan1 += $valueDataPengulangan1['penghasilan'];
                $dataMinBesarPinjamanPengulangan1 += $valueDataPengulangan1['penghasilan'];
                $dataMinJangkaWaktuPengulangan1 += $valueDataPengulangan1['penghasilan'];

                $dataMinPenghasilanPengulangan1ArrayCount++;
            }
        }

        $maxAveragePengulangan1Penghasilan = $dataMaxPenghasilanPengulangan1 / $dataMaxPenghasilanPengulangan1ArrayCount;
        $maxAveragePengulangan1Usia = $dataMaxUsiaPengulangan1 / $dataMaxPenghasilanPengulangan1ArrayCount;
        $maxAveragePengulangan1BesarPinjaman = $dataMaxBesarPinjamanPengulangan1 / $dataMaxPenghasilanPengulangan1ArrayCount;
        $maxAveragePengulangan1JangkaWaktu = $dataMaxJangkaWaktuPengulangan1 / $dataMaxPenghasilanPengulangan1ArrayCount;


        $minAveragePengulangan1Penghasilan = $dataMinPenghasilanPengulangan1 / $dataMinPenghasilanPengulangan1ArrayCount;
        $minAveragePengulangan1Usia = $dataMinUsiaPengulangan1 / $dataMinPenghasilanPengulangan1ArrayCount;
        $minAveragePengulangan1BesarPinjaman = $dataMinBesarPinjamanPengulangan1 / $dataMinPenghasilanPengulangan1ArrayCount;
        $minAveragePengulangan1JangkaWaktu = $dataMinJangkaWaktuPengulangan1 / $dataMinPenghasilanPengulangan1ArrayCount;


        $centroidMaxPengulangan1 =
            [
                'penghasilan' => $maxAveragePengulangan1Penghasilan,
                'usia' => $maxAveragePengulangan1Usia,
                'besar_pinjaman' => $maxAveragePengulangan1BesarPinjaman,
                'jangka_waktu' => $maxAveragePengulangan1JangkaWaktu
            ];

        $centroidMinPengulangan1 =
            [
                'penghasilan' => $minAveragePengulangan1Penghasilan,
                'usia' => $minAveragePengulangan1Usia,
                'besar_pinjaman' => $minAveragePengulangan1BesarPinjaman,
                'jangka_waktu' => $minAveragePengulangan1JangkaWaktu
            ];

        $pengulangan1 = [];

        foreach ($DataPengulangan0 as $key1 => $valueDataPengulangan0ForData) {
            $dc2Pengulangan1 = sqrt(
                pow(($valueDataPengulangan0ForData['penghasilan'] - $centroidMaxPengulangan1['penghasilan']), 2) +
                    pow(($valueDataPengulangan0ForData['usia'] - $centroidMaxPengulangan1['usia']), 2) +
                    pow(($valueDataPengulangan0ForData['besar_pinjaman'] - $centroidMaxPengulangan1['besar_pinjaman']), 2) +
                    pow(($valueDataPengulangan0ForData['jangka_waktu'] - $centroidMaxPengulangan1['jangka_waktu']), 2)
            );

            $dc1Pengulangan1 = sqrt(
                pow(($valueDataPengulangan0ForData['penghasilan'] - $centroidMinPengulangan1['penghasilan']), 2) +
                    pow(($valueDataPengulangan0ForData['usia'] - $centroidMinPengulangan1['usia']), 2) +
                    pow(($valueDataPengulangan0ForData['besar_pinjaman'] - $centroidMinPengulangan1['besar_pinjaman']), 2) +
                    pow(($valueDataPengulangan0ForData['jangka_waktu'] - $centroidMinPengulangan1['jangka_waktu']), 2)
            );

            $pengulangan1[$key1] =
                [
                'id_pensiun' => $valueDataPengulangan0ForData['id_pensiun'],
                    'penghasilan' => $valueDataPengulangan0ForData['penghasilan'],
                    'usia' => $valueDataPengulangan0ForData['usia'],
                    'besar_pinjaman' => $valueDataPengulangan0ForData['besar_pinjaman'],
                    'jangka_waktu' => $valueDataPengulangan0ForData['jangka_waktu'],
                    'dc2' => $dc2Pengulangan1,
                    'dc1' => $dc1Pengulangan1,
                    'c1' => $dc2Pengulangan1 > $dc1Pengulangan1 ? "-" : 1,
                    'c2' => $dc2Pengulangan1 < $dc1Pengulangan1 ? "-" : 1
                ];
        }

        $provider1 = new ArrayDataProvider([
            'allModels' => $pengulangan1,
            'sort' => [
                'attributes' => ['penghasilan', 'usia', 'besar_pinjaman', 'jangka_waktu', 'dc2', 'dc1', 'c1', 'c2'],
            ],
        ]);


        $dataMaxPenghasilanPengulangan2 = 0;
        $dataMaxUsiaPengulangan2 = 0;
        $dataMaxBesarPinjamanPengulangan2 = 0;
        $dataMaxJangkaWaktuPengulangan2 = 0;
        $dataMaxPenghasilanPengulangan2ArrayCount = 0;


        $dataMinPenghasilanPengulangan2 = 0;
        $dataMinUsiaPengulangan2 = 0;
        $dataMinBesarPinjamanPengulangan2 = 0;
        $dataMinJangkaWaktuPengulangan2 = 0;
        $dataMinPenghasilanPengulangan2ArrayCount = 0;


        foreach ($pengulangan1 as $valueDataPengulangan2) {
            if ($valueDataPengulangan2['c1'] == "1") {
                $dataMaxPenghasilanPengulangan2 += $valueDataPengulangan2['penghasilan'];
                $dataMaxUsiaPengulangan2 += $valueDataPengulangan2['penghasilan'];
                $dataMaxBesarPinjamanPengulangan2 += $valueDataPengulangan2['penghasilan'];
                $dataMaxJangkaWaktuPengulangan2 += $valueDataPengulangan2['penghasilan'];
                $dataMaxPenghasilanPengulangan2ArrayCount++;
            }
            if ($valueDataPengulangan2['c2'] == "1") {
                $dataMinPenghasilanPengulangan2 += $valueDataPengulangan2['penghasilan'];
                $dataMinUsiaPengulangan2 += $valueDataPengulangan2['penghasilan'];
                $dataMinBesarPinjamanPengulangan2 += $valueDataPengulangan2['penghasilan'];
                $dataMinJangkaWaktuPengulangan2 += $valueDataPengulangan2['penghasilan'];

                $dataMinPenghasilanPengulangan2ArrayCount++;
            }
        }

        $maxAveragePengulangan2Penghasilan = $dataMaxPenghasilanPengulangan2 / $dataMaxPenghasilanPengulangan2ArrayCount;
        $maxAveragePengulangan2Usia = $dataMaxUsiaPengulangan2 / $dataMaxPenghasilanPengulangan2ArrayCount;
        $maxAveragePengulangan2BesarPinjaman = $dataMaxBesarPinjamanPengulangan2 / $dataMaxPenghasilanPengulangan2ArrayCount;
        $maxAveragePengulangan2JangkaWaktu = $dataMaxJangkaWaktuPengulangan2 / $dataMaxPenghasilanPengulangan2ArrayCount;


        $minAveragePengulangan2Penghasilan = $dataMinPenghasilanPengulangan2 / $dataMinPenghasilanPengulangan2ArrayCount;
        $minAveragePengulangan2Usia = $dataMinUsiaPengulangan2 / $dataMinPenghasilanPengulangan2ArrayCount;
        $minAveragePengulangan2BesarPinjaman = $dataMinBesarPinjamanPengulangan2 / $dataMinPenghasilanPengulangan2ArrayCount;
        $minAveragePengulangan2JangkaWaktu = $dataMinJangkaWaktuPengulangan2 / $dataMinPenghasilanPengulangan2ArrayCount;


        $centroidMaxPengulangan2 =
            [
                'penghasilan' => $maxAveragePengulangan2Penghasilan,
                'usia' => $maxAveragePengulangan2Usia,
                'besar_pinjaman' => $maxAveragePengulangan2BesarPinjaman,
                'jangka_waktu' => $maxAveragePengulangan2JangkaWaktu
            ];

        $centroidMinPengulangan2 =
            [
                'penghasilan' => $minAveragePengulangan2Penghasilan,
                'usia' => $minAveragePengulangan2Usia,
                'besar_pinjaman' => $minAveragePengulangan2BesarPinjaman,
                'jangka_waktu' => $minAveragePengulangan2JangkaWaktu
            ];

        $pengulangan2 = [];

        foreach ($DataPengulangan0 as $key2 => $valueDataPengulangan1ForData) {
            $dc2Pengulangan2 = sqrt(
                pow(($valueDataPengulangan1ForData['penghasilan'] - $centroidMaxPengulangan2['penghasilan']), 2) +
                    pow(($valueDataPengulangan1ForData['usia'] - $centroidMaxPengulangan2['usia']), 2) +
                    pow(($valueDataPengulangan1ForData['besar_pinjaman'] - $centroidMaxPengulangan2['besar_pinjaman']), 2) +
                    pow(($valueDataPengulangan1ForData['jangka_waktu'] - $centroidMaxPengulangan2['jangka_waktu']), 2)
            );

            $dc1Pengulangan2 = sqrt(
                pow(($valueDataPengulangan1ForData['penghasilan'] - $centroidMinPengulangan2['penghasilan']), 2) +
                    pow(($valueDataPengulangan1ForData['usia'] - $centroidMinPengulangan2['usia']), 2) +
                    pow(($valueDataPengulangan1ForData['besar_pinjaman'] - $centroidMinPengulangan2['besar_pinjaman']), 2) +
                    pow(($valueDataPengulangan1ForData['jangka_waktu'] - $centroidMinPengulangan2['jangka_waktu']), 2)
            );

            $pengulangan2[$key2] =
                [
                    'id_pensiun' => $valueDataPengulangan1ForData['id_pensiun'],
                    'penghasilan' => $valueDataPengulangan1ForData['penghasilan'],
                    'usia' => $valueDataPengulangan1ForData['usia'],
                    'besar_pinjaman' => $valueDataPengulangan1ForData['besar_pinjaman'],
                    'jangka_waktu' => $valueDataPengulangan1ForData['jangka_waktu'],
                    'dc2' => $dc2Pengulangan2,
                    'dc1' => $dc1Pengulangan2,
                    'c1' => $dc2Pengulangan2 > $dc1Pengulangan2 ? "-" : 1,
                    'c2' => $dc2Pengulangan2 < $dc1Pengulangan2 ? "-" : 1
                ];
        }



        $provider2 = new ArrayDataProvider([
            'allModels' => $pengulangan2,
            'sort' => [
                'attributes' => ['penghasilan', 'usia', 'besar_pinjaman', 'jangka_waktu', 'dc2', 'dc1', 'c1', 'c2'],
            ],
        ]);



        $dataMaxPenghasilanPengulangan3 = 0;
        $dataMaxUsiaPengulangan3 = 0;
        $dataMaxBesarPinjamanPengulangan3 = 0;
        $dataMaxJangkaWaktuPengulangan3 = 0;
        $dataMaxPenghasilanPengulangan3ArrayCount = 0;


        $dataMinPenghasilanPengulangan3 = 0;
        $dataMinUsiaPengulangan3 = 0;
        $dataMinBesarPinjamanPengulangan3 = 0;
        $dataMinJangkaWaktuPengulangan3 = 0;
        $dataMinPenghasilanPengulangan3ArrayCount = 0;


        foreach ($pengulangan2 as $valueDataPengulangan3) {
            if ($valueDataPengulangan3['c1'] == "1") {
                $dataMaxPenghasilanPengulangan3 += $valueDataPengulangan3['penghasilan'];
                $dataMaxUsiaPengulangan3 += $valueDataPengulangan3['penghasilan'];
                $dataMaxBesarPinjamanPengulangan3 += $valueDataPengulangan3['penghasilan'];
                $dataMaxJangkaWaktuPengulangan3 += $valueDataPengulangan3['penghasilan'];
                $dataMaxPenghasilanPengulangan3ArrayCount++;
            }
            if ($valueDataPengulangan3['c2'] == "1") {
                $dataMinPenghasilanPengulangan3 += $valueDataPengulangan3['penghasilan'];
                $dataMinUsiaPengulangan3 += $valueDataPengulangan3['penghasilan'];
                $dataMinBesarPinjamanPengulangan3 += $valueDataPengulangan3['penghasilan'];
                $dataMinJangkaWaktuPengulangan3 += $valueDataPengulangan3['penghasilan'];

                $dataMinPenghasilanPengulangan3ArrayCount++;
            }
        }

        $maxAveragePengulangan3Penghasilan = $dataMaxPenghasilanPengulangan3 / $dataMaxPenghasilanPengulangan3ArrayCount;
        $maxAveragePengulangan3Usia = $dataMaxUsiaPengulangan3 / $dataMaxPenghasilanPengulangan3ArrayCount;
        $maxAveragePengulangan3BesarPinjaman = $dataMaxBesarPinjamanPengulangan3 / $dataMaxPenghasilanPengulangan3ArrayCount;
        $maxAveragePengulangan3JangkaWaktu = $dataMaxJangkaWaktuPengulangan3 / $dataMaxPenghasilanPengulangan3ArrayCount;


        $minAveragePengulangan3Penghasilan = $dataMinPenghasilanPengulangan3 / $dataMinPenghasilanPengulangan3ArrayCount;
        $minAveragePengulangan3Usia = $dataMinUsiaPengulangan3 / $dataMinPenghasilanPengulangan3ArrayCount;
        $minAveragePengulangan3BesarPinjaman = $dataMinBesarPinjamanPengulangan3 / $dataMinPenghasilanPengulangan3ArrayCount;
        $minAveragePengulangan3JangkaWaktu = $dataMinJangkaWaktuPengulangan3 / $dataMinPenghasilanPengulangan3ArrayCount;


        $centroidMaxPengulangan3 =
            [
                'penghasilan' => $maxAveragePengulangan3Penghasilan,
                'usia' => $maxAveragePengulangan3Usia,
                'besar_pinjaman' => $maxAveragePengulangan3BesarPinjaman,
                'jangka_waktu' => $maxAveragePengulangan3JangkaWaktu
            ];

        $centroidMinPengulangan3 =
            [
                'penghasilan' => $minAveragePengulangan3Penghasilan,
                'usia' => $minAveragePengulangan3Usia,
                'besar_pinjaman' => $minAveragePengulangan3BesarPinjaman,
                'jangka_waktu' => $minAveragePengulangan3JangkaWaktu
            ];

        $pengulangan3 = [];

        foreach ($DataPengulangan0 as $key3 => $valueDataPengulangan3ForData) {
            $dc2Pengulangan3 = sqrt(
                pow(($valueDataPengulangan3ForData['penghasilan'] - $centroidMaxPengulangan3['penghasilan']), 2) +
                    pow(($valueDataPengulangan3ForData['usia'] - $centroidMaxPengulangan3['usia']), 2) +
                    pow(($valueDataPengulangan3ForData['besar_pinjaman'] - $centroidMaxPengulangan3['besar_pinjaman']), 2) +
                    pow(($valueDataPengulangan3ForData['jangka_waktu'] - $centroidMaxPengulangan3['jangka_waktu']), 2)
            );

            $dc1Pengulangan3 = sqrt(
                pow(($valueDataPengulangan3ForData['penghasilan'] - $centroidMinPengulangan3['penghasilan']), 2) +
                    pow(($valueDataPengulangan3ForData['usia'] - $centroidMinPengulangan3['usia']), 2) +
                    pow(($valueDataPengulangan3ForData['besar_pinjaman'] - $centroidMinPengulangan3['besar_pinjaman']), 2) +
                    pow(($valueDataPengulangan3ForData['jangka_waktu'] - $centroidMinPengulangan3['jangka_waktu']), 2)
            );

            $pengulangan3[$key3] =
                [
                    'id_pensiun' => $valueDataPengulangan3ForData['id_pensiun'],
                    'penghasilan' => $valueDataPengulangan3ForData['penghasilan'],
                    'usia' => $valueDataPengulangan3ForData['usia'],
                    'besar_pinjaman' => $valueDataPengulangan3ForData['besar_pinjaman'],
                    'jangka_waktu' => $valueDataPengulangan3ForData['jangka_waktu'],
                    'nm_penghasilan' => $valueDataPengulangan3ForData['nm_penghasilan'],
                    'nm_usia' => $valueDataPengulangan3ForData['nm_usia'],
                    'nm_besar_pinjaman' => $valueDataPengulangan3ForData['nm_besar_pinjaman'],
                    'nm_jangka_waktu' => $valueDataPengulangan3ForData['nm_jangka_waktu'],
                    'dc2' => $dc2Pengulangan3,
                    'dc1' => $dc1Pengulangan3,
                    'c1' => $dc2Pengulangan3 > $dc1Pengulangan3 ? "-" : 1,
                    'c2' => $dc2Pengulangan3 < $dc1Pengulangan3 ? "-" : 1
                ];
        }


        $newPengulangan3 = [];
        foreach ($pengulangan3 as $keyTree => $valueDecisionTree) {
            if($valueDecisionTree['c1'] != 1)
            {
                unset($valueDecisionTree);
                continue;
            } else {
                $newPengulangan3[] = $valueDecisionTree;
            }
        }

        $resultDecisionTree = [];
        foreach ($newPengulangan3 as $valueDecisionTreeResult) {
            if ($valueDecisionTreeResult['nm_penghasilan'] == "4 < × =< 6 juta")
            {
                if($valueDecisionTreeResult['nm_besar_pinjaman'] == "50000000")
                {
                    if($valueDecisionTreeResult['nm_usia'] == "57")
                    {
                        if($valueDecisionTreeResult['nm_jangka_waktu'] == "1 tahun")
                        {
                            $resultDecisionTree[] = $valueDecisionTreeResult;
                        }
                    }
                }
            }
        }


        $provider3 = new ArrayDataProvider([
            'allModels' => $resultDecisionTree,
            'sort' => [
                'attributes' => ['nm_penghasilan','nm_usia','nm_besar_pinjaman','nm_jangka_waktu','id_pensiun','penghasilan', 'usia', 'besar_pinjaman', 'jangka_waktu', 'dc2', 'dc1', 'c1', 'c2'],
            ],
        ]);

        return $this->render('index_tree', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProvider3' => $provider3,
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
