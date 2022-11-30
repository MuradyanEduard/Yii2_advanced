<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\JobSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="job-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'Company') ?>

    <?= $form->field($model, 'location') ?>

    <?= $form->field($model, 'Categories') ?>

    <?php // echo $form->field($model, 'tags') ?>

    <?php // echo $form->field($model, 'Description') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'closing_date') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
