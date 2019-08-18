<?php

use frontend\models\TblAlternatif;
use frontend\models\TblPensiun;
use frontend\models\TblSubKriteria;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PengajuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Decision Tree';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengajuan-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider3,
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
