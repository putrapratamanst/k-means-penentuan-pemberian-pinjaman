<?php

use frontend\models\TblSubKriteria;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pengajuan */

$this->title = Yii::$app->user->identity->username;
$this->params['breadcrumbs'][] = ['label' => 'Pengajuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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
            [
                'attribute' => 'sub1',
                'value' => function($model)
                {
                    $nama = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub1 ])->one();
                    return $nama->nm_sub_kriteria;
                }
            ],
            [
                'attribute' => 'sub2',
                'value' => function($model)
                {
                    $nama = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub2 ])->one();
                    return $nama->nm_sub_kriteria;
                }
            ],
            [
                'attribute' => 'sub3',
                'value' => function($model)
                {
                    $nama = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub3 ])->one();
                    return $nama->nm_sub_kriteria;
                }
            ],
            [
                'attribute' => 'sub4',
                'value' => function($model)
                {
                    $nama = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub4 ])->one();
                    return $nama->nm_sub_kriteria;
                }
            ],
        ],
    ]) ?>

</div>
