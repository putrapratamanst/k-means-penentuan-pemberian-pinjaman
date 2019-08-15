<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPensiunSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pensiun-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pensiun') ?>

    <?= $form->field($model, 'no_pensiun') ?>

    <?= $form->field($model, 'nm_pensiun') ?>

    <?= $form->field($model, 'ktp_pensiun') ?>

    <?= $form->field($model, 'kk_pensiun') ?>

    <?php // echo $form->field($model, 'file_ktp_pensiun') ?>

    <?php // echo $form->field($model, 'file_kk_pensiun') ?>

    <?php // echo $form->field($model, 'tgl_pensiun') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'almt_pensiun') ?>

    <?php // echo $form->field($model, 'notelp_pensiun') ?>

    <?php // echo $form->field($model, 'jk_pensiun') ?>

    <?php // echo $form->field($model, 'status_pensiun') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
