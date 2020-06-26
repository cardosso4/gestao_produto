<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Workflowaprovacao */

$this->title = 'Create Workflowaprovacao';
$this->params['breadcrumbs'][] = ['label' => 'Workflowaprovacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workflowaprovacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
