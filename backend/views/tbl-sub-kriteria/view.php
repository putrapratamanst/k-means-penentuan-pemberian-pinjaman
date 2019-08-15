<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSubKriteria */

$this->title = $model->id_sub_kriteria;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Sub Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-sub-kriteria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kembali', ['/tbl-kriteria/view', 'id' => $model->id_kriteria], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id_sub_kriteria], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_sub_kriteria], [
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
            'id_sub_kriteria',
            'id_kriteria',
            'nm_sub_kriteria',
            'bobot_sub_kriteria',
        ],
    ]) ?>

</div>
