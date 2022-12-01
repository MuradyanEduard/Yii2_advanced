<?php

/** @var \yii\web\View $this */

/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

?>
<?php $this->beginPage() ?>

    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <?php AppAsset::register($this); ?>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <?php if (!Yii::$app->user->isGuest): ?>
        <!-- Header Section Start -->
        <header id="home" class="hero-area">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
                <div class="container">
                    <div class="theme-header clearfix">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                                <span class="lni-menu"></span>
                                <span class="lni-menu"></span>
                                <span class="lni-menu"></span>
                            </button>
                            <a href="index.html" class="navbar-brand"><img src="assets/img/logo.png" alt=""></a>
                        </div>
                        <div class="collapse navbar-collapse" id="main-navbar">
                            <ul class="navbar-nav mr-auto w-100 justify-content-end">
                                <li class="nav-item">
                                    <?= Html::a('Home', ['site/index'], ['class' => 'nav-link']) ?>
                                </li>
                                <li class="nav-item">
                                    <?= Html::a('Post a Job', ['job/create'], ['class' => 'nav-link']) ?>
                                </li>
                                <li class="button-group" style="margin:auto 0">
                                    <?= Html::beginForm('/logout'); ?>
                                    <?= Html::submitButton(
                                        'Logout (' . Yii::$app->user->identity->username . ')',
                                        ['class' => 'btn btn-common log-btn']); ?>
                                    <?= Html::endForm(); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu" data-logo="assets/img/logo-mobile.png"></div>
            </nav>
            <!-- Navbar End -->
        </header>
        <!-- Header Section End -->

    <?php endif ?>
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <?php
    $this->registerJsFile('@web/js/jquery-min.js', ['depends' => [\yii\web\JqueryAsset::class]]);
    $this->registerJsFile('@web/js/popper.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);
    $this->registerJsFile('@web/js/bootstrap.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);
    $this->registerJsFile('@web/js/color-switcher.js', ['depends' => [\yii\web\JqueryAsset::class]]);
    $this->registerJsFile('@web/js/owl.carousel.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);
    $this->registerJsFile('@web/js/jquery.slicknav.js', ['depends' => [\yii\web\JqueryAsset::class]]);
    $this->registerJsFile('@web/js/jquery.counterup.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);
    $this->registerJsFile('@web/js/waypoints.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);
    $this->registerJsFile('@web/js/form-validator.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);
    $this->registerJsFile('@web/js/contact-form-script.js', ['depends' => [\yii\web\JqueryAsset::class]]);
    $this->registerJsFile('@web/js/main.js', ['depends' => [\yii\web\JqueryAsset::class]]);
    ?>



    <?php $this->endBody() ?>

    </body>
    </html>

<?php $this->endPage();
