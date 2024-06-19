<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                        <?= $form->field($model, 'username') ?>
                        <?= $form->field($model, 'email') ?>
                        <?= $form->field($model, 'password')->passwordInput()->hint('6 character minimum') ?>
                        <?= $form->field($model, 'mobile') ?>
                        <?= $form->field($model, 'gender')->radioList([
                            'Male' => 'Male',
                            'Female' => 'Female'
                        ]); ?>

                        <!-- <a href="#" data-toggle="dropdown" class="dropdown-toggle">Label <b class="caret"></b></a> -->

                        <?= $form->field($model, 'nationality')
                            ->dropDownList(
                                ['sy' => 'Syrian' ,'fr' => 'French' ,'uk' => 'British' ] ,
                                ['prompt'=>'Select a Nationalty'],     )
                            ->label(false);
                        ?>

                        <div class="form-group">
                            <?= Html::submitButton('Signup', ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>