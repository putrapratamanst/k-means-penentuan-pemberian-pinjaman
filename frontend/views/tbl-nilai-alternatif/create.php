<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblNilaiAlternatif */

$this->title = 'Pengajuan';
$this->params['breadcrumbs'][] = ['label' => 'Pengajuan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-nilai-alternatif-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'kriteria' => $kriteria,
    ]) ?>

</div>
