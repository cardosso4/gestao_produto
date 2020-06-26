<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Workflowaprovacao */

$this->title = 'Aprovar Produto';
$this->params['breadcrumbs'][] = ['label' => 'Workflowaprovacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="workflowaprovacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelProduto' => $modelProduto,
    ]) ?>

</div>
