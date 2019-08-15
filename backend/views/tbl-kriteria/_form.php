<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblKriteria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-kriteria-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- $form->field($model, 'id_kriteria')->textInput(['maxlength' => true])  -->

    <?= $form->field($model, 'kd_kriteria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_kriteria')->textInput(['maxlength' => true]) ?>

 <!-- $form->field($model, 'bobot_kriteria')->textInput(['maxlength' => true])  -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
