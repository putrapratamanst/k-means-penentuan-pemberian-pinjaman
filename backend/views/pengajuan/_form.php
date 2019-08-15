<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Pengajuan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengajuan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pensiun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub4')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
