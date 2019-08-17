<?php

namespace backend\controllers;

use Yii;
use backend\models\TblAlternatif;
use backend\models\TblAlternatifSearch;
use backend\models\TblNilaiAlternatif;
use backend\models\TblSubKriteria;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblAlternatifController implements the CRUD actions for TblAlternatif model.
 */
class KmeansController extends Controller
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
     * Lists all TblAlternatif models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $dataPensiun = TblNilaiAlternatif::find()
        //     ->select(
        //         [
        //             'tbl_nilai_alternatif.id_alternatif',
        //             'id_sub_kriteria','id_kriteria','nm_sub_kriteria'   
        //         ]
        //         )
        //     ->joinWith('alternatif.pensiun','kriteria.subKriteria')
        //     ->groupBy([
        //         'tbl_nilai_alternatif.id_alternatif',
        //         'id_sub_kriteria', 'id_kriteria', 'nm_sub_kriteria'
        //     ]);

        $dataPensiun = TblNilaiAlternatif::find()->all();

        $data = [];
        if ($dataPensiun)
        {
            foreach ($dataPensiun as $value) {
                $data = $value;

                $dataSubKriteria = TblSubKriteria::find();
                


                # code...
                // echo"<pre>";die(print_r($data));
            }
        }


        $dataProvider = new ActiveDataProvider([
            'query' => $dataPensiun,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

  }
