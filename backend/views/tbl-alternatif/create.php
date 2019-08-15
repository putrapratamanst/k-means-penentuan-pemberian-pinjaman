<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblAlternatif */

$this->title = 'Create Tbl Alternatif';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Alternatifs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-alternatif-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
