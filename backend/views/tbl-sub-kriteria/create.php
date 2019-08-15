<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSubKriteria */

$this->title = 'Create Tbl Sub Kriteria';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Sub Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-sub-kriteria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
