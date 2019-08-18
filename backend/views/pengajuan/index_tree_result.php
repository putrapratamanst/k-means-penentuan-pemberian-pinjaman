<?php

use frontend\models\TblAlternatif;
use frontend\models\TblPensiun;
use frontend\models\TblSubKriteria;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PengajuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Result Decision Tree';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengajuan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider3,
        'summary'=>'',
        // 'filterModel' => $searchModel,
        //  'rowOptions'=>function ($model){
        //      if ($model['c2'] == 1)
        //      {
        //          return 0;
        //      }
        //  },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        'id_pensiun',
            'nm_penghasilan',
            'nm_usia',
            'nm_besar_pinjaman',
            'nm_jangka_waktu',
            [
                'attribute' => 'c1',
                'label' => 'Kelayakan',
                'value' =>function($model)
                {
                    return "Layak";
                }
            ],

        [
            'class' => 'yii\grid\ActionColumn',
            'buttons' => [
                'status' => function ($url, $model, $key) {
                    $dataPensiun = TblPensiun::find()->where(['id_pensiun' => $model['id_pensiun']])->one();
                    if ($dataPensiun->status_pensiun == "Pengajuan") {
                        return Html::a(
                            'Status Pensiun: ' . $dataPensiun->status_pensiun,
                            ['/tbl-pensiun/diterima', 'id' => $model['id_pensiun']],

                            [
                                'class' => 'btn btn-primary',
                                'id' => $model['id_pensiun'],
                                'data' => [
                                    'confirm' => 'Apakah Anda yakin ingin mengubah status pensiun?',
                                    'method' => 'post',
                                ]
                            ]
                        );
                    } else {
                        return Html::a(
                            'Status Pensiun: ' . $dataPensiun->status_pensiun,
                            ['/tbl-pensiun/pengajuan', 'id' => $model['id_pensiun']],

                            [
                                'class' => 'btn btn-danger',
                                'id' => $model['id_pensiun'],
                                'data' => [
                                    'confirm' => 'Apakah Anda yakin ingin mengubah status pensiun?',
                                    'method' => 'post',
                                ]
                            ]
                        );
                    }
                },
            ],
            'template' => '{status}'
        ],        


        ],
    ]); ?>




</div>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
        text-align: left;
    }
</style>
