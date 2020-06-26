<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Workflowaprovacao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workflowaprovacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group col-lg-3 col-md-12 col-sm-12 col-xs-12">
        <?= $form->field($model, 'situacao')->dropDownList([1 => 'Aprovado', 2 => 'Reprovado']); ?>
    </div> 

    <div class="form-group col-lg-10 col-md-12 col-sm-12 col-xs-12">
        <span>Produto: <?= $modelProduto->codigo.' - '.$modelProduto->descricao ?></span><br>
        <span>Valor: R$ <?= number_format($modelProduto->valor,2,",",".") ?></span><br>
        <img style="width: 300px;" src="../<?= $modelProduto->imagem ?>" alt="">
    </div>

    <div class="form-group col-lg-10 col-md-12 col-sm-12 col-xs-12">
        <?= $form->field($model, 'observacao')->textarea(['rows' => 6]) ?>
    </div>


    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Salvar') : Yii::t('app', 'Salvar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a( 'Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-primary']); ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
