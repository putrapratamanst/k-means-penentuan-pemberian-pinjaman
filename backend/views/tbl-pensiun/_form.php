<?php

use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPensiun */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pensiun-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <?= $form->field($model, 'no_pensiun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_pensiun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ktp_pensiun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kk_pensiun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_pensiun')->widget(
        DatePicker::className(),
        [
            // inline too, not bad
            'inline' => true,
            // modify template for custom rendering
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]
    ); ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(
        DatePicker::className(),
        [
            // inline too, not bad
            'inline' => true,
            // modify template for custom rendering
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]
    ); ?>

    <?= $form->field($model, 'almt_pensiun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notelp_pensiun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jk_pensiun')->radioList(array('Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan')); ?>

    <?php echo $form->field($model, 'status_pensiun')->dropDownList(
        ['Pengajuan' => 'Pengajuan']
    ); ?>

    <div class="row">
        <div class="col-md-2">
            <div class="well text-center">
                <?= Html::img($model->getPhotoViewer('file_ktp_pensiun',$model->file_ktp_pensiun), ['style' => 'width:100px;', 'class' => 'img-rounded']); ?>
            </div>
        </div>
        <div class="col-md-10">
            <?= $form->field($model, 'file_ktp_pensiun')->fileInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <div class="well text-center">
                <?= Html::img($model->getPhotoViewerKtp('file_kk_pensiun',$model->file_kk_pensiun), ['style' => 'width:100px;', 'class' => 'img-rounded']); ?>
            </div>
        </div>
        <div class="col-md-10">
            <?= $form->field($model, 'file_kk_pensiun')->fileInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
