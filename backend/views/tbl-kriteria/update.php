<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblKriteria */

$this->title = 'Update Tbl Kriteria: ' . $model->id_kriteria;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kriteria, 'url' => ['view', 'id' => $model->id_kriteria]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-kriteria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
