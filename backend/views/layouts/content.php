<?php
/* @var $content string */

use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use yii\widgets\DetailView;
?>

<div class="content-wrapper">
    <!-- Main content -->
    <div class="content col-11">
        <div class="row">
            <div class="col-12 col-lg-12" style="padding-left:40px;margin-top:40px;">
                <div class="row">
                    <div class="col-12">
                        <?= $content ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>