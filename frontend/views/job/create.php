<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Job $model */

$this->title = 'Create Job';
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-12">
    <div class="post-job box">

        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'user_id')->hiddenInput(['maxlength' => true, 'value' => Yii::$app->user->identity->id])->label(false) ?>
        <?= $form->field($model, 'email')->hiddenInput(['maxlength' => true, 'value' => Yii::$app->user->identity->email])->label(false) ?>

        <h3 class="job-title">Post a new Job</h3>
        <form class="form-ad">
            <div class="form-group">
                <label class="control-label">Job Title</label>
                <?= $form->field($model, 'title')->textInput(['maxlength' => true,
                    'placeholder' => 'Write job title', 'class' => 'form-control'])->label(false) ?>
            </div>
            <div class="form-group">
                <label class="control-label">Company</label>
                <?= $form->field($model, 'company_id')->textInput(['maxlength' => true,
                    'placeholder' => 'Write company name', 'class' => 'form-control'])->label(false) ?>
            </div>
            <div class="form-group">
                <label class="control-label">Location <span>(optional)</span></label>
                <?= $form->field($model, 'location')->textInput(['maxlength' => true,
                    'placeholder' => 'e.g.London', 'class' => 'form-control'])->label(false) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'categories_id')->dropDownList(
                    ArrayHelper::map(\common\models\Category::find()->asArray()->all(), 'id', 'name')
                ) ?>
            </div>
            <div class="form-group">
                <label class="control-label">Job Tags <span>(optional)</span></label>
                <?= $form->field($model, 'tags')->textInput(['maxlength' => true,
                    'placeholder' => 'e.g.PHP,Social Media,Management', 'class' => 'form-control'])->label(false) ?>
                <p class="note">Comma separate tags, such as required skills or technologies, for this job.</p>
            </div>
            <div class="form-group">
                <label class="control-label">Description</label>
                <?= $form->field($model, 'description')->textarea(['maxlength' => true,
                    'placeholder' => '', 'class' => 'form-control', 'rows' => '6'])->label(false) ?>
            </div>
            <div class="form-group">
                <label class="control-label">Closing Date <span>(optional)</span></label>
                <?= $form->field($model, 'closing_date')->textInput(['maxlength' => true,
                    'placeholder' => 'yyyy-mm-dd', 'class' => 'form-control'])->label(false) ?>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Submit your job', ['class' => 'btn btn-success']) ?>
            </div>
        </form>
        <!-- Content section End -->
        <?php ActiveForm::end(); ?>
    </div>

</div>
