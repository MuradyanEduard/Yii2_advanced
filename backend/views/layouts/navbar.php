<?php

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;

?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?= Html::a('User List', ['/user'], ['class' => 'nav-link']) ?>
       </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?= Html::a('Category List', ['/category'], ['class' => 'nav-link']) ?>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <?= Html::beginForm(['/logout']); ?>
            <?= Html::submitButton(
                'Logout (' . Yii::$app->user->identity->login . ')',
                ['class' => 'nav-link btn btn-link logout']); ?>
            <?= Html::endForm(); ?>
        </li>

    </ul>
</nav>
<!-- /.navbar -->
