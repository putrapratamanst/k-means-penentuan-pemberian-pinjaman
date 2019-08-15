<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSubKriteria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-sub-kriteria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_sub_kriteria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bobot_sub_kriteria')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
