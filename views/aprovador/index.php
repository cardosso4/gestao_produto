<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AprovadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aprovador';
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="aprovador-index">

            <h1><?= Html::encode($this->title) ?></h1>

            <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p>
                    <?= Html::a('Criar Aprovador', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        'user.name',
                        [
                            'label' => 'Stuacao',
                            'attribute' => 'situacaoLabel' 
                        ],
                        'create_at:date',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>


        </div>
    </div>
</main>
