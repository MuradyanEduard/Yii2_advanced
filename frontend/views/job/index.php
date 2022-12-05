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

<div class="col-12">
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
                                $jbModel = JobApplication::findOne(['job_id' => $data->id, 'user_id' => Yii::$app->user->identity->id]);
                                if ($jbModel != null) {
                                    switch ($jbModel->status) {
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
                                        HTML::hiddenInput('user_id', Yii::$app->user->identity->id) .
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
    </div>
</div>
