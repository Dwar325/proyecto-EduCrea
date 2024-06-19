<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;


$this->title = 'Login';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-outline card-primary">
    <div class="card-header text-center login-logo">
        <img style="width: 200px; height: auto;" src="../images/logo.png">
    </div>
    <div class="card-body">
        <p class="login-box-msg">Ingresa tus credenciales para iniciar sesión</p>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
        ]); ?>
        <?= $form->field($model, 'username', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><i class="fas fa-envelope"></i></div></div>',
            'template' => "{beginWrapper}{input}{error}{endWrapper}",
            'wrapperOptions' => [
                'class' => 'input-group mb-3'
            ]
        ])
            ->label(false)
            ->textInput(['placeholder' => 'Usuario', 'aria-required' => 'true']) ?>
        <?= $form->field($model, 'password', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><i class="fas fa-lock"></i></div></div>',
            'template' => "{beginWrapper}{input}{error}{endWrapper}",
            'wrapperOptions' => [
                'class' => 'input-group mb-3'
            ]
        ])
            ->label(false)
            ->passwordInput(['placeholder' => 'Contraseña', 'aria-required' => 'true']) ?>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <?= $form->field($model, 'rememberMe')->checkbox()->label('Recuerdame'); ?>
                </div>
            </div>

            <div class="col-4">
                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']); ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        <div class="social-auth-links text-center mt-2 mb-3">
            <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Ingresar usando Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Ingresar usando Google+
            </a>
        </div>
        <p class="mb-1">
            <?= Html::a('Olvidé mi contraseña', ['site/request-password-reset']) ?>
        </p>
        <p class="mb-0">
            <?= Html::a('Registrate Aquí', ['site/register'], ['class' => 'text-center']) ?>
        </p>
    </div>
</div>