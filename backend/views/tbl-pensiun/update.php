<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPensiun */

$this->title = 'Update Tbl Pensiun: ' . $model->id_pensiun;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Pensiuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pensiun, 'url' => ['view', 'id' => $model->id_pensiun]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-pensiun-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
