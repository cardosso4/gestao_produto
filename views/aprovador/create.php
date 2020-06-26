<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aprovador */

$this->title = 'Create Aprovador';
$this->params['breadcrumbs'][] = ['label' => 'Aprovadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aprovador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
    ]) ?>

</div>
