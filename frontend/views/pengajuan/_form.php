<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pengajuan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengajuan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pensiun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub1')->dropDownList($sub1) ?>

    <?= $form->field($model, 'sub2')->dropDownList($sub2) ?>

    <?= $form->field($model, 'sub3')->dropDownList($sub3) ?>

    <?= $form->field($model, 'sub4')->dropDownList($sub4) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
