<?php

use backend\models\TblPensiun;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\TblAlternatif */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-alternatif-form">

<?php 
$dataPensiun = TblPensiun::find()->all();
$listData = ArrayHelper::map($dataPensiun, 'id_pensiun', 'id_pensiun');

?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pensiun')->dropDownList($listData) ?>

    <?= $form->field($model, 'kd_alternatif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_alternatif')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
