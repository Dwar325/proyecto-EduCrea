<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Programas $model */

$this->title = 'Registrar Programa';
$this->params['breadcrumbs'][] = ['label' => 'Programas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
