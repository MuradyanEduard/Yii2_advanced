<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Content section Start -->
<section id="content" class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-xs-12">
                <div class="page-login-form box">
                    <h3>
                        Create Your account
                    </h3>
                    <?php $form = ActiveForm::begin([
                        'options' => ['class' => 'login-form']
                    ]); ?>
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="lni-user"></i>
                            <?= $form->field($model, 'username')->textInput([
                                    'class' => 'form-control',
                                    'placeholder' => 'Username'
                                ]
                            )->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="lni-envelope"></i>
                            <?= $form->field($model, 'email')->textInput([
                                'class' => 'form-control',
                                'placeholder' => 'Email Address'
                            ])->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="lni-lock"></i>
                            <?= $form->field($model, 'password')->passwordInput([
                                'class' => 'form-control',
                                'placeholder' => 'Password'
                            ])->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                            <?= $form->field($model, 'role')
                                ->dropDownList(['1' => 'Employer', '2' => 'Candidate'],['class' => 'form-control'])->label(false) ?>
                        </div>
                    </div>
                    <!--                        <div class="form-group">-->
                    <!--                            <div class="input-icon">-->
                    <!--                                <i class="lni-unlock"></i>-->
                    <!--                                <input type="password" class="form-control" placeholder="Retype Password">-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <button class="btn btn-common log-btn mt-3">Register</button>
                    <p class="text-center">Already have an account?  <?= Html::a("Sign In", ['site/login']) ?></p>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Content section End -->
