<?php

use frontend\models\TblAlternatif;
use frontend\models\TblPensiun;
use frontend\models\TblSubKriteria;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PengajuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Decision Tree';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengajuan-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <!-- K=2, Pengulangan 3
    <table style="width:50%">
        <tr>
            <th colspan="5">
                <center> Centroid</center>
            </th>
        </tr>
        <tr>
            <th>
            </th>
            <th>Penghasilan
            </th>
            <th>Usia
            </th>
            <th>Besar Pinjaman
            </th>
            <th>Jangka Waktu

            </th>
        </tr>
        <tr>
            <td>C1</td>
            <td>5
            </td>
            <td>5</td>
            <td>5</td>
            <td>5</td>
        </tr>
        <tr>
            <td>C2</td>
            <td>4.27272727272727

            </td>
            <td>3.43181818181818

            </td>
            <td>4.11363636363636

            </td>
            <td>4
            </td>
        </tr>

    </table> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'id_pensiun',
                'label' => 'id_pensiun',
                'value' => function ($model) {
                    $namaKriteria = TblAlternatif::find()->where(['id_alternatif' => $model->id_pensiun])->one();
                    $namaKriteria = TblPensiun::find()->where(['id_pensiun' => $namaKriteria->id_pensiun])->one();
                    return $namaKriteria->nm_pensiun;
                }
            ],


            [
                'attribute' => 'sub1',
                'label' => 'Penghasilan',
                'value' => function ($model) {
                    $namaKriteria = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub1])->one();
                    return $namaKriteria->bobot_sub_kriteria;
                }
            ],

            [
                'attribute' => 'sub2',
                'label' => 'Penghasilan',
                'value' => function ($model) {
                    $namaKriteria = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub2])->one();
                    return $namaKriteria->bobot_sub_kriteria;
                }
            ],

            [
                'attribute' => 'sub3',
                'label' => 'Penghasilan',
                'value' => function ($model) {
                    $namaKriteria = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub3])->one();
                    return $namaKriteria->bobot_sub_kriteria;
                }
            ],

            [
                'attribute' => 'sub4',
                'label' => 'Penghasilan',
                'value' => function ($model) {
                    $namaKriteria = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub4])->one();
                    return $namaKriteria->bobot_sub_kriteria;
                }
            ],

            [
                'attribute' => 'sub4',
                'label' => 'Jumlah',
                'value' => function ($model) {
                    $namaKriteria1 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub1])->one();
                    $namaKriteria2 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub2])->one();
                    $namaKriteria3 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub3])->one();
                    $namaKriteria4 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub4])->one();
                    $jumlah = $namaKriteria1->bobot_sub_kriteria + $namaKriteria2->bobot_sub_kriteria + $namaKriteria3->bobot_sub_kriteria + $namaKriteria4->bobot_sub_kriteria;
                    return $jumlah;
                }
            ],
            [
                'attribute' => 'sub4',
                'label' => 'DC1',
                'value' => function ($model) {
                    $namaKriteria1 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub1])->one();
                    $namaKriteria2 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub2])->one();
                    $namaKriteria3 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub3])->one();
                    $namaKriteria4 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub4])->one();
                    $jumlah =
                        sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 5), 2)
                            +
                            pow(($namaKriteria2->bobot_sub_kriteria - 5), 2)
                            +
                            pow(($namaKriteria3->bobot_sub_kriteria - 5), 2)
                            +
                            pow(($namaKriteria4->bobot_sub_kriteria - 5), 2));

                    return $jumlah;
                }
            ],

            [
                'attribute' => 'sub4',
                'label' => 'DC2',
                'value' => function ($model) {
                    $namaKriteria1 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub1])->one();
                    $namaKriteria2 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub2])->one();
                    $namaKriteria3 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub3])->one();
                    $namaKriteria4 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub4])->one();
                    $jumlah =
                        sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 4.27272727272727), 2)
                            +
                            pow(($namaKriteria2->bobot_sub_kriteria - 3.43181818181818), 2)
                            +
                            pow(($namaKriteria3->bobot_sub_kriteria - 4.11363636363636), 2)
                            +
                            pow(($namaKriteria4->bobot_sub_kriteria - 4), 2));

                    return $jumlah;
                }
            ],

            [
                'attribute' => 'sub4',
                'label' => 'Layak',
                'value' => function ($model) {
                    $namaKriteria1 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub1])->one();
                    $namaKriteria2 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub2])->one();
                    $namaKriteria3 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub3])->one();
                    $namaKriteria4 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub4])->one();
                    $jumlah1 =
                    sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 5), 2)
                        +
                        pow(($namaKriteria2->bobot_sub_kriteria - 5), 2)
                        +
                        pow(($namaKriteria3->bobot_sub_kriteria - 5), 2)
                        +
                        pow(($namaKriteria4->bobot_sub_kriteria - 5), 2));


                    $jumlah2 =
                    sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 4.27272727272727), 2)
                        +
                        pow(($namaKriteria2->bobot_sub_kriteria - 3.43181818181818), 2)
                        +
                        pow(($namaKriteria3->bobot_sub_kriteria - 4.11363636363636), 2)
                        +
                        pow(($namaKriteria4->bobot_sub_kriteria - 4), 2));


                    if ($jumlah1 < $jumlah2) {
                        return "Layak";
                    } else {
                        return "";
                    }
                }
            ],

            [
                'attribute' => 'sub4',
                'label' => 'Tidak Layak',
                'value' => function ($model) {
                    $namaKriteria1 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub1])->one();
                    $namaKriteria2 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub2])->one();
                    $namaKriteria3 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub3])->one();
                    $namaKriteria4 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub4])->one();
                $jumlah1 =
                    sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 5), 2)
                        +
                        pow(($namaKriteria2->bobot_sub_kriteria - 5), 2)
                        +
                        pow(($namaKriteria3->bobot_sub_kriteria - 5), 2)
                        +
                        pow(($namaKriteria4->bobot_sub_kriteria - 5), 2));


                $jumlah2 =
                    sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 4.27272727272727), 2)
                        +
                        pow(($namaKriteria2->bobot_sub_kriteria - 3.43181818181818), 2)
                        +
                        pow(($namaKriteria3->bobot_sub_kriteria - 4.11363636363636), 2)
                        +
                        pow(($namaKriteria4->bobot_sub_kriteria - 4), 2));

                        
                    if ($jumlah1 > $jumlah2) {
                        return "Layak";
                    } else {
                        return "Tidak Layak";
                    }
                },
            ],
        ],


    ]); ?>



</div>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
        text-align: left;
    }
</style>
