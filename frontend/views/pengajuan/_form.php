<?php

use frontend\models\TblPensiun;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pengajuan */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="pengajuan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pensiun')->textInput(['readOnly' => true, 'maxlength' => true]) ?>

    <?= $form->field($model, 'sub1')->dropDownList($sub1) ?>

    <?= $form->field($model, 'sub2')->textInput(['readOnly' => true, 'value' => $dataUmur]) ?>

    <?= $form->field($model, 'sub3')->dropDownList($sub3) ?>

    <?= $form->field($model, 'sub4')->dropDownList($sub4) ?>

    <div class="form-group">
        <center> <?= Html::a('Kembali',['/site/index'], ['class' => 'btn btn-default']) ?>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?></center>
    </div>

    <?php ActiveForm::end(); ?>

</div>
