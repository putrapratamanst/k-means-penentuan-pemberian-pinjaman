<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblKriteria */

$this->title = 'Create Tbl Kriteria';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-kriteria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
