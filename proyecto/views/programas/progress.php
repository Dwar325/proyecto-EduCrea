<?php
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProgramasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Progreso de los Programas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_program_card',['model' => $model]);
        },
        'itemOptions' => ['class' => 'col-md-4'],
        'layout' => "<div class='row'>{items}</div>\n{pager}",
    ]); ?>

</div>
