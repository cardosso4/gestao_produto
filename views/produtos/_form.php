<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\money\MaskMoney;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Produtos */
/* @var $form yii\widgets\ActiveForm */
?>
<main class="col-md-10 col-sm-12 col-xs-12">
    <div class="row">
        <div class="produtos-form">

            <?php $form = ActiveForm::begin(); ?>

            <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>
            </div>  

            <div class="form-group col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>
            </div>  

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>

            <div class="form-group col-lg-2 col-md-12 col-sm-12 col-xs-12">
                <?= $form->field($model, 'valor')->widget(MaskMoney::classname(), [
                                                                                'pluginOptions' => [
                                                                                    'prefix' => 'R$ ',
                                                                                    'thousands' => '.',
                                                                                    'decimal' => ',',
                                                                                    'precision' => 2
                                                                                ]
                                                                            ]); ?>
            </div> 

            

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <?=
                $form->field($modelupload, 'imageFile')->widget(FileInput::classname(), [
                    'name' => 'imagem',
                    'language' => 'pt-BR',
                    'pluginOptions' => [
                        'showUpload' => false,
                        'browseLabel' => '',
                        'removeLabel' => '',
                        'mainClass' => 'input-group-lg',
                    ]
                ]);
              ?>                                                                  
            </div> 

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= $form->field($model, 'narrativa')->textarea(['rows' => 6]) ?>
            </div>            

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Salvar') : Yii::t('app', 'Atualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                <?= Html::a( 'Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-primary']); ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>    
</main>
