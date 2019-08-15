<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'nm_user') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'level_user') ?>

    <?php // echo $form->field($model, 'temla_user') ?>

    <?php // echo $form->field($model, 'tangla_user') ?>

    <?php // echo $form->field($model, 'almt_user') ?>

    <?php // echo $form->field($model, 'notelp_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
