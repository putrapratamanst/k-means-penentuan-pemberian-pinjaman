<?php

use frontend\models\TblSubKriteria;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pengajuan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pengajuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$subName = TblSubKriteria::find();
?>
<div class="pengajuan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
         <!-- Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])  -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_pensiun',
            'sub1',
            [
                'attribute' => 'sub1',
                // 'value' => function($model) use ($subName)
                // {
                //     $nama = $subName->where(['id_sub_kriteria' => $subName])->one();
                //     die(print_r($nama));
                //     return $nama->nm_sub_kriteria;
                // }
            ],
            'sub2',
            'sub3',
            'sub4',
        ],
    ]) ?>

</div>
