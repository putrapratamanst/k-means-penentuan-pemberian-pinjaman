<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblAlternatif */

$this->title = 'Update Tbl Alternatif: ' . $model->id_alternatif;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Alternatifs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_alternatif, 'url' => ['view', 'id' => $model->id_alternatif]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-alternatif-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
