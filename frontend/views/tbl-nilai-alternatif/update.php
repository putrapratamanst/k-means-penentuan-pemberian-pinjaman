<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblNilaiAlternatif */

$this->title = 'Update Tbl Nilai Alternatif: ' . $model->id_nilai_alternatif;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Nilai Alternatifs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_nilai_alternatif, 'url' => ['view', 'id' => $model->id_nilai_alternatif]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-nilai-alternatif-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'kriteria' => $kriteria,
    ]) ?>

</div>
