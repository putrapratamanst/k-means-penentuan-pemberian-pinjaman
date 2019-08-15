<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblSubKriteriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Sub Kriterias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-sub-kriteria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Sub Kriteria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sub_kriteria',
            'id_kriteria',
            'nm_sub_kriteria',
            'bobot_sub_kriteria',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
