<?php

use frontend\models\Job;
use frontend\models\JobApplication;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\JobSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Jobs';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Start Content -->
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-xs-12">
                <div class="right-sideabr">
                    <h4>Manage Account</h4>
                    <ul class="list-item">
                        <li><a href="resume.html">My Resume</a></li>
                        <li><a href="bookmarked.html">Bookmarked Jobs</a></li>
                        <li><a href="notifications.html">Notifications <span class="notinumber">2</span></a></li>
                        <li><a class="active" href="manage-applications.html">Manage Applications</a></li>
                        <li><a href="job-alerts.html">Job Alerts</a></li>
                        <li><a href="change-password.html">Change Password</a></li>
                        <li><a href="index.html">Sing Out</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="job-alerts-item">
                    <h3 class="alerts-title">Manage applications</h3>
                    <div class="applications-content">
                        <div class="row">
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    'title',
                                    'description',
                                    [
                                        'attribute' => 'category',
                                        'label' => 'Category',
                                        'format' => 'text', // Возможные варианты: raw, html
                                        'content' => function ($data) {
                                            return $data->category->name;
                                        },
                                    ],
                                    [
                                        'attribute' => 'Review',
                                        'format' => 'raw',
                                        'value' => function ($data) {
                                            $jbModel = JobApplication::findOne(['job_id' => $data->id]);
                                            if ($jbModel != null) {
                                                switch ($jbModel->status)
                                                {
                                                    case JobApplication::STATUS_PROCESSED:
                                                        return '<p style="margin:auto;">Proccesed </p>';
                                                    case JobApplication::STATUS_APPROVED:
                                                        return '<p style="margin:auto;color:green">Approved </p>';
                                                    case JobApplication::STATUS_REJECTED:
                                                        return '<p style="margin:auto;color:red">Rejected </p>';
                                                        break;
                                                    default:
                                                        return '';
                                                }

                                            } else {
                                                return '' .
                                                    Html::beginForm('/job/review/create') .
                                                    HTML::hiddenInput('job_id', $data->id) .
                                                    HTML::hiddenInput('user_id', $data->user_id).
                                                    Html::submitButton(
                                                        'Add Review',
                                                        ['class' => 'btn btn-common log-btn']) .
                                                    Html::endForm();
                                            }
                                        },
                                    ],
                                ],
                            ]); ?>

                        </div>
                    </div>
                    <br>
                    <!-- Start Pagination -->
                    <ul class="pagination">
                        <li class="active"><a href="#" class="btn-prev"><i class="lni-angle-left"></i> prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li class="active"><a href="#" class="btn-next">Next <i class="lni-angle-right"></i></a></li>
                    </ul>
                    <!-- End Pagination -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
