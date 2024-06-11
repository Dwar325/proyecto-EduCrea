<?php

use app\models\Categorias;
use kartik\icons\Icon;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\grid\ActionColumn;
use Yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\CategoriasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="categorias-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Crear Categoria', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <p> <?php echo $this->render('_search', ['model' => $searchModel]); ?> </p>

    </div>

    <?php echo GridView::widget([
        'id' => 'kv-grid-demo',
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'descripcion',
            'activo',

            [
                'class' => ActionColumn::className(),
                'template' => "{view} {delete}",
                'urlCreator' => function ($action, \app\models\Categorias $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ], // check this value by clicking GRID COLUMNS SETUP button at top of the page
        'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'], // offset from top
        'floatHeader' => true, // table header floats when you scroll
        'floatPageSummary' => true, // table page summary floats when you scroll
        'floatFooter' => false, // disable floating of table footer
        'pjax' => false, // pjax is set to always false for this demo
        // parameters from the demo form
        'responsive' => false,
        'bordered' => true,
        'striped' => false,
        'condensed' => true,
        'hover' => true,
        'showPageSummary' => true,
        'panel' => [
            //'after' => '<div class="float-right float-end"><button type="button" class="btn btn-primary" onclick="var keys = $("#kv-grid-demo").yiiGridView("getSelectedRows").length; alert(keys > 0 ? "Downloaded " + keys + " selected books to your account." : "No rows selected for download.");"><i class="fas fa-download"></i> Download Selected</button></div><div style="padding-top: 5px;"><em>* The page summary displays SUM for first 3 amount columns and AVG for the last.</em></div><div class="clearfix"></div>',
            'heading' => '<i class="fas fa-book"></i> Categoria',
            'type' => 'primary',
            'before' => '<div style="padding-top: 7px;"></div>',
        ],
    ]);
    ?>

</div>