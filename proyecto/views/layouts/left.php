<?php

/** @var \yii\web\View $this */
/** @var string $directoryAsset */
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?= \yii\helpers\Html::a('<img class="brand-image img-circle elevation-3" src="' . ($directoryAsset . '/img/AdminLTELogo.png') . '" alt="APP"><span class="brand-text font-weight-light">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'brand-link']) ?>
    <div class="sidebar">

        <nav class="mt-2">
            <?= dmstr\adminlte\widgets\Menu::widget(
                [
                    'options' => ['class' => 'nav nav-pills nav-sidebar flex-column', 'data-widget' => 'treeview'],
                    'items' => [
                        //     ['label' => 'Menu Yii2', 'header' => true],
                        [
                            'label' => 'Categorías',
                            'icon' => 'user-secret',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Registro', 'url' => ['/categorias/index']],
                                //['label' => 'Histórico de Visitas', 'iconType' => 'far', 'icon' => 'arrow-right', 'url' => ['/boleta-detalle/indexhistorico']],
                                // ['label' => 'Estados de Boleta', 'iconType' => 'far', 'icon' => 'arrow-right', 'url' => ['/boleta-estado'],'badge' => '<span class="badge badge-info right">3</span>',],
                            ],
                        ] ,
                        [
                            'label' => 'Programas',
                            'icon' => 'user',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Registro', 'url' => ['/programas/index'],],
                                //['label' => 'Restricción de Acceso', 'iconType' => 'far', 'icon' => 'arrow-right', 'url' => ['/lista-negra'],],
                                // ['label' => 'Naturaleza del visitante', 'iconType' => 'far', 'icon' => 'arrow-right', 'url' => ['/persona-tipo'],],
                            ],
                        ] ,

                        //['label' => 'Login', 'iconType' => 'far', 'icon' => 'user','url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ],
                ]
            ) ?>
        </nav>

    </div>

</aside>
