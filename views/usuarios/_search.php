<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="form-group col-lg-5 col-md-12 col-sm-12 col-xs-12">
        <?= $form->field($model, 'pesquisar') ?>
    </div>

    <div class="form-group col-lg-3 col-md-12 col-sm-12 col-xs-12">
        <?= $form->field($model, 'nivel')->dropDownList([0 => 'Normal', 1 => 'Administrador']); ?>
    </div>

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
    </div> 
    
    <?php ActiveForm::end(); ?>

</div>
