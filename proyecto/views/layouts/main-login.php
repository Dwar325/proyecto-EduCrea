<?php

use yii\helpers\Html;
use yii\web\View;

/** @var View $this */
/** @var string $content */

dmstr\adminlte\web\AdminLteAsset::register($this);
rmrevin\yii\fontawesome\CdnFreeAssetBundle::register($this);
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
</head>

<body class="hold-transition login-page">
<?php $this->beginBody() ?>

<div class="login-box">

    <?= \dmstr\adminlte\widgets\Alert::widget(); ?>

    <?= $content ?>
</div>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
