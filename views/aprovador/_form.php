<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Aprovador */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="aprovador-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group col-lg-10 col-md-12 col-sm-12 col-xs-12">
        <?= $form->field($model, 'user_id')->widget(Select2::className(), [
            'data'=>ArrayHelper::map($users, 'id', 'descricao'),
            'options' => ['placeholder' => 'Selecione o Usuários ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Usuários'); ?>  
    </div> 

    <div class="form-group col-lg-3 col-md-12 col-sm-12 col-xs-12">
        <?= $form->field($model, 'situacao')->dropDownList([0 => 'Inativo', 1 => 'Ativo']); ?>
    </div>    

         

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Salvar') : Yii::t('app', 'Atualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a( 'Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-primary']); ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
