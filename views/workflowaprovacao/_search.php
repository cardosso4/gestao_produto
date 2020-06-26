<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WorkflowaprovacaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workflowaprovacao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="form-group col-lg-3 col-md-12 col-sm-12 col-xs-12">
        <?= $form->field($model, 'situacao')->dropDownList([0 => 'Pendente, em análise', 1 => 'Aprovado', 2 => 'Reprovado']); ?>
    </div> 

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
    </div>   

    <?php ActiveForm::end(); ?>

</div>
