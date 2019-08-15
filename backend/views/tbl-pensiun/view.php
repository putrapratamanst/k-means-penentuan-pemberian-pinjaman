<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPensiun */

$this->title = $model->id_pensiun;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Pensiuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-pensiun-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id_pensiun], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pensiun], [
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
            'id_pensiun',
            'no_pensiun',
            'nm_pensiun',
            'ktp_pensiun',
            'kk_pensiun',
            'tgl_pensiun',
            'tempat_lahir',
            'tanggal_lahir',
            'almt_pensiun',
            'notelp_pensiun',
            'jk_pensiun',
            'status_pensiun',

            [
                'format' => 'raw',
                'attribute' => 'file_kk_pensiun',
                'value' => Html::img($model->photoViewer, ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
            [
                'format' => 'raw',
                'attribute' => 'file_ktp_pensiun',
                'value' => Html::img($model->photoViewerKtp, ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],

        ],
    ]) ?>

</div>
