<?php

use frontend\models\TblAlternatif;
use frontend\models\TblPensiun;
use frontend\models\TblSubKriteria;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PengajuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Klustering';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengajuan-index">
    <h1><?= Html::encode($this->title) ?></h1>

    K=2
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
            <td><?= $dataArrayMax['penghasilan'] ?></td>
            <td><?= $dataArrayMax['usia'] ?></td>
            <td><?= $dataArrayMax['besar_pinjaman'] ?></td>
            <td><?= $dataArrayMax['jangka_waktu'] ?></td>
        </tr>
        <tr>
            <td>C2</td>
            <td><?= $dataArrayMin['penghasilan'] ?></td>
            <td><?= $dataArrayMin['usia'] ?></td>
            <td><?= $dataArrayMin['besar_pinjaman'] ?></td>
            <td><?= $dataArrayMin['jangka_waktu'] ?></td>
        </tr>

    </table>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider0,
        // 'filterModel' => $searchModel,
        // 'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'penghasilan',
            'usia',
            'besar_pinjaman',
            'jangka_waktu',
            'dc2',
            'dc1',
            'c1',
            'c2',


            // [
            //     'attribute' => 'sub1',
            //     'label' => 'Penghasilan',
            //     'value' => function ($model) {
            //         $namaKriteria = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub1])->one();
            //         return $namaKriteria->bobot_sub_kriteria;
            //     }
            // ],

            // [
            //     'attribute' => 'sub2',
            //     'label' => 'Penghasilan',
            //     'value' => function ($model) {
            //         $namaKriteria = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub2])->one();
            //         return $namaKriteria->bobot_sub_kriteria;
            //     }
            // ],

            // [
            //     'attribute' => 'sub3',
            //     'label' => 'Penghasilan',
            //     'value' => function ($model) {
            //         $namaKriteria = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub3])->one();
            //         return $namaKriteria->bobot_sub_kriteria;
            //     }
            // ],

            // [
            //     'attribute' => 'sub4',
            //     'label' => 'Penghasilan',
            //     'value' => function ($model) {
            //         $namaKriteria = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub4])->one();
            //         return $namaKriteria->bobot_sub_kriteria;
            //     }
            // ],

            // [
            //     'attribute' => 'sub4',
            //     'label' => 'Jumlah',
            //     'value' => function ($model) {
            //         $namaKriteria1 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub1])->one();
            //         $namaKriteria2 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub2])->one();
            //         $namaKriteria3 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub3])->one();
            //         $namaKriteria4 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub4])->one();
            //         $jumlah = $namaKriteria1->bobot_sub_kriteria + $namaKriteria2->bobot_sub_kriteria + $namaKriteria3->bobot_sub_kriteria + $namaKriteria4->bobot_sub_kriteria;
            //         return $jumlah;
            //     }
            // ],
            // [
            //     'attribute' => 'sub4',
            //     'label' => 'DC1',
            //     'value' => function ($model) {
            //         $namaKriteria1 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub1])->one();
            //         $namaKriteria2 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub2])->one();
            //         $namaKriteria3 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub3])->one();
            //         $namaKriteria4 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub4])->one();
            //         $jumlah =
            //             sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 5), 2)
            //                 +
            //                 pow(($namaKriteria2->bobot_sub_kriteria - 5), 2)
            //                 +
            //                 pow(($namaKriteria3->bobot_sub_kriteria - 5), 2)
            //                 +
            //                 pow(($namaKriteria4->bobot_sub_kriteria - 5), 2));

            //         return $jumlah;
            //     }
            // ],

            // [
            //     'attribute' => 'sub4',
            //     'label' => 'DC2',
            //     'value' => function ($model) {
            //         $namaKriteria1 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub1])->one();
            //         $namaKriteria2 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub2])->one();
            //         $namaKriteria3 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub3])->one();
            //         $namaKriteria4 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub4])->one();
            //         $jumlah =
            //             sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 4), 2)
            //                 +
            //                 pow(($namaKriteria2->bobot_sub_kriteria - 3), 2)
            //                 +
            //                 pow(($namaKriteria3->bobot_sub_kriteria - 4), 2)
            //                 +
            //                 pow(($namaKriteria4->bobot_sub_kriteria - 4), 2));

            //         return $jumlah;
            //     }
            // ],

            // [
            //     'attribute' => 'sub4',
            //     'label' => 'Layak',
            //     'value' => function ($model) {
            //         $namaKriteria1 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub1])->one();
            //         $namaKriteria2 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub2])->one();
            //         $namaKriteria3 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub3])->one();
            //         $namaKriteria4 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub4])->one();
            //         $jumlah1 =
            //             sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 5), 2)
            //                 +
            //                 pow(($namaKriteria2->bobot_sub_kriteria - 5), 2)
            //                 +
            //                 pow(($namaKriteria3->bobot_sub_kriteria - 5), 2)
            //                 +
            //                 pow(($namaKriteria4->bobot_sub_kriteria - 5), 2));


            //         $jumlah2 =
            //             sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 4), 2)
            //                 +
            //                 pow(($namaKriteria2->bobot_sub_kriteria - 3), 2)
            //                 +
            //                 pow(($namaKriteria3->bobot_sub_kriteria - 4), 2)
            //                 +
            //                 pow(($namaKriteria4->bobot_sub_kriteria - 4), 2));


            //         if ($jumlah1 < $jumlah2) {
            //             return "1";
            //         } else {
            //             return "";
            //         }
            //     }
            // ],

            // [
            //     'attribute' => 'sub4',
            //     'label' => 'Tidak Layak',
            //     'value' => function ($model) {
            //         $namaKriteria1 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub1])->one();
            //         $namaKriteria2 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub2])->one();
            //         $namaKriteria3 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub3])->one();
            //         $namaKriteria4 = TblSubKriteria::find()->where(['id_sub_kriteria' => $model->sub4])->one();
            //         $jumlah1 =
            //             sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 4), 2)
            //                 +
            //                 pow(($namaKriteria2->bobot_sub_kriteria - 3), 2)
            //                 +
            //                 pow(($namaKriteria3->bobot_sub_kriteria - 4), 2)
            //                 +
            //                 pow(($namaKriteria4->bobot_sub_kriteria - 4), 2));

            //         $jumlah2 =
            //             sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 5), 2)
            //                 +
            //                 pow(($namaKriteria2->bobot_sub_kriteria - 5), 2)
            //                 +
            //                 pow(($namaKriteria3->bobot_sub_kriteria - 5), 2)
            //                 +
            //                 pow(($namaKriteria4->bobot_sub_kriteria - 5), 2));


            //         if ($jumlah1 < $jumlah2) {
            //             return "1";
            //         } else {
            //             return "";
            //         }
            //     }
            // ],

        ],
    ]); ?>

    <br>
    <br>
    <br>
    <br>

    K=2, Pengulangan 1
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
            <td>4.96428571428571
            </td>
            <td>4.96428571428571
            </td>
            <td>4.96428571428571
            </td>
            <td>4.92857142857143
            </td>
        </tr>
        <tr>
            <td>C2</td>
            <td>4.26190476190476
            </td>
            <td>3.38095238095238
            </td>
            <td>4.0952380952381
            </td>
            <td>4.0952380952381
            </td>
        </tr>

    </table>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'id_pensiun',
                'label' => 'id_pensiun',
                // 'value' => function ($model) {
                //     $namaKriteria = TblAlternatif::find()->where(['id_alternatif' => $model->id_pensiun])->one();
                //     $namaKriteria = TblPensiun::find()->where(['id_pensiun' => $namaKriteria->id_pensiun])->one();
                //     return $namaKriteria->nm_pensiun;
                // }
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
                        sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 4.96428571428571), 2)
                            +
                            pow(($namaKriteria2->bobot_sub_kriteria - 4.96428571428571), 2)
                            +
                            pow(($namaKriteria3->bobot_sub_kriteria - 4.96428571428571), 2)
                            +
                            pow(($namaKriteria4->bobot_sub_kriteria - 4.92857142857143), 2));

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
                        sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 4.26190476190476), 2)
                            +
                            pow(($namaKriteria2->bobot_sub_kriteria - 3.38095238095238), 2)
                            +
                            pow(($namaKriteria3->bobot_sub_kriteria - 4.0952380952381), 2)
                            +
                            pow(($namaKriteria4->bobot_sub_kriteria - 4.0952380952381), 2));

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
                        sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 4.96428571428571), 2)
                            +
                            pow(($namaKriteria2->bobot_sub_kriteria - 4.96428571428571), 2)
                            +
                            pow(($namaKriteria3->bobot_sub_kriteria - 4.96428571428571), 2)
                            +
                            pow(($namaKriteria4->bobot_sub_kriteria - 4.92857142857143), 2));


                    $jumlah2 =
                        sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 4.26190476190476), 2)
                            +
                            pow(($namaKriteria2->bobot_sub_kriteria - 3.38095238095238), 2)
                            +
                            pow(($namaKriteria3->bobot_sub_kriteria - 4.0952380952381), 2)
                            +
                            pow(($namaKriteria4->bobot_sub_kriteria - 4.0952380952381), 2));


                    if ($jumlah1 < $jumlah2) {
                        return "1";
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
                        sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 4.96428571428571), 2)
                            +
                            pow(($namaKriteria2->bobot_sub_kriteria - 4.96428571428571), 2)
                            +
                            pow(($namaKriteria3->bobot_sub_kriteria - 4.96428571428571), 2)
                            +
                            pow(($namaKriteria4->bobot_sub_kriteria - 4.92857142857143), 2));


                    $jumlah2 =
                        sqrt(pow(($namaKriteria1->bobot_sub_kriteria - 4.26190476190476), 2)
                            +
                            pow(($namaKriteria2->bobot_sub_kriteria - 3.38095238095238), 2)
                            +
                            pow(($namaKriteria3->bobot_sub_kriteria - 4.0952380952381), 2)
                            +
                            pow(($namaKriteria4->bobot_sub_kriteria - 4.0952380952381), 2));



                    if ($jumlah1 > $jumlah2) {
                        return "1";
                    } else {
                        return "";
                    }
                }
            ],

        ],
    ]); ?>


    <br>
    <br>
    <br>
    <br>
    <br>

    K=2, Pengulangan 2
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

    </table>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'id_pensiun',
                'label' => 'id_pensiun',
                // 'value' => function ($model) {
                //     $namaKriteria = TblAlternatif::find()->where(['id_alternatif' => $model->id_pensiun])->one();
                //     $namaKriteria = TblPensiun::find()->where(['id_pensiun' => $namaKriteria->id_pensiun])->one();
                //     return $namaKriteria->nm_pensiun;
                // }
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
                        return "1";
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
                        return "1";
                    } else {
                        return "";
                    }
                }
            ],

        ],
    ]); ?>


    <br>
    <br>
    <br>
    <br>
    <br>

    K=2, Pengulangan 3
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

    </table>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'id_pensiun',
                'label' => 'id_pensiun',
                // 'value' => function ($model) {
                //     $namaKriteria = TblAlternatif::find()->where(['id_alternatif' => $model->id_pensiun])->one();
                //     $namaKriteria = TblPensiun::find()->where(['id_pensiun' => $namaKriteria->id_pensiun])->one();
                //     return $namaKriteria->nm_pensiun;
                // }
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
                        return "1";
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
                        return "1";
                    } else {
                        return "";
                    }
                }
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
