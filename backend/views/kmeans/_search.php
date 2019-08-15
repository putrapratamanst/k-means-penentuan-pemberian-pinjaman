<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblAlternatifSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-alternatif-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_alternatif') ?>

    <?= $form->field($model, 'id_pensiun') ?>

    <?= $form->field($model, 'kd_alternatif') ?>

    <?= $form->field($model, 'nm_alternatif') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
