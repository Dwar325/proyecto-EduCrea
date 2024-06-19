<?php
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorías y Lecciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_category_card',
        'options' => ['class' => 'row'],
        'itemOptions' => ['class' => 'col-lg-4 col-md-6 mb-4'],
        'layout' => "{items}\n{pager}",
    ]); ?>
</div>
