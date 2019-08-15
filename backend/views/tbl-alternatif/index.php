<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblAlternatifSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Alternatifs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-alternatif-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Alternatif', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_alternatif',
            'id_pensiun',
            'kd_alternatif',
            'nm_alternatif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
