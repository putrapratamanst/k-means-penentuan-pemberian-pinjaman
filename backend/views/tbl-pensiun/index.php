<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPensiunSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Pensiuns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pensiun-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Pensiun', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pensiun',
            'no_pensiun',
            'nm_pensiun',
            'ktp_pensiun',
            'kk_pensiun',
            [
                'attribute'=> 'tanggal_lahir',
                'label'=>'Umur',
                'value' => function($model)
                {
                    $dateOfBirth = $model->tanggal_lahir;
                    $today = date("Y-m-d");
                    $diff = date_diff(date_create($dateOfBirth), date_create($today));
                    return $diff->format('%y');
                }
            ],
        //'file_ktp_pensiun',
        //'file_kk_pensiun',
        //'tgl_pensiun',
        //'tempat_lahir',
        //'tanggal_lahir',
        //'almt_pensiun',
        //'notelp_pensiun',
        //'jk_pensiun',
        //'status_pensiun',
        // [
        //     'options' => ['style' => 'width:150px;'],
        //     'format' => 'raw',
        //     'attribute' => 'file_ktp_pensiun',
        //     'value' => function ($model) {
        //         return Html::tag('div', '', [
        //             'style' => 'width:150px;height:95px;
        //                   border-top: 10px solid rgba(255, 255, 255, .46);
        //                   background-image:url(' . $model->photoViewer . ');
        //                   background-size: cover;
        //                   background-position:center center;
        //                   background-repeat:no-repeat;
        //                   '
        //         ]);
        //     }
        // ],
        // [
        //     'options' => ['style' => 'width:150px;'],
        //     'format' => 'raw',
        //     'attribute' => 'file_kk_pensiun',
        //     'value' => function ($model) {
        //         return Html::tag('div', '', [
        //             'style' => 'width:150px;height:95px;
        //                   border-top: 10px solid rgba(255, 255, 255, .46);
        //                   background-image:url(' . $model->photoViewerKtp . ');
        //                   background-size: cover;
        //                   background-position:center center;
        //                   background-repeat:no-repeat;
        //                   '
        //         ]);
        //     }
        // ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
