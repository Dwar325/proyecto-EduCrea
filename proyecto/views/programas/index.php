<?php

use app\models\Programas;
use kartik\icons\Icon;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\grid\ActionColumn;
use Yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\ProgramasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Programas';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="programas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registrar Programa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'id' => 'kv-grid-demo', // Añadido el 'id'
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'descripcion:ntext',
            'estado',
            'fecha_inicio',
            //'fecha_fin',
            //'fecha_creacion',
            //'fecha_actualizacion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Programas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
        'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'], // offset from top
        'floatHeader' => true, // table header floats when you scroll
        'floatPageSummary' => true, // table page summary floats when you scroll
        'floatFooter' => false, // disable floating of table footer
        'pjax' => false, // pjax is set to always false for this demo
        'responsive' => false,
        'bordered' => true,
        'striped' => false,
        'condensed' => true,
        'hover' => true,
        'showPageSummary' => true,
        'panel' => [
            'heading' => '<i class="fas fa-book"></i> Programa',
            'type' => 'primary',
            'before' => '<div style="padding-top: 7px;"></div>',
        ],
        'toolbar' => [], // Sin elementos de barra de herramientas
        'export' => [], // Sin opciones de exportación
    ]); ?>

</div>