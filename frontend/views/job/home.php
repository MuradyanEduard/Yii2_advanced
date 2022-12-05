<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var common\models\User $model */
?>

<div class="col-12">
    <div class="job-alerts-item candidates">
        <h3 class="alerts-title">Manage Jobs</h3>
        <div class="alerts-list">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-xs-12">
                    <p>Name</p>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12">
                    <p>Keywords</p>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12">
                    <p>Candidates</p>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12">
                    <p>Featured</p>
                </div>
            </div>
        </div>

        <?php foreach ($model as $one) { ?>
            <div class="alerts-content">
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-xs-12">
                        <h3>Web Designer</h3>
                        <span class="location"><i class="lni-map-marker"></i> Manhattan, NYC</span>
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12">
                        <p><span class="full-time">Full-Time</span></p>
                    </div>
                    <div class="col-lg-3 col-md-2 col-xs-12">
                        <div style="margin-top: 15px"> <?= $one->username ?></div>
                    </div>
                    <div class="col-lg-3 col-md-2 col-xs-12">
                        <p><i class="lni-star"></i></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
