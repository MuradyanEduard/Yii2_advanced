<?php

use frontend\models\JobApplication;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\JobAplicationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Job Applications';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="col-12">
    <div class="job-alerts-item">
        <h3 class="alerts-title">Manage applications</h3>
        <div class="applications-content">
            <div class="row">
                <?php
//                    $myModels = $dataProvider->getModels();
//                    print_r('<pre>');
//                    print_r($myModels);
//                    print_r('</pre>');
//                    foreach ($myModels as $model)
//                        print_r($model->user->username).'<br>';
                ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'options' => ['class' => 'col-12'],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'job_id',
                            'label' => 'Job Title',
                            'format' => 'text', // Возможные варианты: raw, html
                            'value' => function ($data) {
                                return ($data->title);
                            }
                        ],
                        [
                            'attribute' => 'user_id',
                            'label' => 'User name',
                            'format' => 'html', // Возможные варианты: raw, html
                            'value' => function ($data) {
                                $str = '';
                                foreach ($data->jobapplication as $app) {
                                    $str .= $app->user->username . '<br>';
                                }
                                return $str;
                            }
                        ],
                        [
                            'attribute' => 'Review',
                            'format' => 'raw',
                            'value' => function ($model) {
                                $str = '';
                                foreach ($model->jobapplication as $app) {
                                    $jbModel = JobApplication::findOne(['id' => $app->id]);
                                    if ($jbModel != null) {
                                        if ($jbModel->status == JobApplication::STATUS_PROCESSED) {
                                            $str .=
                                                Html::beginForm('/job/review/update') .
                                                Html::hiddenInput('id', $app->id) .
                                                Html::dropDownList('status', '',
                                                    array('1' => 'Approved', '2' => 'Rejected'),
                                                    ['class' => 'form-select', 'style' => 'margin:10px 0']) .
                                                Html::submitButton(
                                                    'Save',
                                                    ['class' => 'btn btn-common log-btn']) .
                                                Html::endForm();
                                        } else {
                                            switch ($jbModel->status) {
                                                case JobApplication::STATUS_APPROVED:
                                                    $str .= '<p style="margin:auto;color:green">Approved </p>';
                                                    break;
                                                case JobApplication::STATUS_REJECTED:
                                                    $str .= '<p style="margin:auto;color:red">Rejected </p>';
                                                    break;
                                                default:
                                                    $str .= '';
                                                    break;
                                            }
                                        }
                                    }
                                }
                                return $str;
                            },
                        ],
                    ],
                ]); ?>
            </div>
        </div>
        <br>
    </div>
</div>