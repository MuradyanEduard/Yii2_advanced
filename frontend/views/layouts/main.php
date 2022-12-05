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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Registration, Landing">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>TheHunt - Bootstrap HTML5 Job Portal Template</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/line-icons.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.css">
    <link rel="stylesheet" href="/css/slicknav.min.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/summernote.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/responsive.css">

    <link rel="stylesheet" href="/css/colors/cyan.css">

    <!--    //        'css/colors/blue.css',-->
    <!--    //        'css/colors/cyan.css',-->
    <!--    //        'css/colors/green.css',-->
    <!--    //        'css/colors/pink.css',-->
    <!--    //        'css/colors/purple.css',-->
    <!--    //        'css/colors/yellow.css',-->

    <link rel="stylesheet" href="/css/color-switcher.css">

</head>

<?php $this->beginBody() ?>
<body>

<style>
    li span {
        border-radius: 30px !important;
        padding: 5px 10px;
        margin: 0 3px;
        min-width: 40px;
        height: 40px;
        line-height: 30px;
        font-weight: 400;
        position: relative;
        font-size: 14px;
        text-transform: uppercase;
        background: #26ae61;
        display: block;
        color: #fff;
    }
</style>


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
                                <?= Html::a('Home', '/home', ['class' => 'nav-link']) ?>
                            </li>
                            <?php if (\common\models\User::EMPLOYER_ROLE == Yii::$app->user->identity->role): ?>
                                <li class="nav-item">
                                    <?= Html::a('Manage Application', '/job/review', ['class' => 'nav-link']) ?>
                                </li>
                                <li class="nav-item">
                                    <?= Html::a('Post a Job', '/job/create', ['class' => 'nav-link']) ?>
                                </li>
                            <?php endif ?>
                            <?php if (\common\models\User::CANDIDATE_ROLE == Yii::$app->user->identity->role): ?>
                                <li class="nav-item">
                                    <?= Html::a('Find Job', '/job/find', ['class' => 'nav-link']) ?>
                                </li>
                            <?php endif ?>
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

<section class="section">
    <?= Alert::widget() ?>
    <div id="content">
        <div class="container">
            <div class="row">
                <?php if (!Yii::$app->user->isGuest): ?>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="right-sideabr">
                        <h4>Manage Account</h4>
                        <ul class="list-item">
                            <li class="nav-item">
                                <?= Html::a('Home', '/home', ['class' => 'nav-link']) ?>
                            </li>
                            <?php if (\common\models\User::EMPLOYER_ROLE == Yii::$app->user->identity->role): ?>
                                <li class="nav-item">
                                    <?= Html::a('Manage Application', '/job/review', ['class' => 'nav-link']) ?>
                                </li>
                                <li class="nav-item">
                                    <?= Html::a('Post a Job', '/job/create', ['class' => 'nav-link']) ?>
                                </li>
                            <?php endif ?>
                            <?php if (\common\models\User::CANDIDATE_ROLE == Yii::$app->user->identity->role): ?>
                                <li class="nav-item">
                                    <?= Html::a('Find Job', '/job/find', ['class' => 'nav-link']) ?>
                                </li>
                            <?php endif ?>
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
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <?php endIf; ?>
                    <?= $content ?>
                    <?php if (!Yii::$app->user->isGuest): ?>
                </div>
            <?php endIf; ?>
            </div>
        </div>
    </div>

    </div>
</section>
<!-- Preloader -->
<div id="preloader">
    <div class="loader" id="loader-1"></div>
</div>
<!-- End Preloader -->

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="/js/jquery-min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/color-switcher.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery.slicknav.js"></script>
<script src="/js/jquery.counterup.min.js"></script>
<script src="/js/waypoints.min.js"></script>
<script src="/js/form-validator.min.js"></script>
<script src="/js/contact-form-script.js"></script>
<script src="/js/summernote.js"></script>
<script src="/js/main.js"></script>

<script>
    $('#summernote').summernote({
        height: 250,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                  // set focus to editable area after initializing summernote
    });
</script>

<?php $this->endBody() ?>

</body>
</html>

<?php $this->endPage(); ?>

