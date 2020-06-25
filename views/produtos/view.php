<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Produtos */

$this->title = $model->codigo.'-'.$model->descricao;;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produtos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['Update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['Delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Deseja deletar o Produto?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a( 'Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-primary']); ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'codigo',
            'descricao',
            [
                'attribute' => 'valor',
                'format'=>['decimal', 2],
            ],
            [
                'label' => 'Stuacao',
                'attribute' => 'situacaoLabel' 
            ],
            'narrativa:ntext',
            'create_at:date',
        ],
    ]) ?>

</div>
