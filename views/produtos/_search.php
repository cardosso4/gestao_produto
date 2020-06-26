<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\money\MaskMoney;
use kartik\slider\Slider;

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

    <div class="form-group col-lg-3 col-md-12 col-sm-12 col-xs-12">
        <?= $form->field($model, 'situacao')->dropDownList([0 => 'Pendente, em análise', 2 => 'Aprovado', 3 => 'Reprovado']); ?>
    </div>      
    
    <div class="form-group col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <?php
            echo '<b class="badge">R$'.number_format($range[0]['min'],2,",",".").'  </b> ' . Slider::widget([
                'name'=>'valor',
                'value'=> $range[0]['min'].','.$range[0]['max'],
                'sliderColor'=>Slider::TYPE_GREY,
                'pluginOptions'=>[
                    'min'=>$range[0]['min']-5,
                    'max'=>$range[0]['max']+5,
                    'step'=>5,
                    'range'=>true
                ],
            ]) . ' <b class="badge">  R$ '.number_format($range[0]['max'],2,",",".").'</b>';    
    
    ?>  
    </div>  
    
  

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
    </div>   

    <?php ActiveForm::end(); ?>

</div>
