<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSubKriteriaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-sub-kriteria-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sub_kriteria') ?>

    <?= $form->field($model, 'id_kriteria') ?>

    <?= $form->field($model, 'nm_sub_kriteria') ?>

    <?= $form->field($model, 'bobot_sub_kriteria') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
