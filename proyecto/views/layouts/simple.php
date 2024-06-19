<?php

use yii\helpers\Html;

/** @var \yii\web\View $this */
/** @var string $content */

dmstr\adminlte\web\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .auth-box {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            margin: 7% auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .auth-logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .auth-logo h1 {
            font-size: 2.5em;
            color: #007bff;
        }
        .auth-box .form-group {
            margin-bottom: 15px;
        }
        .auth-box .btn {
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            padding: 10px 20px;
            width: 100%;
        }
        .auth-box .btn:hover {
            background-color: #0056b3;
        }
        .auth-footer {
            text-align: center;
            margin-top: 20px;
        }
        .auth-footer a {
            color: #007bff;
            text-decoration: none;
        }
        .auth-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="hold-transition login-page">

<?php $this->beginBody() ?>

<div class="auth-box">
    <div class="auth-logo">
        <?= Html::a('<h1><strong>EduCrea</strong></h1>', ['/site/index']); ?>
    </div>

    <?= \dmstr\adminlte\widgets\Alert::widget(); ?>

    <?= $content ?>

    <div class="auth-footer">
        <p>&copy; <?= date('Y') ?> EduCrea. Todos los derechos reservados.</p>
        <?= Html::a('¿Olvidaste tu contraseña?', ['/site/request-password-reset'], ['class' => 'text-muted']) ?><br>
        <?= Html::a('Registrarse', ['/site/register'], ['class' => 'text-muted']) ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
