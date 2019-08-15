<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php 

?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
    if (Yii::$app->user->identity->username == "admin123")
    {
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            [
                'label' => 'Kelola Data',
                'items' => [
                    ['label' => 'Kelola Pensiun', 'url' => '/tbl-pensiun/index/'],
                    ['label' => 'Kelola User', 'url' => '/tbl-user/index/'],
                ],
            ],
        ];
    }
    if (Yii::$app->user->identity->username == "petkred123") {
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            [
                'label' => 'Kelola K-Means',
                'items' => [
                    ['label' => 'Kelola Data Awal', 'url' => '/pengajuan/index'],
                    ['label' => 'Kelola Bobot', 'url' => '/pengajuan/index-bobot/'],
                    ['label' => 'Kelola Klustering', 'url' => '/pengajuan/klustering/'],
                    ['label' => 'Kelola Decision Tree', 'url' => '/pengajuan/tree/'],
                ],
            ],
            [
                'label' => 'Kelola Data',
                'items' => [
                    ['label' => 'Kelola Kriteria', 'url' => '/tbl-kriteria/index/'],
                    ['label' => 'Kelola Alternatif', 'url' => '/tbl-alternatif/index/'],
                ],
            ],
        ];
    }
    //  else {
    //     $menuItems = [
    //         ['label' => 'Home', 'url' => ['/site/index']],
    //         [
    //             'label' => 'Kelola Data',
    //             'items' => [
    //                 ['label' => 'Kelola Kriteria', 'url' => '/tbl-kriteria/index/'],
    //                 ['label' => 'Kelola Pensiun', 'url' => '/tbl-pensiun/index/'],
    //                 ['label' => 'Kelola User', 'url' => '/tbl-user/index/'],
    //             ],
    //         ],
    //     ];
    // }

        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
