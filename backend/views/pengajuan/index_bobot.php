<?php

use frontend\models\TblAlternatif;
use frontend\models\TblPensiun;
use frontend\models\TblSubKriteria;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PengajuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Bobot';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengajuan-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'id_pensiun',
                'label' => 'id_pensiun',
                'value' => function ($model) {
                    $namaKriteria = TblAlternatif::find()->where(['id_alternatif' => $model->id_pensiun])->one();
                    $namaKriteria = TblPensiun::find()->where(['id_pensiun' => $namaKriteria->id_pensiun])->one();
                    return $namaKriteria->nm_pensiun;
                }
            ],
                

            [
                'attribute' => 'sub1',
                'label'=>'Penghasilan',
                'value'=> function($model)
                {
                    $namaKriteria = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub1])->one();
                    return $namaKriteria->bobot_sub_kriteria;
                }
            ],
            
            [
                'attribute' => 'sub2',
                'label'=>'Penghasilan',
                'value'=> function($model)
                {
                    $namaKriteria = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub2])->one();
                    return $namaKriteria->bobot_sub_kriteria;
                }
            ],
            
            [
                'attribute' => 'sub3',
                'label'=>'Penghasilan',
                'value'=> function($model)
                {
                    $namaKriteria = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub3])->one();
                    return $namaKriteria->bobot_sub_kriteria;
                }
            ],
            
            [
                'attribute' => 'sub4',
                'label'=>'Penghasilan',
                'value'=> function($model)
                {
                    $namaKriteria = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub4])->one();
                    return $namaKriteria->bobot_sub_kriteria;
                }
            ],
         
            [
                'attribute' => 'sub4',
                'label'=>'Jumlah',
                'value'=> function($model)
                {
                    $namaKriteria1 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub1])->one();
                    $namaKriteria2 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub2])->one();
                    $namaKriteria3 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub3])->one();
                    $namaKriteria4 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub4])->one();
                    $jumlah = $namaKriteria1->bobot_sub_kriteria + $namaKriteria2->bobot_sub_kriteria + $namaKriteria3->bobot_sub_kriteria + $namaKriteria4->bobot_sub_kriteria;
                    return $jumlah;
                }
            ],
         

        ],
    ]); ?>


</div>
