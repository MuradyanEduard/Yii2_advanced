<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */

?>
<div class="user-create">

    <?php $form = ActiveForm::begin(); ?>

    <!-- Content section Start -->
    <section id="content" class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-xs-12">
                    <div class="page-login-form box">
                        <h3>
                            Create User account
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
                        <button class="btn btn-success">Register</button>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content section End -->

    <?php ActiveForm::end(); ?>

</div>
