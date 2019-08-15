<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblKriteria */

$this->title = $model->id_kriteria;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-kriteria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id_kriteria], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_kriteria], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kriteria',
            'kd_kriteria',
            'nm_kriteria',
        ],
    ]) ?>

    <p>
        <?= Html::a('Tambah Sub Kriteria', ['/tbl-sub-kriteria/create-with-id', 'id_kriteria' => $model->id_kriteria], ['class' => 'btn btn-warning']) ?>

    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'id_sub_kriteria',
            'nm_sub_kriteria',
            'bobot_sub_kriteria',
        // 'role',

        ['class' => 'yii\grid\ActionColumn',
        'buttons' => [
            'lihat' => function ($url, $model, $key) {
                return Html::a(
                    '<span class="glyphicon glyphicon-eye-open"></span>',
                    ['tbl-sub-kriteria/view', 'id' => $model->id_sub_kriteria]);
            },
            'ubah' => function ($url, $model, $key) {
                return Html::a(
                    '<span class="glyphicon glyphicon-pencil"></span>',
                    ['tbl-sub-kriteria/update', 'id' => $model->id_sub_kriteria]);
            },
            'hapus' => function ($url, $model, $key) {
                return Html::a(
                        '<span class="glyphicon glyphicon-trash"></span>',
                    ['tbl-sub-kriteria/delete', 'id' => $model->id_sub_kriteria],
                        [
                            'data' => [
                                'confirm' => 'Apakah Anda yakin ingin menghapus data ini?',
                                'method' => 'post',
                             ]
                        ]);
            },
        ],
        'template' => ' {lihat} {ubah} {hapus}'
        ]
        ],
    ]); ?>

</div>
