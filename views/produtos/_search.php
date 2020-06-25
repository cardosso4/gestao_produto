<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\ProdutosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produtos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?= $form->field($model, 'pesquisar') ?>
    </div>



    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
    </div>
    

    <?php ActiveForm::end(); ?>

</div>
