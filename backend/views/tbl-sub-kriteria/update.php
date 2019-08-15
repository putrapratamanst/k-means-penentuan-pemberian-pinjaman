<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSubKriteria */

$this->title = 'Update Tbl Sub Kriteria: ' . $model->id_sub_kriteria;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Sub Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sub_kriteria, 'url' => ['view', 'id' => $model->id_sub_kriteria]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-sub-kriteria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
