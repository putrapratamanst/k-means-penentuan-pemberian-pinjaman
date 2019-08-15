<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblAlternatifSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'K-Means';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-alternatif-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_alternatif',
            'alternatif.pensiun.nm_pensiun',
            'id_kriteria',
            'id_sub_kriteria',
            // 'nm_alternatif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
