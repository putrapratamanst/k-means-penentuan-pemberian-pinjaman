<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblNilaiAlternatifSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengajuan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-nilai-alternatif-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Pengajuan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_nilai_alternatif',
            'id_alternatif',
            'id_kriteria',
            'id_sub_kriteria',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
