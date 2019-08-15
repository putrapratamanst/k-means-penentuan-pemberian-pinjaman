<?php

use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'level_user')->dropDownList(
        ['Manager Keuangan' => 'Manager Keuangan', 'Petugas Kredit' => 'Petugas Kredit', 'Petugas Kredit' => 'Petugas Kredit']
    ); ?>
    <?= $form->field($model, 'temla_user')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'tangla_user')->widget(
        DatePicker::className(),
        [
            // inline too, not bad
            'inline' => true,
            // modify template for custom rendering
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
    ); ?>

    <?= $form->field($model, 'almt_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notelp_user')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
