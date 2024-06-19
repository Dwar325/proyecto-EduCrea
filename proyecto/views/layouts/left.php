<?php

/** @var \yii\web\View $this */
/** @var string $directoryAsset */
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?= \yii\helpers\Html::a('<img src="../images/logo.png" style="display: block; margin: 0 auto; width: 150px; height: auto;" alt="APP">', Yii::$app->homeUrl, ['class' => 'brand-link']) ?>
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
                                ['label' => 'Listado', 'url' => ['/categorias/listado']],
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
                                ['label' => 'Progreso', 'url' => ['programas/progress']]
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
