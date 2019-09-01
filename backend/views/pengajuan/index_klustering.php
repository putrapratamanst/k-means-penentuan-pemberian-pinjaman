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
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'penghasilan',
            'usia',
            'besar_pinjaman',
            'jangka_waktu',
            'dc2',
            'dc1',
            [
                'attribute' => 'c1',
                'label' => 'Kelayakan',
                'value'=> function($model)
                {
                    if ($model['c1'] == "-")
                    {
                        return "C2 (Tidak Layak)";
                    } else {
                        return "C1 (Layak)";
                    }
                }
            ],
            // [
            //     'attribute' => 'c2',
            //     'label' => 'C2 (Tidak Layak)',
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
            <td><?= $centroidMaxPengulangan1['penghasilan']; ?> </td>
            <td><?= $centroidMaxPengulangan1['usia']; ?>
            </td>
            <td><?= $centroidMaxPengulangan1['besar_pinjaman']; ?>
            </td>
            <td><?= $centroidMaxPengulangan1['jangka_waktu']; ?>
            </td>
        </tr>
        <tr>
            <td>C2</td>
            <td><?= $centroidMinPengulangan1['penghasilan']; ?> </td>
            <td><?= $centroidMinPengulangan1['usia']; ?>
            </td>
            <td><?= $centroidMinPengulangan1['besar_pinjaman']; ?>
            </td>
            <td><?= $centroidMinPengulangan1['jangka_waktu']; ?>
            </td>
        </tr>

    </table>

    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        // 'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'penghasilan',
            'usia',
            'besar_pinjaman',
            'jangka_waktu',
            'dc2',
            'dc1',
        //             [
        //     'attribute' => 'c1',
        //     'label' => 'C1 (Layak)',
        // ],
        // [
        //     'attribute' => 'c2',
        //     'label' => 'C2 (Tidak Layak)',
        // ],

        [
            'attribute' => 'c1',
            'label' => 'Kelayakan',
            'value' => function ($model) {
                if ($model['c1'] == "-") {
                    return "C2 (Tidak Layak)";
                } else {
                    return "C1 (Layak)";
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
            <td><?= $centroidMaxPengulangan2['penghasilan']; ?> </td>
            <td><?= $centroidMaxPengulangan2['usia']; ?>
            </td>
            <td><?= $centroidMaxPengulangan2['besar_pinjaman']; ?>
            </td>
            <td><?= $centroidMaxPengulangan2['jangka_waktu']; ?>
            </td>
        </tr>
        <tr>
            <td>C2</td>
            <td><?= $centroidMinPengulangan2['penghasilan']; ?> </td>
            <td><?= $centroidMinPengulangan2['usia']; ?>
            </td>
            <td><?= $centroidMinPengulangan2['besar_pinjaman']; ?>
            </td>
            <td><?= $centroidMinPengulangan2['jangka_waktu']; ?>
            </td>
        </tr>

    </table>

    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'penghasilan',
            'usia',
            'besar_pinjaman',
            'jangka_waktu',
            'dc2',
            'dc1',
        //             [
        //     'attribute' => 'c1',
        //     'label' => 'C1 (Layak)',
        // ],
        // [
        //     'attribute' => 'c2',
        //     'label' => 'C2 (Tidak Layak)',
        // ],

        [
            'attribute' => 'c1',
            'label' => 'Kelayakan',
            'value' => function ($model) {
                if ($model['c1'] == "-") {
                    return "C2 (Tidak Layak)";
                } else {
                    return "C1 (Layak)";
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
            <td><?= $centroidMaxPengulangan2['penghasilan']; ?> </td>
            <td><?= $centroidMaxPengulangan2['usia']; ?>
            </td>
            <td><?= $centroidMaxPengulangan2['besar_pinjaman']; ?>
            </td>
            <td><?= $centroidMaxPengulangan2['jangka_waktu']; ?>
            </td>
        </tr>
        <tr>
            <td>C2</td>
            <td><?= $centroidMinPengulangan2['penghasilan']; ?> </td>
            <td><?= $centroidMinPengulangan2['usia']; ?>
            </td>
            <td><?= $centroidMinPengulangan2['besar_pinjaman']; ?>
            </td>
            <td><?= $centroidMinPengulangan2['jangka_waktu']; ?>
            </td>
        </tr>

    </table>

    <?= GridView::widget([
        'dataProvider' => $dataProvider3,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        'penghasilan',
        'usia',
        'besar_pinjaman',
        'jangka_waktu',
        'dc2',
        'dc1',
        //         [
        //     'attribute' => 'c1',
        //     'label' => 'C1 (Layak)',
        // ],
        // [
        //     'attribute' => 'c2',
        //     'label' => 'C2 (Tidak Layak)',
        // ],
        [
            'attribute' => 'c1',
            'label' => 'Kelayakan',
            'value' => function ($model) {
                if ($model['c1'] == "-") {
                    return "C2 (Tidak Layak)";
                } else {
                    return "C1 (Layak)";
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
