<?php

use frontend\models\TblSubKriteria;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\TblNilaiAlternatif */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-nilai-alternatif-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        foreach ($kriteria as $key => $value) {

    $a = new ArrayObject($model);
    $b = $a->offsetSet("tempKuisioner" . $key, NULL);
        

        $dataSub = TblSubKriteria::find()->where(['id_kriteria' => $value->id_kriteria])->all();
        $listSub = ArrayHelper::map($dataSub, 'id_sub_kriteria','nm_sub_kriteria');

        echo  $form->field($model, 'id_kriteria[]' .$key)->hiddenInput(['value' => $value->id_kriteria])->label(false); 

        echo  $form->field($model, 'id_sub_kriteria[]'. $key)->dropDownList($listSub)->label($value->nm_kriteria);
    }


?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
