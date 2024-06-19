<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model app\models\Categorias */

?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= Html::encode($model->nombre) ?></h5>
        <p class="card-text"><?= Html::encode($model->descripcion) ?></p>
        <p class="card-text"><small class="text-muted">Activa: <?= $model->activo ? 'Sí' : 'No' ?></small></p>
        <a href="<?= Url::to(['categorias/view', 'id' => $model->id]) ?>" class="btn btn-primary">Ver Más</a>
    </div>
</div>
