<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PasswordResetRequestForm */

$this->title = 'Solicitud de restablecimiento de contraseña';
?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card">
        <div class="card-body login-card-body">
            <h2 class="text-center">EduCrea</h2>
            <p class="login-box-msg">Ingrese su correo electrónico para restablecer su contraseña</p>

            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

            <?= $form->field($model, 'email', [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><i class="fas fa-envelope"></i></div></div>',
                'template' => "{beginWrapper}{input}{error}{endWrapper}",
                'wrapperOptions' => [
                    'class' => 'input-group mb-3'
                ]
            ])
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('email')]); ?>

            <div class="row">
                <div class="col-12">
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary btn-block', 'name' => 'request-password-reset-button']); ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

            <div class="request-password-reset-logo">
                <?= Html::a('<strong>Regresar a Login</strong>', ['/site/login']); ?>
            </div>
        </div>
    </div>
</div>