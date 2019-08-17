<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pengajuan */

$this->title = 'Create Pengajuan';
$this->params['breadcrumbs'][] = ['label' => 'Pengajuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengajuan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    'sub1' => $sub1,
    'sub2' => $sub2,
    'sub3' => $sub3,
    'sub4' => $sub4,
    'dataUmur' => $dataUmur,
    ]) ?>

</div>
