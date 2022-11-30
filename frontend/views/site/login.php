<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

?>

<!-- Content section Start -->
<section id="content" class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-xs-12">
                <div class="page-login-form box">
                    <h3>
                        Login
                    </h3>
                    <?php $form = ActiveForm::begin([
                        'options' => ['class' => 'login-form']
                    ]); ?>
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="lni-user"></i>
                            <?= $form->field($model, 'username')->textInput([
                                'class' => "form-control",
                                'placeholder' => "Username"
                            ])->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="lni-lock"></i>
                            <?= $form->field($model, 'password')->passwordInput([
                                'class' => "form-control",
                                'placeholder' => "Password"
                            ])->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <?= $form->field($model, 'rememberMe')->checkbox(['class'=>''])->label('Keep Me Signed In',['class'=>'form-check-label']) ?>
                    </div>
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-common log-btn', 'name' => 'login-button']) ?>
                    <?php ActiveForm::end(); ?>
                    <ul class="form-links">
                        <li class="text-center">
                            <?= Html::a("Don't have an account?", '/signup') ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Content section End -->
