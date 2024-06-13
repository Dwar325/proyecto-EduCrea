<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model app\models\Programas */

$estado = Html::encode($model->estado);
$badgeClass = 'bg-secondary';

switch ($estado) {
    case 'Publicado':
        $badgeClass = 'bg-success';
        break;
    case 'Borrador':
        $badgeClass = 'bg-warning';
        break;
    case 'Archivado':
        break;
}

?>
<div class="card shadow-sm mb-4" style="border-radius: 1.5rem;">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0"><?= Html::encode($model->nombre) ?></h5>
            <span class="badge <?= $badgeClass ?>"><?= $estado ?></span>
        </div>
        <h6 class="card-subtitle mb-2 text-muted">Del <?= Yii::$app->formatter->asDate($model->fecha_inicio) ?> al <?= Yii::$app->formatter->asDate($model->fecha_fin) ?></h6>
        <div class="vprogress mb-2">
            <div class="vprogress-bar" role="progressbar" style="width: <?= $model->getProgress() ?>%;" aria-valuenow="<?= $model->getProgress() ?>" aria-valuemin="0" aria-valuemax="100"><?= round($model->getProgress()) ?>%</div>
        </div>
        <p class="card-text"><?= Html::encode($model->descripcion) ?></p>
        <div class="mb-2">
            <small class="text-muted">Mentor:  </small><br>
            <small class="text-muted">Supervisor: </small>
        </div>
        <a href="<?= Url::to(['programas/view', 'id' => $model->id]) ?>" class="card-link">Ver Detalles</a>
    </div>
</div>



