<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>
<main class="col-md-10 col-sm-12 col-xs-12">
    <div class="row">
        <div class="users-form">

            <?php $form = ActiveForm::begin(); ?>

            <div class="form-group col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <?= $form->field($model, 'password')->textInput(['maxlength' => true,'value' => '']) ?>
            </div>
         
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Salvar') : Yii::t('app', 'Atualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
<main>